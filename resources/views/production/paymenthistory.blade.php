
<table border="1">
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
            <th>User Id</th>
            {{@csrf_field()}}
        </tr>
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
                <td>{{$c->user_id}}</td>
                
            </tr>
        @endforeach
    </table>
    <a href="{{route('production.dashboard')}}"><b>Back</b></a>
