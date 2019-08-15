@extends('layout')

@section('title','projects homepage')

@section('content')
<div class="content">
    <h1 class="title">Projects</h1>

    <ul class="">
        @foreach ($projects as $key=>$project)
            <li>{{$project->title}} [{{$key}}] ({{$project->description}}) {{$project->created_at}}</li>
        @endforeach
    </ul>
</div>
@endsection