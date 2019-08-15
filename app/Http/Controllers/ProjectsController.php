<?php

namespace App\Http\Controllers;
use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    public function index()
    {
        $projects = Project::all();
//        return $projects;
//        return view('projects.index',['projects' => $projects,] );
        //often it's supposed to be like below, only projects for this user, scope to this user
//        $projects = auth()->user()->projects;
        return view('projects.index',compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }


    public function show($id)
    {
        $project = Project::findOrFail($id);

        return view('projects.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', compact('project'));
    }

    public function update($id)
    {
//        dd(request()->all());
        $project = Project::find($id);
        $project->title = request('title');
        $project->description = request('description');
        $project->save();
        return redirect('/projects');
    }

    public function destroy($id)
    {
        Project::find($id)->delete();
        return redirect('/projects');
    }

    public function store()
    {
//        request() is the way grab information user typed in the form
//        return request()->all();
//        return request('title');
//        return request();//this will return a json object with all the fields you entered and a _token
        $project = new Project();
        $project->title = request('title');
        $project->description = request('description');
        $project->save();
        return redirect('/projects');//whenever you call redirect, by default it will be a get request.
    }
}
