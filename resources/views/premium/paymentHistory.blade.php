
@include('layouts.header')
{{-- @foreach($mylist as $d)

{{$d->content->title}}<br> 

@endforeach --}}


<form action="" method="post" class="form">
	{{@csrf_field()}}
						
						<div class="form__slider">
							
							<input type = "hidden" name = "name" disabled  value = "{{$order->name}}" />
							<input type = "hidden" name = "amount" disabled  value = "{{$order->amount}}" />
							<input type = "hidden" name = "transaction_id" disabled  value = "{{$order->transaction_id}}" />
						</div>
						
					</form>
  @include('layouts.footer')  


