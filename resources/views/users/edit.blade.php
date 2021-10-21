@extends('layouts.app')

@section('content')
<a href="/users/{{$user->id}}" class="btn btn-default">Go Back</a>
    <h1>Edit user</h1>
    {!! Form::open(['action' => ['UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files'=>true]) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'name'])}}
        </div>
        <div class="form-group">
            {{Form::label('dob', 'Date of Birth')}}<br>
            {{Form::date('dob', \Carbon\Carbon::now())}}
        </div>
        <div class="form-group">
            {{Form::label('picture', 'Picture')}}
            {{Form::file('picture')}}
            {{-- {{Form::text('price', $user->price, ['class' => 'form-control', 'placeholder' => 'price'])}} --}}
        </div>

        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection