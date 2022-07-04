@extends('admin.layouts.main')

@section('content')

<div class="row">
<a href="{{route('admin.user.create')}}"class="btn btn-secondary">add</a>

    <table class="table table-striped" id="table1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Joined At</th>
                <th>Role</th>
                <th>Ban</th>
                <th></th>
                <th>Approval</th>
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
                    <a href="#" class="btn btn-secondary">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                </td>
                @if($user->status === 1)
                <td><a href="#" class="btn btn-secondary">Pending</a></td>
                @else
                <td><a href="#" class="btn btn-success">Aproved</a></td>
                @endif

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection