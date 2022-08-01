@extends('layouts.layout')
@section('content')


 <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit {{$projects->name}}</h4>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <div class="row">
                
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                               @include('employees.alert')

                                <form class="form-horizontal form-material" action="{{ url('project/' .$projects->id) }}" method="post">
                                          {!! csrf_field() !!}
                                            @method("PATCH")
                                  <input type="hidden" name="id" id="id" value="{{$projects->id}}" id="id" />

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Project Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="name" id="name"
                                                class="form-control p-0 border-0" value="{{$projects->name}}" > </div>
                                    </div>


                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Project Leader</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <select name="leader" id="projectleader" class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="{{$projects->leader}}">{{$projects->leader}}</option>
                                                @foreach ($employees as $item)
                                                @if($item->name != $projects->leader)                                                
                                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                                
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Project Owner</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="owner" id="owner" class="form-control p-0 border-0"
                                            value="{{$projects->owner}}">
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Project Deadline</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="date" id="deadline" name="deadline" 
                                            class="form-control p-0 border-0" value="{{$projects->deadline}}">
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






