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
				  <li role="presentation" ><a href="{{route('user_main')}}">Activity History</a></li>
				  <li role="presentation" class="active"><a href="{{route('user_mr')}}">M.R</a></li>
				   <li role="presentation" ><a href="{{route('user_logout')}}">Logout</a></li>
				  
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-9 ">
		<div class="panel panel-primary row">
			<div class="panel-heading">
				<h3 class="text-center">M.R Item List</h3>
			</div>
			<div class="panel-body">
				
				<div>
					
					<!-- <form class="pull-right" action="{{route('staff_search')}}" method="POST">
						@if($errors->has('search'))
							<span class="help-block">{{$errors->first('search')}}</span>
						@endif
						<input type="text" name="search" class="" required="">
						<button type="submit" class="btn btn-info btn-xs">Search</button>
						{{csrf_field()}}
					</form> -->


				</div>
				

				
			</div>
			
		</div>
	</div>
	</div>

	
</div>
@endsection

@section('scripts')

@endsection