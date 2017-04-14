@extends('template.default')

@section('styles')
<style type="text/css">
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
	<div class="col-md-3">
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
	<div class="col-md-9">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="text-center">Item Name: {{$find_item->name}}</h3>
				<h3 class="text-center">Quantity: <span class="badge">{{$find_item->quantity}}</span></h3>
			</div>
			<div class="panel-body">
				<div class="col-md-6 col-md-offset-3">
					<form action="{{route('borrow_item', ['item_id'=> $find_item->id])}}" method="POST">
						<div class="form-group {{$errors->has('lname') ? 'has-error' : ''}}">
							<label>Quantity</label>
							<input type="text" name="quantity" class="form-control">
							@if($errors->has('quantity'))
								<span class="help-block">{{$errors->first('quantity')}}</span>
							@endif
						</div>
						<div class="form-group {{$errors->has('lname') ? 'has-error' : ''}}">
							<label>Last Name</label>
							<input type="text" name="lname" class="form-control">
							@if($errors->has('lname'))
								<span class="help-block">{{$errors->first('lname')}}</span>
							@endif
						</div>
						<div class="form-group {{$errors->has('fname') ? 'has-error' : ''}}">
							<label>First Name</label>
							<input type="text" name="fname" class="form-control">
							@if($errors->has('fname'))
								<span class="help-block">{{$errors->first('fname')}}</span>
							@endif
						</div>
						<div class="form-group {{$errors->has('mname') ? 'has-error' : ''}}">
							<label>Middle Name</label>
							<input type="text" name="mname" class="form-control">
							@if($errors->has('mname'))
								<span class="help-block">{{$errors->first('mname')}}</span>
							@endif
						</div>
						<button type="submit" class="btn btn-primary btn-block">Submit</button>
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