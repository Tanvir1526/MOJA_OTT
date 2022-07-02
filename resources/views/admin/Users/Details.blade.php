@extends('layouts.admin.main')
@section('content')
<h2> Details</h2>
Name:  {{$user->name}}</br>
Email: {{$user->email}}</br>
Type: {{$user->type}}</br>

@endsection