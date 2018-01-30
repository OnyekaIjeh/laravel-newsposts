<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Event;
use GrahamCampbell\Markdown\Facades\Markdown;
use Carbon\Carbon;

class EventController extends Controller
{
    public function create()
    {
        return view('event.create');
    }

    public function edit($slug)
    {
        $event = Event::where('slug', $slug)->first();
        return view('event.edit')->with('event', $event);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:events|max:255',
            'date' => 'required|max:255',
            'body' => 'required'
        ]);

        $Event = new Event;

        $Event->title = title_case($request->title);
        $Event->date = $request->date;
        $Event->body = $request->body;

        $Event->save();

        return redirect('backend')->withSuccess('Event created successfully.');
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'title' => ['required', Rule::unique('events')->ignore($slug, 'slug'), 'max:255'],
            'date' => 'required|max:255',
            'body' => 'required'
        ]);

        $Event = Event::where('slug', $slug)->first();

        $Event->title = title_case($request->title);
        $Event->date = $request->date;
        $Event->body = $request->body;

        $Event->save();

        return redirect('backend')->withSuccess('Event updated successfully.');
    }

    public function delete($slug)
    {
        Event::where('slug', $slug)->delete();
        return redirect('backend')->withSuccess('Event deleted succesfully.');
    }
}
