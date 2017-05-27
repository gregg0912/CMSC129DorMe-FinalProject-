<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Image;
use App\Dorm;


class ImageController extends Controller
{
 	public function change(Request $data){

 		$path = 'img-uploads'; //upload path
 		$extension = $data->file('image')->getClientOriginalExtension(); //gets image extension
 		$fileName = rand(0, 99999).'_'.rand(0, 99999); //renaming the image
 		$fileNameExtension = $fileName.".".$extension;

 		if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "JPG" || $extension == "PNG") {

	 		$dorm = Dorm::findOrFail($data->dorm_id);
	 		$dorm->thumbnailPic = "/".$path."/".$fileNameExtension;
	 		$dorm->update();
	 		$data->file('image')->move($path, $fileNameExtension);

 		}

		// else if extension is not mentioned above
		// display message that file uploaded

        return redirect('/dorm/viewdorm/'.$data->dorm_id);

 	}

 	public function upload(Request $data){

 		$files = $data->file('images');
 		if (!empty($files)) {
 			$path = 'img-uploads';
 			foreach ($files as $file) {
 				$extension = $file->getClientOriginalExtension();
 				$fileName = $file->getClientOriginalName();

 				if ($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "JPG" || $extension == "PNG") {

	 				$dorm = Dorm::findOrFail($data->dorm_id);

	 				$image = new Image;
	 				$image->image_path = "/".$path."/".$fileName;
	 				$image->dorm_id = $data->dorm_id;
	 				$image->save();

	 				$file->move($path, $fileName);
 				}

 				// else if extension is not mentioned above
 				// display message that file uploaded
 			}
 		}

        return redirect('/dorm/viewdorm/'.$data->dorm_id);
 	}

}
