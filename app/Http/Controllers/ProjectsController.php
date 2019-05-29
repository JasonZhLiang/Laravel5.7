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

    public function store()
    {
        $project = new Project();
        $project->title = request('title');
        $project->description = request('description');
        $project->save();

        return redirect('/projects');//whenever you call redirect, by default it will be a get request.
//        return request()->all();
//        return request('title');
    }
}
