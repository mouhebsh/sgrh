<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        $projects = Project::all();
        return view('projects.index')->with('projects', $projects)->with('employees',$employees);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( 
        [
            'name' => 'required',
            'leader' => 'required',
            'deadline' => 'required'
        ],
        [
            'name.required' => 'You have to Input a project name',
            'leader.required' => 'You have to Input a leader for the project',
            'deadline.required' => 'You have to Input a deadline for the project',
        ]
    );
   $project = new Project;
   $project->name = request('name');
   $project->leader = request('leader');
   $project->owner = request('owner');
   $project->deadline = request('deadline');
   $emp_leader = request('leader'); 
   
   if( $project->save()){
       DB::table('employees')->where('name', $emp_leader)->update(array(
         'teamleader' => 1,
         'project_id' => $project->id,
        ));
    return redirect('project')->with('success', 'Project Stored Successfully.');
    }
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $employees = Employee::all();
        return view('projects.edit')->with('projects',$project)->with('employees',$employees);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        
        $request->validate( 
            [
                'name' => 'required',
                'leader' => 'required',
                'deadline' => 'required'
            ],
            [
                'name.required' => 'You have to Input a project name',
                'leader.required' => 'You have to Input a leader for the project',
                'deadline.required' => 'You have to Input a deadline for the project',
            ]
        );
       $project->name = request('name');
    //    $project->leader = request('leader');
       $project->owner = request('owner');
       $project->deadline = request('deadline');
       $newleader = request('leader'); // el input jdida mtaa el employee leader $emp_leader
      
       if($project->leader == $newleader){
            if( $project->save()){
                return redirect('project')->with('success', 'Project Stored Successfully.');
            }
        }
        else{
            $exleader = $project->leader;
            $project->leader = $newleader;
            if( $project->save()){
                DB::table('employees')->where('name', $newleader)->update(array(
                'project_id' => $project->id,
                'teamleader' => 1,
                ));
                DB::table('employees')->where('name', $exleader)->update(array(
                'project_id' => null,
                'teamleader' => 0,
                ));
                
            return redirect('project')->with('success', 'Project updated Successfully.');
        }     
 }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::destroy($id);
        // $employee = 
        return redirect('project')->with('flash_message', 'Project deleted!');
    }
}
