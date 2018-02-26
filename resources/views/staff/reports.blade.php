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
		
		max-height: 100% !important;
		border-right: 2px solid #337ab7;
	}
	
</style>
@endsection

@section('contents')
<div class="container">
	<div >
		<img src="{{URL::to('images/banner.jpg')}}" height="250px" width="100%">
		
	</div>
	<div class="row">
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
				  <li role="presentation" class="active"><a href="{{route('staff_report')}}">Reports</a></li>
				  <li role="presentation"><a href="{{route('logout')}}">Logout</a></li>
				  
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-9 ">
		<div class="panel panel-primary row">
			<div class="panel-heading">
				<h3 class="text-center">Utility Reports </h3>
			</div>
			<div class="panel-body">
				<button id="print_report" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-print"></span></button>
				<table class="table">
					<thead>
						<tr>
							<th>Item Name</th>
							<th>Quantity</th>
							<th>Consumer Name</th>
							<th>Transactin Date</th>
							<th>Operations</th>
						</tr>
					</thead>
					<tbody>
						@foreach($reports as $rep)
							<tr>
								<td>{{$rep->item->name}}</td>
								<td>{{$rep->quantity}}</td>
								<td>{{$rep->borrow->fname}} {{$rep->borrow->lname}}</td>
								<td>{{$rep->created_at->diffForHumans()}}</td>
								<td>
									@if($rep->status == 0)
										borrowed
									@elseif($rep->status == 1)
										returned
									@elseif($rep->status == 3)
										consumed	
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>

				</table>
				
				<center>{{$reports->links()}}</center>
			</div>
			
			
		</div>


	</div>
	</div>

	
</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function(){
		$("#print_report").click(function(){

			window.print();
		});
	});
</script>
@endsection