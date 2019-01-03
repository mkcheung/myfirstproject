<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){

    	return view('welcome')->with([
			'foo' => 'First',
  			'tasks' => [
	    		'Go to the store',
	    		'Go to the market',
	    		'Go to work',
	    		'Go to the concert',
	    	]
    	]
    	);
    }
    public function about(){
    	return view('welcome', [
    		'foo' => 'bar'
    	]);
    }
    public function contact(){
    	return view('welcome', [
    		'foo' => 'bar'
    	]);
    }
}
