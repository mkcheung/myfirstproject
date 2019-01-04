<!doctype html>
<html>
    <head>
    	<title>Create a new project</title>
    </head>
    <form method="POST" action="/projects">
    	{{csrf_field()}}
        <div class="control">
        	<input type="text" class="input {{ $errors->has('title') ? 'is-danger' : ''}}" name="title" placeholder="Project title">
        </div>
        <div class="field">
        	<textarea name="description" placeholder="Project description"></textarea> 
        </div>
        <div class="field">
        	<button type="submit">Create Project</button> 
        </div>
        @if ($errors->any())
        	<div class="notification is-danger">
        		<ul>
        			@foreach($errors->all() as $error)
        				<li>{{$error}}</li>
        			@endforeach
        		</ul>
        	</div>
        @endif
    </form>
</html>