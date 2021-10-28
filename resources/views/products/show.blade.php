@extends('layouts.app')

@section('content')
    <a href="{{route('products')}}" class="btn btn-default">Go Back</a>
    <h1>{{$product->name}}</h1>
    <div>
        Model: {!!$product->description!!}
    </div>
    <div>
        Price: {!!$product->price!!}
    </div>
    <hr>
    <small>Written on {{$product->created_at}}</small>
    <hr>
            <a href="{{route('productedit',['id' => $product->id])}}" class="btn btn-default">Edit</a>

            {!!Form::open(['route' => ['productdestroy', $product->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}

@endsection