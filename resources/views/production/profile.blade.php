<form action="{{route('users.update.submit')}}" method="post" class="user" enctype="multipart/form-data">
                        {{@csrf_field()}}
						<h4>01. Profile details</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Name</label>
								<input type="text" value="{{old('name')}}" name="name" value="{{$user->name}}">
                                @error('name')
        						<span class="text-danger" >{{$message}}</span><br>
								@enderror
							</div>
                            </div>
                            <div class="row">
							<div class="col-md-6 form-it">
								<label>Email Address</label>
								<input type="text" value="{{old('email')}}" name="email" value="{{$user->email}}">
                                @error('email')
        						<span class="text-danger" >{{$message}}</span><br>
								@enderror
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>User Type :</label><br>
								{{$user->type}}
							</div>
							
						</div>
                        <div class="row">
							<div class="col-md-6 form-it">
                            <input type="file" name="pro_pic">
                            @error('pro_pic')
                            {{$message}}<br>
                            @enderror
							</div>
                            </div>
						
						<div class="row">
							<div class="col-md-2">
								<input type="submit" class="submit"  value="Update">
							</div>
						</div>	
					</form>
					<form action="{{route('users.update.password')}}" method="post" class="password">
                        {{@csrf_field()}}
						<h4>02. Change password</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Old Password</label>
								<input type="password"  name="password" placeholder="Password"><br>
								@error('password')
								<span class="text-danger">{{$message}}</span><br>
								@enderror
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>New Password</label>
								<input type="password"  name="new_password" placeholder="Password"><br>
								@error('new_password')
								<span class="text-danger">{{$message}}</span><br>
								@enderror
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Confirm New Password</label>
								<input type="password"  name="conf_password" placeholder="Password"><br>
								@error('conf_password')
								<span class="text-danger">{{$message}}</span><br>
								@enderror
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input type="submit" class="submit"  value="Change">
							</div>
						</div>	
					</form>