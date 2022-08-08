@extends('layouts.layout')
@section('content')
<style>
   .container{
    width:100vw;
   }
   .container > div{
    width:50%;
   }
</style>
<div>
<div class="container d-flex justify-content-center" style="padding-left:15%;padding-top:2%;">
    <div class="">
         @include('conversations.users',['users' => $users])
    </div>
    <div class="">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-header text-center"> {{ $user->name }} </div>
                <div class="card-body conversations">
                @if ($messages->hasMorePages())
                    <div class="text-center">
                        <a href="{{ $messages->nextPageUrl() }}" class="btn btn-light">
                            Voir les messages precedents
                        </a>
                    </div><br/>
                @endif
                    @foreach ($messages as $message )
                        <div class="row">
                            <div class="col-md-10 {{ $message->from->id !== $user->id ?
                            'offset-md-8 text-right' : '' }}">
                                <p>
                                    <strong> {{ $message->from->id !== $user->id ? 'Moi' : 
                                    $message->from->name }}</strong><br/>
                                    {!! nl2br(e($message->content)) !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                     @if ($messages->previousPageUrl())
                    <div class="text-center">
                        <a href="{{ $messages->previousPageUrl() }}" class="btn btn-light">
                            Voir les messages Suivant
                        </a>
                    </div>
                @endif
                    {{-- @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach (@errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}
                    


                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="d-flex mt-4">
                        <div class="form-group col-11">
                            <textarea name="content" placeholder="Ecrivez votre message" style="resize:none;" class="form-control"></textarea>
                        </div>
                        <div class="col-3">
                        <button class="btn" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
  <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
</svg></button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection