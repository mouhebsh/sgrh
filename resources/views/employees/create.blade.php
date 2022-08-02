@extends('layouts.layout')
@section('content')
<style>
  .add-user {
    display:flex;
    width:100%;
    justify-content:center;
  }

 

</style>

<div class="page-wrapper">
           <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Add New Employee</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row add-user">
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                            @include('employees.alert')

                                <form class="form-horizontal form-material" action="{{ url('employee')}} " method="post">
                                          {!! csrf_field() !!}

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Full Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="name" id="name"
                                                class="form-control p-0 border-0"> </div>
                                    </div>


                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Address</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="address" id="address"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>


                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Mobile</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="phone" id="mobile" class="form-control p-0 border-0">
                                        </div>
                                    </div>


                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" name="email" id="email"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" name="password" id="password"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Birthday</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="date" id="start" name="birthday" 
                                            class="form-control p-0 border-0" value="<?php echo (new DateTime())->format('Y-m-d'); ?>">
                                        </div>
                                    </div>




                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">--Which Job  ?-- </label>
                                        <div class="col-sm-12 border-bottom">
                                            <select name="job" id="job" class="form-select shadow-none p-0 border-0 form-control-line">
                                                @foreach ($jobs as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">--Which Project  ?-- </label>
                                        <div class="col-sm-12 border-bottom">
                                            <select name="project_name" id="project" class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="{{null}}"></option> 
                                                @foreach ($projects as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4 save-btn">
                                        <div class="col-sm-12">
                                          <input type="submit" value="Save" class="btn btn-success"><br/>
                                        </div>
                                    </div>
                                </form>
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