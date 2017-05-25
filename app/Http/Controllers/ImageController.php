<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Image;
use App\Dorm;

class ImageController extends Controller
{
 	public function upload(Request $data){
 		// $user_id = Auth::user()->id;
 		$path = 'img-uploads'; //upload path
 		$extension = $data->file('image')->getClientOriginalExtension(); //gets image extension
 		$fileName = rand(0, 99999).'_'.rand(0, 99999); //renaming the image
 		$fileNameExtension = $fileName.".".$extension;

 		$dorm = Dorm::findOrFail($data->dorm_id);
 		$dorm->thumbnailPic = "/".$path."/".$fileNameExtension;
 		$dorm->update();
 		// // $image->user_id = $user_id;
 		// $image->image_path = "/".$path."/".$fileNameExtension;
 		// $image->dorm_id = $data->dorm_id;
 		// $image->save();
 		$data->file('image')->move($path, $fileNameExtension);

 		return view('dorm.viewdorm', compact('dorm'));

 		// return ($dorm->update());
 	}
}
