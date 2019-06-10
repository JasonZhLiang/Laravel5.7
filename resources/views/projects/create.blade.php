@extends('layout')

@section('title','projects homepage')

@section('content')

    <h1>Create a new Project</h1>

    <form method="POST" action="/projects">
        {{--$middlewareGroups inside kernel.php in Http folder, will apply all the route list there, includes VerifyCsrfToken--}}
        {{csrf_field()}}
        <div>
            <input type="text" name="title" placeholder="Project title">
        </div>
        <div>
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Project description"></textarea>
        </div>
        <div>
            <button type="submit">Create Project</button>
        </div>
    </form>

@endsection