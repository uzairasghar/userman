@extends('layouts.app')

@section('content')
<a href="{{route('productshow',['id' => $product->id])}}" class="btn btn-default">Go Back</a>
    <h1>Edit Product</h1>
    {!! Form::open(['route' => ['productupdate', $product->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'name'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Descripstion')}}
            {{Form::text('description', $product->description, ['class' => 'form-control', 'placeholder' => 'description'])}}
        </div>
        <div class="form-group">
            {{Form::label('price', 'Price')}}
            {{Form::text('price', $product->price, ['class' => 'form-control', 'placeholder' => 'price'])}}
        </div>

        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection