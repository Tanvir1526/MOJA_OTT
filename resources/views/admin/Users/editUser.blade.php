@extends('admin.layouts.main')
@section('content')

@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="{{route('admin.user.edit.submit')}}" method="post" class="sign__form">

    {{@csrf_field()}}

    <div class="sign__group">
        <label for="name">Name: </label>
        <input type="text" class="sign__input"value="{{$user->name}}" name="name"placeholder="Name"><br>
        @error('name')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
    </div>

    <div class="sign__group">
        <label for="email">Email: </label>
        <input type="text" class="sign__input" value="{{$user->email}}" name="email"placeholder="Email"><br>
        @error('email')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
    </div>
    <div class="sign__group">
        <label for="ban" class="sign__text">User Activity :</label>
        <select name="ban" id="ban">
            <option value="0">Unban</option>
            <option value="1">Ban </option>
        </select>
        @error('ban')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
    </div>
    <div class="sign__group">
        <label for="Type" class="sign__text">Type :</label>
        <select name="type" id="type">
            
            <option value="admin">Admin</option>
            <option value="production">Production House</option>
            <option value="premium">Premium User</option>

        </select>
        @error('type')
        <span class="text-danger">{{$message}}</span><br>
        @enderror
    </div>
    <input type="submit" class="sign__btn" value="Update">
</form>
</body>
</html>
