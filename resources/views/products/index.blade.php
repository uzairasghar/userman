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

@include('inc.navbar')
<title>{{ config('app.name', 'Laravel') }}</title>
<meta name="csrf-token" content="{{ csrf_token() }}"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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
    <a href="{{ route('export') }}" class="btn btn-primary">Export to Excel/CSV</a>
</div>

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
				<input type="hidden" value="delete" name="_method" />
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

		var id;

        $(document).on('click', '.delete', function(){
	    	id = $(this).attr('id');
	    	$('#confirmModal').modal('show');
			alert(id);
	    });

	    $('#ok_button').click(function(){
			// var action_url = '';
	    	$.ajax({
				// action_url: "{{ route('productdestroy',['id' => "106"]) }}",
                method : "DELETE",
                url: "products/"+id,
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