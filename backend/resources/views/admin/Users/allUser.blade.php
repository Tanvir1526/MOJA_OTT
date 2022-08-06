@extends('admin.layouts.main')
@section('content')
<div class="row">
<h4>{{Session::get('msg')}}</h4>
<h4>{{Session::get('msg1')}}</h4>
    <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined At</th>
                <th>Role</th>
                <th>Ban</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{$user->email}}</td>
                <td>{{ $user->created_at->DiffForHumans() }}</td>
                <td>{{ $user->type }}</td>
                @if($user->status === 1)
                <td><a href="#" class="btn btn-secondary">Ban</a></td>
                @else
                <td><a href="#" class="btn btn-success">Unban</a></td>
                @endif
                <td><a href="{{route('admin.users.details',['id'=>$user->user_id])}}" class="btn btn-primary">View</a>
                
                    <a href="{{ route('admin.user.edit',['id'=>$user->user_id])}}" class="btn btn-secondary">Edit</a>
                    @if ($user->email == session()->get('email'))
                    <a href="{{ route('admin.users.all')}}" class="btn btn-danger">Delete</a>
                    @else
                    <a href="{{ route('admin.user.delete', ['id'=> $user->user_id ]) }}" class="btn btn-danger">Delete</a>
                    
                    @endif

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection