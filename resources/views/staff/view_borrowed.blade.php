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
				<h3>My Profile</h3>
			</div>
			<div class="panel-body">
				<p><strong>Name:</strong>{{Auth::user()->lname}}, {{Auth::user()->fname}} {{Auth::user()->mname}}</p>

				<ul class="nav nav-pills nav-stacked">
				  <li role="presentation" class="active"><a href="{{route('staff')}}">Items</a></li>
				 <li role="presentation"><a href="{{route('staff_inventory')}}">Inventory</a></li>
				  <li role="presentation"><a href="{{route('staff_report')}}">Reports</a></li>
				  <li role="presentation"><a href="{{route('logout')}}">Logout</a></li>
				  
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-9 ">
		<div class="panel panel-primary row">
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
							<th>Full Name</th>
							
							<th>Borrowed Time</th>
							<th>Days to Return</th>
							<th>Due Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($borrowers as $borrower)
							<tr>
								<td>{{$borrower->item->name}}</td>
								<td>{{$borrower->quantity}}</td>
								<td>{{$borrower->borrower->fname}} {{$borrower->borrower->mname}} {{$borrower->borrower->lname}} </td>
								
								<td>{{$borrower->created_at->diffForHumans()}}</td>
								<td>{{$borrower->days['days']}}</td>
								<td>
									@if($borrower->created_at->diffInDays() > $borrower->days['days'])
										<button class="btn btn-danger btn-xs" disabled="">Due Already</button>
									@else
										<button class="btn btn-success btn-xs" disabled="">Not Yet Due</button>
									@endif
								</td>
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