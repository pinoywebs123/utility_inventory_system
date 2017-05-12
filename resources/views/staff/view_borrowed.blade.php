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
		background-color: #060b0f;
	}
</style>
@endsection

@section('contents')
<div class="container">
	<div class="jumbotron">
		<h2 class="text-center">School University Utility Inventory System</h2>
	</div>
	<div class="col-md-3 ">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3>My Profile</h3>
			</div>
			<div class="panel-body">
				<p><strong>Name:</strong>{{Auth::user()->lname}}, {{Auth::user()->fname}} {{Auth::user()->mname}}</p>

				<ul class="nav nav-pills nav-stacked">
				  <li role="presentation" ><a href="{{route('staff')}}">List</a></li>
				  <li role="presentation"><a href="{{route('logout')}}">Logout</a></li>
				  
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-9 ">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="text-center">Details</h3>
			</div>
			<div class="panel-body">
				@if(Session::has('quantity'))
					<div class="alert alert-success">{{Session::get('quantity')}}</div>
				@endif
				<table class="table">
					<thead>
						<tr>
							<th>Item Name</th>
							<th>Quantity</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($borrowers as $borrower)
							<tr>
								<td>{{$borrower->item->name}}</td>
								<td>{{$borrower->quantity}}</td>
								<td>{{$borrower->borrower->lname}}</td>
								<td>{{$borrower->borrower->fname}}</td>
								<td>{{$borrower->borrower->mname}}</td>
								<td>{{$borrower->created_at->diffForHumans()}}</td>
								<td>
									<a href="{{route('staff_return', ['item_id'=> $find_item->id,'borrowed_id'=> $borrower->id])}}" class="btn btn-danger btn-xs">return</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')

@endsection