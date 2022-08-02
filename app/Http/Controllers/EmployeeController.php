<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Job;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{


    public function index()
    {
        $employees = Employee::all();
        $countleaders = 0;
        foreach($employees as $item){
            if($item->teamleader == 1){$countleaders++;}
        }
        $projects = Project::all();
        return view('employees.index')->with('employees', $employees)->with('teamleaders',$countleaders)->with('projects',$projects);
    }




    public function create()
    {
        $jobs = Job::all();
        $projects = Project::all();
        return view('employees.create')->with('jobs', $jobs)->with('projects',$projects);
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
                'email' => 'required|email|unique:employees'
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


        $employee =  new Employee();
        $employee->name = request('name');
        $employee->address = request('address');
        $employee->phone = request('phone');
        $employee->email = request('email');
        $employee->password = Hash::make(request('password'));
        $employee->job_id = $job->id;
        if ($project == null){ 
            $employee->project_id = null;
        }
        else{
            $employee->project_id = $project->id;
        }
        $employee->job_id = $job->id;
        $employee->birthday = request('birthday');
        $employee->teamleader = 0;
        if ($employee->save()) {
            return redirect('employee')->with('success', 'User Stored Successfully.');
        }
    }



    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show')->with('employees', $employee);
    }


    public function edit($id)
    {
        $jobs = Job::all();
        $projects = Project::all();
        $employee = Employee::find($id);
        return view('employees.edit')->with('employees', $employee)->with('jobs',$jobs)->with('projects',$projects);
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
        $employee = Employee::find($id);
        $employee_job = request('job');
        $job = Job::where('name', $employee_job)->first();
        $employee->name = request('name');
        $employee->address = request('address');
        $employee->password = Hash::make(request('password'));
        $employee->phone = request('phone');
        $employee->email = request('email');
        $employee->job_id = $job->id;
        $employee->birthday = request('birthday');
        if(isset($_POST['project_name'])){
            $employee_project = request('project_name');
            $project = Project::where('name', $employee_project)->first();
            $employee->project_id = $project->id;
        }

        if ($employee->save()) {
            return redirect('employee')->with('success', 'User Stored Successfully.');
        }


       
    }


    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect('employee')->with('flash_message', 'Employee deleted!');
    }
    public function login(){
        return view('employees.login');
    }


    public function authenticate(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

// dd($credentials);
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            $request->session()->put('name', Auth::user()->name);
            return redirect('employee')->with(['success' => "logged in successfully !"]);
        }
        else{

            return back()->withErrors(['failed'=>"Invalid Username or Password !"]);
        }

    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }



}
