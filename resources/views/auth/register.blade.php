@extends('template.default')

@section('styles')
<style type="text/css">
	.well{
		margin-top: 10%;
		border-radius: 20px;
	}
	body{
		background-color: #060b0f;
	}
</style>
@endsection

@section('contents')
	<div class="container">
		<div class="col-md-6 col-md-offset-3 well">
			<h1 class="text-center">Registration Form</h1>
			@if(Session::has('ok'))
				<div class="alert alert-success">{{Session::get('ok')}}</div>
			@endif
			<form class="form-horizontal" action="{{route('register_check')}}" method="POST">
				<div class="form-group {{$errors->has('first_name') ? 'has-error' : ''}}">
					<label class="control-label col-md-3" for="first_name">First Name</label>
					<div class="col-md-8">
						<input type="text" name="first_name" class="form-control">
						@if($errors->has('first_name'))
							<span class="help-block">{{$errors->first('first_name')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group {{$errors->has('middle_name') ? 'has-error' : ''}}">
					<label class="control-label col-md-3" for="username">Middle Name</label>
					<div class="col-md-8">
						<input type="text" name="middle_name" class="form-control">
						@if($errors->has('middle_name'))
							<span class="help-block">{{$errors->first('middle_name')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group {{$errors->has('last_name') ? 'has-error' : ''}}">
					<label class="control-label col-md-3" for="username">Last Name</label>
					<div class="col-md-8">
						<input type="text" name="last_name" class="form-control">
						@if($errors->has('last_name'))
							<span class="help-block">{{$errors->first('last_name')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group {{$errors->has('contact') ? 'has-error' : ''}}">
					<label class="control-label col-md-3" for="username">Contact</label>
					<div class="col-md-8">
						<input type="number" name="contact" class="form-control">
						@if($errors->has('contact'))
							<span class="help-block">{{$errors->first('contact')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group {{$errors->has('username') ? 'has-error' : ''}}">
					<label class="control-label col-md-3" for="username">Username</label>
					<div class="col-md-8">
						<input type="text" name="username" class="form-control">
						@if($errors->has('username'))
							<span class="help-block">{{$errors->first('username')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
					<label class="control-label col-md-3" for="password">Password</label>
					<div class="col-md-8">
						<input type="password" name="password" class="form-control">
						@if($errors->has('password'))
							<span class="help-block">{{$errors->first('password')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group {{$errors->has('repeat_password') ? 'has-error' : ''}}">
					<label class="control-label col-md-3" for="password">Repeat Password</label>
					<div class="col-md-8">
						<input type="password" name="repeat_password" class="form-control">
						@if($errors->has('repeat_password'))
							<span class="help-block">{{$errors->first('repeat_password')}}</span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8 col-md-offset-3">
						<button type="submit" class="btn btn-primary">Submit</button>
						<a href="{{route('index')}}" class="btn btn-default">Login</a>
					</div>
				</div>
				{{csrf_field()}}
			</form>	
		</div>
	</div>
@endsection

@section('scripts')

@endsection