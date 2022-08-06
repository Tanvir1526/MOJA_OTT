
<table border="1">
        <tr>
             <th>ContentId</th>
            <th>User Id</th>
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
            {{@csrf_field()}}
        </tr>
        @foreach($ContentModel as $c)
            <tr>
            <td>{{$c->content_id}}</td>
            <td><a href="{{route('details',['user_id'=>$c->user_id])}}">{{$c->user_id}}</a></td>
                
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
                <td><a class="btn btn-primary" href="{{route('content.edit',[$c->content_id])}}">Edit</a></td>
                <td><a class="btn btn-primary" href="{{route('content.contentdelete',['content_id'=>$c->content_id])}}">Delete</a></td>
                
            </tr>
        @endforeach
        <a href="{{route('production.dashboard')}}"><h2>Back</h2></a>
    </table>
    
