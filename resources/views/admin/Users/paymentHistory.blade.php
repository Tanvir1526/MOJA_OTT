@extends('admin.layouts.main')

@section('content')
{{@csrf_field()}}
<table class="table table-striped" id="table1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email Address</th>
            <th>Phone No</th>
            <th>Amount</th>
            <th>Address</th>
            <th>Status</th>
            <th>Transaction Id</th>
            <th>Currency</th>
        </tr>
    </thead>
    <tbody>
        @foreach($OrderModel as $c)
        <tr>
            <td>{{$c->id}}</td>
            <td>{{$c->name}}</td>
            <td>{{$c->email}}</td>
            <td>{{$c->phone}}</td>
            <td>{{$c->amount}}</td>
            <td>{{$c->address}}</td>
            <td>{{$c->status}}</td>
            <td>{{$c->transaction_id}}</td>
            <td>{{$c->currency}}</td>
        </tr>
        @endforeach
    </tbody>

</table>
@endsection