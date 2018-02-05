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
				
				$folder_name = '/news';
				
				$file_path = Storage::disk('public_uploads')->put($folder_name, $file);
				
				$file_path = '/uploads/'.$file_path;
				
				$images[] = $file_path;
			}
			
		}
		return response()->json($images, 200);
	}
	
}
