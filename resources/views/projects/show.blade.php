
@extends('layout')            
@section('content')
	<h1 class="title">{{$project->title}}</h1>

	<div class="content">
		{{$project->description}}
	</div>

	@if ($project->tasks->count())
	<div>
		@foreach ($project->tasks as $task)
			<li>
				<form method="POST" action="/tasks/{{$task->id}}">
					@method('PATCH')
    				{{csrf_field()}}
					<label class="checkbox" for="completed">
						<input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' :''}}/>
						{{$task->description}}
					</label>
				</form>
			</li>
		@endforeach
	</div>
	@endif
@endsection