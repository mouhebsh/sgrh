@extends('layouts.layout')
@section('content')



 <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4>
                    </div>
                </div>
            </div>
           
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/large/img1.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="{{asset('plugins/images/users/genu.jpg')}}"
                                                class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white mt-2">{{$employees->name}}</h4>
                                        <h5 class="text-white mt-2">{{$employees->email}}</h5>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box mt-5 d-md-flex">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <h1> {{$employees->job->name}}</h1>
                                    @if ($employees->teamleader == 1)
                                    <h4> Team Leader</h4>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body employee-info-flex">
                              <div>
                                <h5 class="card-title">Name : </h5><br/>
                                <p class="card-text">Address : </p><br/>
                                <p class="card-text">Phone : </p><br/>
                                <p class="card-text">Email : </p><br/>
                                <p class="card-text">Job : </p><br/>
                                <p class="card-text">Project : </p><br/>
                                <p class="card-text">Birthday : </p><br/>
                              </div>
                              <div>
                              <h5 class="card-title">{{ $employees->name }}</h5><br/>
                                <p class="card-text">{{ $employees->address }}</p><br/>
                                <p class="card-text">{{ $employees->phone }}</p><br/>
                                <p class="card-text">{{ $employees->email }}</p><br/>
                                <p class="card-text">{{ $employees->job->name }}</p><br/>
                                @if (!$employees->project_id)
                                <p> No project Yet </p><br/>
                                @else 
                                <p class="card-text">{{ $employees->project->name }}</p><br/>
                                @endif
                                <p class="card-text">{{ $employees->birthday }}</p><br/>
                              </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                
            </div>
           
            <footer class="footer text-center"> 2022 © Satoripop Summer Internship <a
                    href="https://www.satoripop.com/">Satoripop.com</a>
            </footer>
           
        </div>






 

@endsection





