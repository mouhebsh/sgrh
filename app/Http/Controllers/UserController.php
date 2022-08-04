<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Job;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
    {

        $users = User::all();
        //CONDITION TO REDIRECT RH OR SIMPLE USER
            //PART OF RH
            $countleaders = 0;
            foreach($users as $item){
                if($item->teamleader == 1){$countleaders++;}
            }
            $projects = Project::all();
            return view('users.index')->with('users', $users)->with('teamleaders',$countleaders)->with('projects',$projects);
    }




    public function create()
    {
        $jobs = Job::all();
        $projects = Project::all();
        return view('users.rh.create')->with('jobs', $jobs)->with('projects',$projects);
    }


    public function store(Request $request)
    {
        $employee_job = request('job');
        $job = Job::where('name', $employee_job)->first();
        $project_name = request('project_name');
        $project = Project::where('name', $project_name)->first() ;
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric|digits:8',
                'email' => 'required|email|unique:users'
            ],
            [
                'name.required' => 'You have to Input a name',
                'address.required' => 'You have to Input an address',
                'phone.required' => 'You have to Input a Phone number',
                'phone.numeric' => 'The phone number can not have symbols either numbers',
                'phone.digits' => 'The phone number must have only 8 digits',
                'email.required' => 'You have to Input a email',
                'email.email' => 'this could not be and email format',
                'email.unique' => 'this email is already used Check if you have done the registration'

            ]
        );


        $user =  new User();
        $user->name = request('name');
        $user->address = request('address');
        $user->phone = request('phone');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->job_id = $job->id;
        if ($project == null){ 
            $user->project_id = null;
        }
        else{
            $user->project_id = $project->id;
        }
        $user->job_id = $job->id;
        $user->birthday = request('birthday');
        $user->teamleader = 0;
        if ($user->save()) {
            return redirect('user')->with('success', 'User Stored Successfully.');
        }
    }



    public function show($id)
    {
        $user = User::find($id);
        return view('users.show')->with('users', $user);
    }


    public function edit($id)
    {
        $jobs = Job::all();
        $projects = Project::all();
        $user = User::find($id);
        return view('users.rh.edit')->with('users', $user)->with('jobs',$jobs)->with('projects',$projects);
    }


    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required|numeric|digits:8',
                'email' => 'required|email'
            
                
            ],
            [
                'name.required' => 'You have to Input a name',
                'address.required' => 'You have to Input an address',
                'phone.required' => 'You have to Input a Phone number',
                'phone.numeric' => 'The phone number can not have symbols either numbers',
                'phone.digits' => 'The phone number must have only 8 digits',
                'email.required' => 'You have to Input a email',
                'email.email' => 'this could not be and email format',
                'email.unique' => 'this email is already used Check if you have done the registration'

            ]
        );
        $user = User::find($id);
        $user_job = request('job');
        $job = Job::where('name', $user_job)->first();
        $user->name = request('name');
        $user->address = request('address');
        $user->password = Hash::make(request('password'));
        $user->phone = request('phone');
        $user->email = request('email');
        $user->job_id = $job->id;
        $user->birthday = request('birthday');
        if(isset($_POST['project_name'])){
            $employee_project = request('project_name');
            $project = Project::where('name', $employee_project)->first();
            $user->project_id = $project->id;
        }

        if ($user->save()) {
            return redirect('user')->with('success', 'User Stored Successfully.');
        }
       
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('user')->with('flash_message', 'Employee deleted!');
    }
    



}
