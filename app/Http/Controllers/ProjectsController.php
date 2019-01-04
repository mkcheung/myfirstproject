<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Services\Twitter;

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

    public function show(Project $project, Twitter $twitter){
    	
        // dd($twitter);
    	return view('projects.show', compact('project'));
    }

    public function edit(Project $project){

    	return view('projects.edit', compact('project'));
    }

    public function update(Project $project){

    	$project->title = request('title');
    	$project->description = request('description');

    	$project->save();
    	return redirect('/projects');

    }

    public function destroy(Project $project){

    	$project->delete();
    	return redirect('/projects');

    }

    public function store(){
    	
    	$attributes = request()->validate([
    		'title' => ['required','min:3', 'max:255'],
    		'description' => ['required','min:3'],
    		'password' => ['required', 'confirmed']
    	]);

    	Project::create($attributes);

    	return redirect('/projects');
    }
}
