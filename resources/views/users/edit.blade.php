@extends('layouts.layout')
@section('content')

 <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit {{$users->name}}'s profile</h4>
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
                                        <h4 class="text-white mt-2">{{$users->name}}</h4>
                                        <h5 class="text-white mt-2">{{$users->email}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box mt-5 d-md-flex">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <h1> {{$users->job->name}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    


                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                               @include('users.alert')

                                <form class="form-horizontal form-material" action="{{ url('user/' .$users->id) }}" method="post">
                                          {!! csrf_field() !!}
                                            @method("PATCH")
                                  <input type="hidden" name="id" id="id" value="{{$users->id}}" id="id" />

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Full Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="name" id="name"
                                                class="form-control p-0 border-0" value="{{$users->name}}" > </div>
                                    </div>


                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Address</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="address" id="address"
                                                class="form-control p-0 border-0" value="{{$users->address}}">
                                        </div>
                                    </div>


                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Mobile</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="phone" id="mobile" class="form-control p-0 border-0"
                                            value="{{$users->phone}}">
                                        </div>
                                    </div>


                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" name="email" id="email"
                                                class="form-control p-0 border-0"
                                                value="{{$users->email}}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Birthday</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="date" id="start" name="birthday" 
                                            class="form-control p-0 border-0" value="{{$users->birthday}}">
                                        </div>
                                    </div>


                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">--Which Job ?-- </label>
                                        <div class="col-sm-12 border-bottom">
                                            <select name="job" id="job" class="form-select shadow-none p-0 border-0 form-control-line">
                                                @foreach ($jobs as $item)
                                                <option value="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>     
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">--Which Project ?-- </label>
                                        <div class="col-sm-12 border-bottom">
                                            <select name="project_name" id="project" class="form-select shadow-none p-0 border-0 form-control-line">
                                                @foreach ($projects as $item)
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>     
                                    </div>
                                    </div>
                                    <div class="form-group mb-4 save-btn">
                                        <div class="col-sm-12">
                                          <input type="submit" value="Update" class="btn btn-success"><br>
                                        </div>
                                    </div>
                                </form>

                                
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            
            <footer class="footer text-center"> 2022 © Satoripop Summer Internship <a
                    href="https://www.satoripop.com/">Satoripop.com</a>
            </footer>
          </div>
 





 
@stop






