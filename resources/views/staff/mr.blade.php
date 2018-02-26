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
	<div class="">
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
				  <li role="presentation" ><a href="{{route('staff')}}">Items</a></li>
				  <li role="presentation"><a href="{{route('staff_inventory')}}">Inventory</a></li>
				  <li role="presentation" class="active"><a href="{{route('staff_mr')}}">M.R</a></li>
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
				<h3 class="text-center">Utility Item List</h3>
			</div>
			<div class="panel-body">
				@if(Session::has('borrow'))
					<div class="alert alert-success">{{Session::get('borrow')}}</div>
				@endif
				@if(Session::has('item'))
					<div class="alert alert-success">{{Session::get('item')}}</div>
				@endif
				<div>
					


				</div>
				<div>
					<ol class="breadcrumb">
					  <li><a href="{{route('staff_mr')}}">Unclaim</a></li>
					  <li><a href="#">Claim</a></li>
					  <li class="pull-right">
					  	
					  </li>
					</ol>
				</div>
				<a href="#" class="btn btn-info btn-xs">New M.R</a>
				<table class="table">
					<thead>
						<tr>
							<th>Quantity</th>
							<th>Description</th>
							<th>Property Number</th>
							<th>Date Aquired</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
			<
		</div>
	</div>
	</div>

	
</div>
@endsection

@section('scripts')

@endsection