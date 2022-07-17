<table border="1">
        <tr>
             <th>Rating Id</th>
            <th>User Id</th>
            <th>Content Id</th>
            <th>Rating</th>
            
            {{@csrf_field()}}
        </tr>
        @foreach($RatingModel as $r)
            <tr>
            <td>{{$r->rating_id}}</td>
                <td>{{$r->user_id}}</td>
                <td>{{$r->content_id}}</td>
                <td>{{$r->rating}}</td>
                
            </tr>
        @endforeach
    </table>
    <a href="{{route('production.dashboard')}}"><b>Back</b></a>
