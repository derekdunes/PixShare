<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $table = 'photos';

    protected $fillable = array('title','image');

    public static $upload_rules = array(
    	'title' => 'required|min:3',
    	// 'image' => 'required|image'
    );

    // $rules = [ 
    //     'images.*' => 'mimes:image|max:2048',
    //     'zone' => 'required'
    // ];

    // $messages = [
    //     'images.mimes' => 'The file must be an image', // in my file that is a translated of the original message
    //     'images.max' => 'The images sizes must be under 2MB',
    // ];

}
