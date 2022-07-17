<table border="1">
        <tr>
             <th>ReportId</th>
            <th>User Id</th>
            <th>Content Id</th>
            <th>Message</th>
            
            {{@csrf_field()}}
        </tr>
        @foreach($ReportModel as $r)
            <tr>
            <td>{{$r->report_id}}</td>
                <td>{{$r->user_id}}</td>
                <td>{{$r->content_id}}</td>
                <td>{{$r->message}}</td>
                
            </tr>
        @endforeach
    </table>
    <a href="{{route('production.dashboard')}}"><b>Back</b></a>
