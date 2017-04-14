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
			<h1 class="text-center">School University Utility System</h1>
			@if(Session::has('error'))
				<div class="alert alert-danger">{{Session::get('error')}}</div>
			@endif
			<form class="form-horizontal" action="{{route('login')}}" method="POST">
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
				<div class="form-group">
					<div class="col-md-8 col-md-offset-3">
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
				</div>
				{{csrf_field()}}
			</form>	
		</div>
	</div>
@endsection

@section('scripts')

@endsection