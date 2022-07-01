<form action="{{route('production.upload.submit')}}" method="post" enctype="multipart/form-data">
    {{@csrf_field()}}
    
    <input type="text" name="title" placeholder="Title">
    <input type="text" name="description" placeholder="Description">
    <input type="file" name="image" placeholder="Image">
    <input type="file" name="video" placeholder="Video">
    <input type="text" name="genre" placeholder="Genre">
    <input type="text" name="language" placeholder="Language">
    <input type="text" name="country" placeholder="Country">
    <input type="text" name="release_date" placeholder="Release Date">
    <input type="text" name="runtime" placeholder="Runtime">
    <input type="text" name="director" placeholder="Director">
    <input type="text" name="cast" placeholder="Cast">
    <input type="text" name="rating" placeholder="Rating">
    <input type="submit" value="Upload">
</form>