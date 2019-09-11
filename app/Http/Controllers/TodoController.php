<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    //

	public function getIndex(){

		$todos = Todo::all();

		return View("index",compact("todos"));
	}

	public function postAdd(){
		
		if (Request::ajax()) {
			# code...
			$todo = new Todo();
			
			$todo->title = Input::get("title");
			
			$todo->save();

			$last_todo = $todo->id;

			$todos = Todo::whereId($last_todo)->get();

			return View("ajaxData",compact("todos"));
		}
	}

    public function postUpdate($id) {

    	if (Request::ajax()) {
    		# code...
    		$task = Todo::find($id);

	    	$task->title = Input::get("title");

	    	$task->save();

	    	return "OK";

    	}

    }

    public function getDelete($id){
    	if (Request::ajax()) {
    		# code...
    		$todo = Todo::whereId($id)->first();
    		$todo->delete();
    		return "OK";
    	}
    }

    public function getDone($id) {
    	if (Request::ajax()) {
    		# code...
    		$task = Todo::find($id);

    		$task->status = 1;
    		
    		$task->save();
    		
    		return "OK";
    	}
    }
}
