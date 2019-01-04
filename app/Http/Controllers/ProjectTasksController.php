<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;

use Illuminate\Http\Request;

class ProjectTasksController extends Controller
{

    public function store(Project $project){
		$attributes = request()->validate([
    		'description' => ['required','min:3', 'max:255']
    	]);
    	$project->addTask($attributes);

    	return back();
    }
}
