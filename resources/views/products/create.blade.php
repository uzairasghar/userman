@extends('layouts.app')

@section('content')
    <h1>Add Product</h1>
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{route('productstore')}}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="description" class="col-md-4 control-label">Description</label>

                <div class="col-md-6">
                    <input id="description" type="description" class="form-control" name="description" value="{{ old('description') }}" required>

                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                <label for="price" class="col-md-4 control-label">Price</label>

                <div class="col-md-6">
                    <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required>

                    @if ($errors->has('price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Add
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection