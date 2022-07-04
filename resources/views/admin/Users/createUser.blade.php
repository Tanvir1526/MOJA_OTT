@extends('admin.layouts.main')
@section('content')
<form action="{{route('admin.user.create.submit')}}" method="post" class="sign__form">
			
							{{@csrf_field()}}

							<div class="sign__group">
								<input type="text" class="sign__input" value="{{old('name')}}" name="name" placeholder="Name"><br>
								@error('name')
        						<span class="text-danger">{{$message}}</span><br>
								@enderror
							</div>

							<div class="sign__group">
								<input type="text" class="sign__input" value="{{old('email')}}" name="email" placeholder="Email"><br>
								@error('email')
        						<span class="text-danger">{{$message}}</span><br>
								@enderror
							</div>

							<div class="sign__group">
								<input type="password" class="sign__input"  name="password" placeholder="Password"><br>
								@error('password')
								<span class="text-danger">{{$message}}</span><br>
								@enderror
							</div>
							<div class="sign__group">
							<label for="Type"class="sign__text" >Type :</label>
							 <select name="type" id="type">
							 	<option value="">Select Type</option>
								<option value="admin">Admin</option>
								<option value="production">Production House</option>
								<option value="premium">Premium User</option>
								
							</select>
							@error('type')
        					<span class="text-danger">{{$message}}</span><br>
							@enderror
							</div>
							<input type="submit" class="sign__btn" value="Add">							
@endsection