@extends('layouts.app')

@section('content')
    <a href="/users" class="btn btn-default">Go Back</a>
    <h1>{{$user->name}}</h1>
    <div>
        <b>Email:</b> {!!$user->email!!}
    </div>
    <div>
        <b>Date of Birth:</b> {!!$user->dob!!}
    </div>
    <b>Picture:</b>
    <div>
        <img src="{{asset("/storage/cover_images/".$user->picture)}}" width="150px" height="150px" />
    </div>
    <hr>
    <small>Created on {{$user->created_at}}</small>
    <hr>
    <a href="/users/{{$user->id}}/edit" class="btn btn-default">Edit</a>
    {{-- {!!Form::open(['action' => ['UsermanController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!} --}}
@endsection