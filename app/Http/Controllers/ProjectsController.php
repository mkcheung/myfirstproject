<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Services\Twitter;
use App\Events\ProjectCreated;
use App\Mail\ProjectCreated;
use Mail;

class ProjectsController extends Controller
{

    public function __construct(){
        //except and only can constrain the range to which this applies
        $this->middleware('auth');
    }

    public function index(){
        // $projects = Project::all();
        // $projects = Project::where('owner_id', auth()->id())->get();

        $projects = auth()->user()->projects;

    	return view('projects.index', [
    		'projects' => $projects
    	]);
    }
    public function create(){

    	return view('projects.create');
    }

    public function show(Project $project, Twitter $twitter){
    	
        // abort_if($project->owner_id !== auth()->id(), 403);
        $this->authorize('update', $project);
    	return view('projects.show', compact('project'));
    }

    public function edit(Project $project){

    	return view('projects.edit', compact('project'));
    }

    public function update(Project $project){

    	$project->update($this->validateProject());
    	return redirect('/projects');

    }

    public function destroy(Project $project){

    	$project->delete();
    	return redirect('/projects');

    }

    protected function validateProject(){
        return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);
    }

    public function store(){

    	$attributes = $this->validateProject();

        $attributes['owner_id'] = auth()->id();
        
    	$project = Project::create($attributes);

    	return redirect('/projects');
    }
}
