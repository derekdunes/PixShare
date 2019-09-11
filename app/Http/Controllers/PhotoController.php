<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Str;

use Intervention\Image\Facades\Image;

use App\Photo;

use File;

use DB;

use Config;

class PhotoController extends Controller
{
    //

    public function getIndex(){

		return View('photo.index');

    }

    public function postIndex(){

    	$this->validate(request(), Photo::$upload_rules);

    		//if validation passes
    		$image = Input::file('image');

    		$filename = $image->getClientOriginalName();

    		$filename = pathinfo($filename, PATHINFO_FILENAME);

    		//in production check if url/image file name already exist
    		//make the url friendly
    		$fullname = Str::slug(Str::random(8).$filename) . '.' . $image->getClientOriginalExtension();

    		//upload image to upload folder then make a thumbnail from the upload image
    		$upload = $image->move(Config::get('image.upload_folder'), $fullname);

    		$img = Image::make(Config::get('image.upload_folder'). '/' . $fullname);

    		$img->resize(Config::get('image.thumb_width'),null, function ($constraint){
    			$constraint->aspectRatio();
    		});

    		$img->save(Config::get('image.thumb_folder') . '/' . $fullname);

    		if ($upload) {
    			# code...
    			$insert_id = DB::table('photos')->insertGetId([
    					'title' => request('title'),
    					'image' => $fullname
    			]);

    			return redirect('/snatch/' . $insert_id)->with('success', 'Your Image was uploaded Successfully!');
    		
    		} else {

    			return redirect('/')->with('error', 'Sorry, the image could not be uploaded, please try again later');
    		}
    }

    public function getSnatch($id) {
    	
    	$image = Photo::find($id);

    	if($image){

    		return View('photo.permalink', compact('image'));

    	}else {

    		return redirect('/')->with('error', 'Image not found');

    	}
    }

    public function getAll(){

    	//fetch all the images in the database
    	$images = Photo::latest()->paginate(6);

    	return view('photo.all_image', compact('images'));
    }

    public function getDelete($id){

    	//find the photo to be deleted
    	$image = Photo::find($id);

    	if ($image) {
    		# code...
    		File::delete(Config::get('image.upload_folder') . '/' . $image->image);

    		File::delete(Config::get('image.thumb_folder') . '/' . $image->image);

    		//Now delete the value from the database
    		$image->delete();

    		//return to the home page
			return redirect('/')->with('success', 'Image deleted successfully');
    	
    	} else {

    		//image not found, go back to home page 
    		return redirect('/')->with('error', 'No image with given ID found');

    	}
    }
}
