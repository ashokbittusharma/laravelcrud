@extends('layout')
@section('content')
<div style="margin-top: 50px;">
	<div class="alert alert-dark text-center" role="alert">
  <h3>Create User </h3>
</div>
	<div class="card-body">
		@if($errors->any())
		 <div class="alert alert-danger">
		 	<ul>
		 		 @foreach ($errors->all() as $error)
		              <li>{{ $error }}</li>
		         @endforeach
		 	</ul>
		 </div>
		 <br>
		 @endif
	</div>
<form method="post" action="{{route('user.store')}}">
	<div class="form-group">
		@csrf
		<label for="name">Name</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">

		<label for="email">Email</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">

		<label for="company">Company</label>
		<input type="text" name="company" class="form-control">
	</div>
	<div class="form-group">

		<label for="department">Department</label>
		<input type="text" name="department" class="form-control">
	</div>
	<div class="form-group">

		<label for="salary">Salary</label>
		<input type="text" name="salary" class="form-control">
	</div>
	<div class="form-group">

		<label for="password">Password</label>
		<input type="password" name="password" class="form-control">
	</div>
	<div style="margin-top:20px;">
	<button class="btn btn-block btn-primary">Create User</button>
	<a href="/user" class="btn btn-secondary">  Back </a>
    </div>
</form>
<div>

@endsection