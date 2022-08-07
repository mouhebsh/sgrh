@extends('layouts.layout')
@section('content')

<div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Jobs Dashboard</h4>
                    </div>
                </div>
            </div>
           
            <div class="container-fluid">
            
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Jobs</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success">{{count($jobs)}}</span></li>
                            </ul>
                        </div>
                    </div>

@can('user-create')
                    <div class="col-lg-8 col-md-12">
                    <form class="form-horizontal form-material" action="{{ url('job')}} " method="post">
                        {!! csrf_field() !!}

                        <div class="white-box analytics-info ">
                            <div>
                                <h3 class="box-title">Add New Job</h3>
                                <ul class="list-inline two-part d-flex align-items-center mb-0">
                                    <li class="center">
                                        <div class="semi-container">
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Job Name</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <input type="text" name="name" id="job"
                                                            class="form-control p-0 border-0"> </div>
                                            </div>                                
                                            <div class="form-group mb-4">
                                                <label class="col-md-12 p-0">Job Salary</label>
                                                    <div class="col-md-12 border-bottom p-0">
                                                        <input type="text" name="salary" id="job_salary"
                                                            class="form-control p-0 border-0"> </div>
                                            </div>
                                            <div class="form-group mb-4 save-btn">
                                                <div class="col-sm-12">
                                                <input type="submit" value="Save" class="btn btn-success"><br/>
                                                </div>
                                            </div>
                                            <div>
                                                @include('users.alert')
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div>



                            </div>
                        </div>
                    </form>
                    </div>
                    @endcan
                <!-- ============================================================== -->
                <!-- dashboard -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Employees</h3>
                            </div>
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Job Name</th>
                                        <th>Job Salary</th>
                                        <th>Number Of Employees</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($jobs as $item)
                                    <tr>
                                        <td>{{$item->id}}  </td>
                                        <td> {{$item->name}} </td>
                                        <td>{{$item->salary}}  </td>
                                        <td> {{ count($item->users)}} </td>

                                       
                                        <style>
                                        .buttons-flex{
                                            display:flex;
                                            flex-direction:row;
                                            justify-content:space-between;
                                            gap:0.2rem;
                                        }
                                        </style>
                                        @can('user-delete')
 
                                        <td class="buttons-flex">
                                            <form  method="POST" action="{{ url('/user' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick="return confirm(&quot;Are You Sure You Want To Delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            <footer class="footer text-center"> 2022 © Satoripop Summer Internship <a
                    href="https://www.satoripop.com/">Satoripop.com</a>
            </footer>



@endsection
    