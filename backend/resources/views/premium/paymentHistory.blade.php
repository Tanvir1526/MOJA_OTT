
@include('layouts.header')
{{-- @foreach($mylist as $d)

{{$d->content->title}}<br> 

@endforeach --}}


<form action="" method="post" class="form">
	{{@csrf_field()}}
						
						<div class="form__slider">
							
							<input type = "Text" name = "name"   value = "{{$order->name}}" placeholder="{{$order->name}}" />
							<input type = "Text" name = "amount"   value = "{{$order->amount}}"  placeholder="{{$order->amount}}"/>
							<input type = "Text" name = "transaction_id"   value = "{{$order->transaction_id}}"placeholder="{{$order->transaction_id}}" />
						</div>
						
					</form>
  @include('layouts.footer')  


