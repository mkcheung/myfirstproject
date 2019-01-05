
@extends('layout')            
@section('content')
    <h1>Edit Project</h1>

    <form method="POST" action="/projects/{{$project->id}}">
        @method('PATCH')
        @csrf
        <div class='field'>
            <label class="label" for="title">Title</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title" value="{{$project->title}}"/>
            </div>
        </div>
        <div class='field'>
            <label class="label" for="description">Description</label>

            <div class="control">
                <textarea name="description" class="textarea">{{$project->description}}</textarea> 
            </div>
        </div>
        <div class='field'>
            <div class="control">
                <button type="submit" class="button is-link">Update Project</textarea> 
            </div>
        </div>
    </form>

    @include('errors') 

    <form method="POST" action="/projects/{{$project->id}}">
        @method('DELETE')
        @csrf
        <div class='field'>
            <div class="control">
                <button type="submit" class="button">Delete Project</textarea> 
            </div>
        </div>
    </form>
@endsection
