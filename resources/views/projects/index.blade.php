<!doctype html>
<html>
    <head>
    	<title>Laravel</title>
    </head>
    <body>
            <h1>Projects</h1>
    <ul>
        @foreach($projects as $project)

            <li><?= $project->title; ?></li>
        @endforeach
    </ul>
    </body>
</html>