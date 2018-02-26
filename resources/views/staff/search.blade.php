@extends('template.default')

@section('styles')
<style type="text/css">
	#borrowed{
		background-color: red;
	}
	#quantities{
		background-color: blue;
	}
	body{
		background-color: #2c3e50;
	}
	.panel{
		border: none;
	}
	
	div .panel{
		height: 520px !important;
		border-right: 2px solid #337ab7;
	}
</style>
@endsection

@section('contents')
<div class="container">
	<div >
		<img src="{{URL::to('images/banner.jpg')}}" height="250px" width="100%">
		
	</div>
	<div class="col-md-3 ">
		<div class="panel panel-primary row">
			<div class="panel-heading">
				<h3 class="text-center">My Profile</h3>
			</div>
			<div class="panel-body">
				<div class="thumbnail">
					<p class="text-center"><strong>{{Auth::user()->lname}}, {{Auth::user()->fname}} {{Auth::user()->mname}}</strong></p>
					<p class="text-center">Full Name</p>
				</div>
				<ul class="nav nav-pills nav-stacked">
				  <li role="presentation" class="active"><a href="{{route('staff')}}">Items</a></li>
				  <li role="presentation"><a href="{{route('staff_inventory')}}">Inventory</a></li>
				   <li role="presentation"><a href="{{route('staff_mr')}}">M.R</a></li>
				  <li role="presentation"><a href="{{route('staff_report')}}">Reports</a></li>
				   <li role="presentation" ><a href="{{route('staff_users')}}">Users</a></li>
				  <li role="presentation"><a href="{{route('logout')}}">Logout</a></li>
				  
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-9 ">
		<div class="panel panel-primary row">
			<div class="panel-heading">
				<h3 class="text-center">Utility Inventory List</h3>
			</div>
			<div class="panel-body">
				@if(Session::has('borrow'))
					<div class="alert alert-success">{{Session::get('borrow')}}</div>
				@endif
				@if(Session::has('item'))
					<div class="alert alert-success">{{Session::get('item')}}</div>
				@endif
				<div>
					<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#newItems">New</a>

					<form class="pull-right" action="{{route('staff_search')}}" method="POST">
						@if($errors->has('search'))
							<span class="help-block">{{$errors->first('search')}}</span>
						@endif
						<input type="text" name="search" class="" required="">
						<button type="submit" class="btn btn-info btn-xs">Search</button>
						{{csrf_field()}}
					</form>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>Item Name</th>
							<th>Quantity</th>
							<th>Borrowed</th>
							<th>Date Delivered</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($items as $item)
							<tr>
								<td>{{$item->name}}</td>
								<td><span class="badge" id="quantities">{{$item->quantity}}</span></td>
								<td><a href="{{route('view_borrowed_item', ['item_id'=> $item->id])}}"><span class="badge" id="borrowed">{{$item->borrowed_item($item->id)}}</span></a></td>
								<td>{{$item->created_at->toDayDateTimeString()}}</td>
								<td><a href="{{route('staff_borrow', ['item_id'=> $item->id])}}" class="btn btn-danger btn-xs">Borrow</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			
		</div>
	</div>

	<div class="modal fade" id="newItems">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3>Enter New Items</h3>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" action="{{route('add_item')}}" method="POST">
						<div class="form-group">
							<label class="control-label col-md-3">Item Name</label>
							<div class="col-md-8">
								<input type="text" name="name" class="form-control" required="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Item Quantity</label>
							<div class="col-md-8">
								<input type="number" name="quantity" class="form-control" required="">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8 col-md-offset-3">
								<button class="btn btn-primary" type="submit">Submit</button>
							</div>
							
						</div>
						{{csrf_field()}}
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')

@endsection