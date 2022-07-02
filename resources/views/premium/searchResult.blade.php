<!DOCTYPE html>
<html lang="en">

@include('layouts.header')
		<!-- end home bg -->


						<div class="item">
							<!-- card -->
							@foreach($content as $row)
							<div class="card card--big">
								<div class="card__cover">
								<img src="{{asset('posters/' . $row->image)}}"width="10" height="700" alt="">
									<a href="{{route('premium.inside', ['id'=>$row->content_id,'title'=>$row->title])}}" class="card__play">
										<i class="icon ion-ios-play"></i>
									</a>
								</div>
								<div class="card__content">
									<h3 class="card__title"><a href="#">{{$row->title}}</a></h3>
									<span class="card__category">
										<a href="#">{{$row->genre}}</a>
									</span>
									<span class="card__rate"><i class="icon ion-ios-star"></i>{{$row->country}}</span>
								</div>
							</div>
							@endforeach
							<!-- end card -->
						</div>

						

						
					
@include('layouts.footer')	
</body>

</html>