<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\NewsPost;
use GrahamCampbell\Markdown\Facades\Markdown;

class NewsController extends Controller
{
    //
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view($slug)
    {
        $newspost = NewsPost::where('slug', $slug)->first();
        $newspost->body = Markdown::convertToHtml($newspost->body);
        return view('news.view')->with('newspost', $newspost);
    }

    public function create()
    {
        return view('news.create');
    }

    public function edit($slug)
    {
        $newspost = NewsPost::where('slug', $slug)->first();
        return view('news.edit')->with('newspost', $newspost);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:news_posts|max:255',
            'body' => 'required'
        ]);

        $NewsPost = new NewsPost;

        $NewsPost->title = title_case($request->title);
        $NewsPost->body = $request->body;

        $NewsPost->save();

        return redirect('backend')->withSuccess('News post created successfully.');
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'title' => ['required', Rule::unique('news_posts')->ignore($slug, 'slug'), 'max:255'],
            'body' => 'required'
        ]);

        $NewsPost = NewsPost::where('slug', $slug)->first();

        $NewsPost->title = title_case($request->title);
        $NewsPost->body = $request->body;

        $NewsPost->save();

        return redirect('backend')->withSuccess('News post updated successfully.');
    }

    public function delete($slug)
    {
        NewsPost::where('slug', $slug)->delete();
        return redirect('backend')->withSuccess('News post deleted succesfully.');
    }
}
