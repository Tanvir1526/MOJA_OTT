@extends('admin.layouts.main')
@section('content')
{{@csrf_field()}}
<table class="table table-striped" id="table1">
    <thead>
        <tr>
            <th>ReportId</th>
            <th>User Id</th>
            <th>Content Id</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ReportModel as $r)
        <tr>
            <td>{{$r->report_id}}</td>
            <td>{{$r->user_id}}</td>
            <td>{{$r->content_id}}</td>
            <td>{{$r->message}}</td>

        </tr>
        @endforeach
    </tbody>

</table>
@endsection