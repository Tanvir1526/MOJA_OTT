@extends('admin.layouts.main')
@section('content')
{{@csrf_field()}}
<table class="table table-striped" id="table1">
    <thead>
        <tr>
        <th>Content Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Image</th>
        <th>Video</th>
        <th>Genre</th>
        <th>Language</th>
        <th>Country</th>
        <th>Release Date</th>
        <th>Runtime</th>
        <th>Director</th>
        <th>Cast</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ContentModel as $c)
        <tr>
        <td>{{$c->content_id}}</td>
        <td>{{$c->title}}</td>
        <td>{{$c->description}}</td>
        <td>{{$c->image}}</td>
        <td>{{$c->video}}</td>
        <td>{{$c->genre}}</td>
        <td>{{$c->language}}</td>
        <td>{{$c->country}}</td>
        <td>{{$c->release_date}}</td>
        <td>{{$c->runtime}}</td>
        <td>{{$c->director}}</td>
        <td>{{$c->cast}}</td>
        </tr>
        @endforeach
    </tbody>

</table>
@endsection