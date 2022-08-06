
    <form enctype="multipart/form-data" method="post" action="{{ route('content.update.submit') }}">
    {{@csrf_field()}}

    Content Id: <input type="hidden" value="{{$ContentModel->content_id}}" name="content_id"> </br>
    @error('content_id')
        <span class="text-danger">{{$message}}</span><br>
    @enderror
    Title : <input type="text" value="{{$ContentModel->title}}" name="title" placeholder="title"> </br>
    @error('title')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

    Description : <input type="text" value="{{$ContentModel->description}}" name="description" placeholder="description"> </br>
    @error('description')
        <span class="text-danger">{{$message}}</span><br>
    @enderror
   
    <input type="file" name="image" value="{{$ContentModel->image}}" placeholder="title" >
    @error('image')
    <span>{{$message}}</span>
        @enderror
        <br><br>

    <input type="file" name="video" value="{{$ContentModel->video}}" placeholder="video">
    @error('video')
    <span>{{$message}}</span>
        @enderror
        <br><br>
   
        Genre: <input type="text" value="{{$ContentModel->genre}}" name="genre" placeholder="genre"> </br>
    @error('genre')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

   Language : <input type="text" value="{{$ContentModel->language}}" name="language" placeholder="language"> </br>
    @error('language')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

    Country : <input type="text" value="{{$ContentModel->country}}" name="country" placeholder="country"> </br>
    @error('country')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

    Release Date : <input type="date" value="{{$ContentModel->release_date}}" name="release_date" placeholder="release_date"> </br>
    @error('release_date')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

    Run time : <input type="text" value="{{$ContentModel->runtime}}" name="runtime" placeholder="runtime"> </br>
    @error('runtime')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

   Director: <input type="text" value="{{$ContentModel->director}}" name="director" placeholder="director"> </br>
    @error('director')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

    Cast : <input type="text" value="{{$ContentModel->cast}}" name="cast" placeholder="cast"> </br>
    @error('cast')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

    User id : <input type="text" value="{{$ContentModel->user_id}}" name="user_id" placeholder="user_id"> </br>
    @error('user_id')
        <span class="text-danger">{{$message}}</span><br>
    @enderror




        <input type="submit" value="upload">
        <a href="{{route('contentlist')}}"><b>Back</b></a>

</form>