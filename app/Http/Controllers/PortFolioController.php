<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Events\ProjectSaved;
use Illuminate\Support\Facades\Storage;

class PortFolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::latest()->paginate();
        return view ('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create', [
            'project' => new Project
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = request()->validate([
            'title' => 'required',
            'url' => ['required', 'unique:projects'],
            'description' => 'required',
            'image' => ['required', 'image']
        ]);
        
        $project = new Project($fields);
        $project->image = $request->file('image')->store('images');
        $project->save();

        ProjectSaved::dispatch($project);

        return redirect()->route('portfolio.index')->with('status', 'el projecto ha sido creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //$project = Project::findOrFail($id);
        return view('projects.show', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $fields = request()->validate([
            'title' => 'required',
            'url' => ['required'],
            'description' => 'required',
            'image' => ['required', 'image']
        ]);

        if($request->hasFile('image')) {
            Storage::delete($project->image);
            $project->fill($fields);
            $project->image = $request->file('image')->store('images');
            $project->save();
            ProjectSaved::dispatch($project);
        } else {
            $project->update(array_filter([
                'title' => request('title'),
                'url' => request('url'),
                'description' => request('description')
            ]));
        }
        
        return view('projects.show', [
            'project' => $project
        ])->with('status', 'el projecto ha sido actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('portfolio.index')->with('status', 'el projecto ha sido borrado con exito');
    }

}
