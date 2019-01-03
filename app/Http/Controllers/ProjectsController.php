<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    public function index(){
    	$projects = Project::all();

    	return view('projects.index', [
    		'projects' => $projects
    	]);
    }
    public function create(){

    	return view('projects.create');
    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }

    public function store(){
    	$project = new Project();

    	$project->title = request('title');
    	$project->description = request('description');

    	$project->save();
    	return redirect('/projects');
    }
}
