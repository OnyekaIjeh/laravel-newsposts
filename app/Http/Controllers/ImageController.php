<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request){

        $images = [];

        foreach($request->all() as $file){

          if(is_file($file)){

            $file_name = time() . '-' . $file->getClientOriginalName();
            
            $file->storeAs('public/uploads', $file_name);

            $file_path = Storage::url('uploads/'.$file_name);

            $images[] = $file_path;
          }
  
        }
        return response()->json($images, 200);
      }
  
}
