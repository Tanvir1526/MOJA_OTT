<form action="{{route('production.upload.submit')}}" method="post" enctype="multipart/form-data">
    {{@csrf_field()}}
   
    Title : <input type="text" value="{{old('title')}}" name="title" placeholder="title"> </br>
    @error('title')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

    Description : <input type="text" value="{{old('description')}}" name="description" placeholder="description"> </br>
    @error('description')
        <span class="text-danger">{{$message}}</span><br>
    @enderror
   
    <input type="file" name="image" value="{{old('image')}}" placeholder="title" >
    @error('image')
    <span>{{$message}}</span>
        @enderror
        <br><br>

    <input type="file" name="video" value="{{old('video')}}" placeholder="video">
    @error('video')
    <span>{{$message}}</span>
        @enderror
        <br><br>
   
        Genre: <input type="text" value="{{old('genre')}}" name="genre" placeholder="genre"> </br>
    @error('genre')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

   Language : <input type="text" value="{{old('language')}}" name="language" placeholder="language"> </br>
    @error('language')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

    Country : <input type="text" value="{{old('country')}}" name="country" placeholder="country"> </br>
    @error('country')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

    Release Date : <input type="date" value="{{old('release_date')}}" name="release_date" placeholder="release_date"> </br>
    @error('release_date')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

    Run time : <input type="text" value="{{old('runtime')}}" name="runtime" placeholder="runtime"> </br>
    @error('runtime')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

   Director: <input type="text" value="{{old('director')}}" name="director" placeholder="director"> </br>
    @error('director')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

    Cast : <input type="text" value="{{old('cast')}}" name="cast" placeholder="cast"> </br>
    @error('cast')
        <span class="text-danger">{{$message}}</span><br>
    @enderror

    User id : <input type="text" value="{{old('user_id')}}" name="user_id" placeholder="user_id"> </br>
    @error('user_id')
        <span class="text-danger">{{$message}}</span><br>
    @enderror




        <input type="submit" value="upload">

</form>