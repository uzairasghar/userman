{{-- @extends('layouts.app')

@section('content') --}}

{{-- <h1>Products</h1>
    @if(count($product) > 0)
        @foreach($product as $products)
            <div class="well">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="{{route('productshow',['id' => $products->id])}}">{{$products->name}}</a></h3>
                        <h4>{{ $products->description }}</h4>
                        <h4>Price: {{ $products->price }}</h4>
                        <small>Written on {{$products->created_at}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {!!$product->links('vendor.pagination.default')!!}
        <br>
    @else
        <p>No posts found</p>
    @endif
    <a href="{{route('productcreate')}}"><button class="btn btn-primary">Add Product</button></a>

    <a href="{{ route('export') }}" class="btn btn-primary">Export to Excel/CSV</a> --}}


{{-- 
<head>
    <title>Laravel 8|7 Datatables Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
    
<div class="container mt-5">
    <h2 class="mb-4">Laravel 7|8 Yajra Datatables Example</h2>
    <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(function () {
        
        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('products') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'price', name: 'price'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
        
    });
</script>
@endsection --}}

{{-- <!DOCTYPE html>
<html> --}}

    <head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<title>{{ config('app.name', 'Laravel') }}</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav">
                <li><a href="{{route('index')}}">Home</a></li>
                <li><a href="{{route('about')}}">About</a></li>
                <li><a href="{{route('services')}}">Services</a></li>
                <li><a href="{{route('products')}}">Products</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/users">Dashboard</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div align="right" style="margin-right: 115px;">
    <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Create Record</button>
</div>
<br>
<div class="container mt-5">
    <table id="user_table" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<a href="{{ route('export') }}" class="btn btn-primary">Export to Excel/CSV</a>
<div id="formModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Add New Record</h4>
      		</div>
      		<div class="modal-body">
      			<span id="form_result"></span>
      			<form method="post" id="sample_form" class="form-horizontal">
                    {{-- @method('PUT') --}}
                    @csrf
      				<div class="form-group">
        				<label class="control-label col-md-4" >Name: </label>
        				<div class="col-md-8">
        					<input type="text" name="name" id="name" class="form-control" />
        				</div>
        			</div>
        			<div class="form-group">
        				<label class="control-label col-md-4">Description: </label>
        				<div class="col-md-8">
        					<input type="text" name="description" id="description" class="form-control" />
        				</div>
        			</div>
                    <div class="form-group">
        				<label class="control-label col-md-4">Price: </label>
        				<div class="col-md-8">
        					<input type="text" name="price" id="price" class="form-control" />
        				</div>
        			</div>
              		<br />
              		<div class="form-group" align="center">
              			<input type="hidden" name="action" id="action" value="Add" />
              			<input type="hidden" name="hidden_id" id="hidden_id" />
              			<input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
              		</div>
      			</form>
      		</div>
    	</div>
    </div>
</div>


<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
            	<button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('products') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'price', name: 'price'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ]
        });
    
        $('#create_record').click(function(){
	    	$('.modal-title').text('Add New Record');
	    	$('#action_button').val('Add');
	    	$('#action').val('Add');
	    	$('#form_result').html('');
	    	$('#formModal').modal('show');
	    });

        $('#sample_form').on('submit', function(event){
	    	event.preventDefault();
	    	var action_url = '';
            var type = '';
    	    if($('#action').val() == 'Add')
    	    {
    	    	action_url = "{{ route('productstore') }}";
                type = 'POST'
    	    }
            
            if($('#action').val() == 'Edit')
    	    {
    	    	action_url = "{{ route('productupdate',['id' => "id"]) }}";
                type = 'PUT'
            }
    	    $.ajax({
    	    	url: action_url,
    	    	method: type,
    	    	data:$(this).serialize(),
    	    	dataType:"json",
    	    	success:function(data)
    	    	{
    	    		var html = '';
    	    		if(data.errors)
    	    		{
    	    			html = '<div class="alert alert-danger">';
    	    			for(var count = 0; count < data.errors.length; count++)
    	    			{
    	    				html += '<p>' + data.errors[count] + '</p>';
    	    			}
    	    			html += '</div>';
    	    		}
    	    		if(data.success)
    	    		{
    	    			html = '<div class="alert alert-success">' + data.success + '</div>';
    	    			$('#sample_form')[0].reset();
    	    			$('#user_table').DataTable().ajax.reload();
    	    		}
    	    		$('#form_result').html(html);
    	    	}
    	    });
    	});
        
        $(document).on('click', '.edit', function(){
			var id = $(this).attr('id');
			$('#form_result').html('');
			$.ajax({
				url :"/products/"+id+"/edit",
				dataType:"json",
				success:function(data)
				{
					$('#name').val(data.result.name);
					$('#description').val(data.result.description);
                    $('#price').val(data.result.price);
					$('#hidden_id').val(id);
					$('.modal-title').text('Edit Record');
					$('#action_button').val('Edit');
					$('#action').val('Edit');
					$('#formModal').modal('show');
				}
			})
		});

        var user_id;

        $(document).on('click', '.delete', function(){
	    	user_id = $(this).attr('id');
	    	$('#confirmModal').modal('show');
	    });

	    $('#ok_button').click(function(){
	    	$.ajax({
	    		// action_url: "{{ route('productdestroy',['id' => "userid"]) }}",
                method : "Delete",
                url: "products/"+user_id,
                dataType: "json",
	    		beforeSend:function(){
	    			$('#ok_button').text('Deleting...');
	    		},
	    		success:function(data)
	    		{
	    			setTimeout(function(){
	    				$('#confirmModal').modal('hide');
	    				$('#user_table').DataTable().ajax.reload();
	    				alert('Data Deleted');
	    			}, 500);
	    		}
	    	})
	    });
    });
</script>
{{-- </html> --}}