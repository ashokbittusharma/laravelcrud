@extends('layout')
@section('content')
<div style="margin-top: 50px;">
<div class="alert alert-dark text-center" role="alert">
  <h3>User List </h3>
</div>

	 @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
	<div>
		<a href="{{route('user.create')}}" class="btn btn-primary btn-lg" style="float: right;
    margin: 10px;">Create User</a>
	</div>
<table class="table"">
	
	<thead class="thead-light">
		<tr>
			<th scope="col">S.No.</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Company</th>
			<th scope="col">Department</th>
			<th scope="col">Salary</th>
			{{-- <td>Created At</td> --}}
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($user as $key => $users)
		<tr>
			<td>{{$key + 1}}</td>
			<td>{{$users->name}}</td>
			<td>{{$users->email}}</td>
			<td>{{@$users->userProfile->company}}</td>
			<td>{{@$users->userProfile->department}}</td>
			<td>${{@$users->userProfile->salary}}</td>
			{{-- <td>{{$users->created_at}}</td> --}}
			<td>
				<a href="{{route('user.edit', $users->id)}}" class="btn btn-warning btn-sm" style="float: left;"> Edit</a>
				<form action="{{route('user.destroy', $users->id)}}" method="post">
					@csrf
					@method('DELETE')
					<button class="btn btn-danger btn-sm" type="submit">Delete</button>
				</form>
			</td>

		</tr>
		@endforeach
	</tbody>

</table>
</div>
@endsection