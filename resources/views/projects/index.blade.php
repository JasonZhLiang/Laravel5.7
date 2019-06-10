@extends('layout')

@section('title','projects homepage')

@section('content')

    <h1 class="title">Projects</h1>

    <ul>
        @foreach ($projects as $key=>$project)
            <li>{{$project->title}} [{{$key}}] ({{$project->description}}) {{$project->created_at}}</li>
        @endforeach
    </ul>

@endsection