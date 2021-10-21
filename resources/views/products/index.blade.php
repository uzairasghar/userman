@extends('layouts.app')

@section('content')

<h1>Products</h1>
    @if(count($product) > 0)
        @foreach($product as $products)
            <div class="well">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/products/{{$products->id}}">{{$products->name}}</a></h3>
                        <h4>{{ $products->description }}</h4>
                        <h4>Price: {{ $products->price }}</h4>
                        <small>Written on {{$products->created_at}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {!!$product->links()!!}
        <br>
    @else
        <p>No posts found</p>
    @endif
    <a href="products/create"><button class="btn btn-primary">Add Product</button></a>

@endsection