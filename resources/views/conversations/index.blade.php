 
@extends('layouts.layout')
@section('content')
<style>
.container > div{
    width:50%;
   }
</style>
<div class="container " style="padding-left:15%;padding-top:2%;" >
    @include('conversations.users',['users' => $users])
</div>


@endsection