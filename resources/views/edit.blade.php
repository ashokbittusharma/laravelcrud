@extends('layout')
@section('content')
<div style="margin-top: 50px;">
	<div class="alert alert-dark text-center" role="alert">
  <h3>Edit User Detail </h3>
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

<form method="post" action="{{route('user.update', $user->id)}}">
	<div class="form-group">
		@csrf
		@method('PATCH')
		<label for="name">Name</label>
		<input type="text" name="name" class="form-control" value="{{$user->name}}">
	</div>
	<div class="form-group">

		<label for="email">Email</label>
		<input type="text" name="email" class="form-control" value="{{$user->email}}" readonly>
	</div>
	<div class="form-group">

		<label for="company">Company</label>
		<input type="text" name="company" class="form-control" value="{{@$user->userProfile->company}}">
	</div>
	<div class="form-group">

		<label for="department">Department</label>
		<input type="text" name="department" class="form-control" value="{{@$user->userProfile->department}}">
	</div>
	<div class="form-group">

		<label for="salary">Salary</label>
		<input type="text" name="salary" class="form-control" value="{{@$user->userProfile->salary}}">
	</div>
	<div style="margin-top:20px;">
	<button class="btn btn-block btn-danger">Update User</button>
	<a href="/user" class="btn btn-secondary">  Back </a>
</div>
</form>

</div>
@endsection