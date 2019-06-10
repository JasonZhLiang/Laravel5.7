@extends('layout')

@section('title','edit project')

@section('content')

    <h1 class="title">Edit Project</h1>
{{--base on the Restful convention, we should send form with PATHC method, but since browser doesn't support PATCH method, so we need a way to tell Laravel routing accordingly--}}
    {{--<form method="PATCH" action="/projects/{{ $project->id }}">--}}

    <form method="POST" action="/projects/{{ $project->id }}" style="margin-bottom: 1em">
        {{ method_field('PATCH') }}

        {{ csrf_field() }}
        <div class="field">
            <label for="title" class="label">Title</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">
            </div>
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>

            <div class="control">
                <textarea class="textarea" name="description">{{ $project->description }}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
            </div>
        </div>
    </form>

    {{--add delete project button, we need create another form--}}
    <form method="POST" action="/projects/{{ $project->id }}">
        {{--{{ method_field('DELETE') }}--}}
        {{--{{ csrf_field() }}--}}
        {{--below is shoortcut for above --}}
        @method('DELETE')
        @csrf
        <div class="field">
            <div class="control">
                <button type="submit" class="button">Delete Project</button>
            </div>
        </div>
    </form>
@endsection