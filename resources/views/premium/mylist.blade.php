
@include('layouts.header')
{{-- @foreach($mylist as $d)

{{$d->content->title}}<br> 

@endforeach --}}


<div class="item">
    <!-- card -->
    @foreach($mylist as $d)
    <div class="card card--big">
        <div class="card__cover">
        <img src="{{asset('posters/' . $d->content->image)}}"width="50" height="1000" alt="">
            <a href="{{route('premium.inside', ['id'=>$d->content->content_id,'title'=>$d->content->title])}}" class="card__play">
                <i class="icon ion-ios-play"></i>
            </a>
        </div>
        <div class="card__content">
            <h3 class="card__title"><a href="{{route('premium.inside', ['id'=>$d->content->content_id,'title'=>$d->content->title])}}">{{$d->content->title}}</a></h3>
            <span class="card__category">
                <a href="#">{{$d->content->genre}}</a>
            </span>
            <span class="card__rate"><i class="icon ion-ios-star"></i>{{$d->content->country}}</span>
        </div>
    </div>
    @endforeach
    <!-- end card -->
</div>
  @include('layouts.footer')  


