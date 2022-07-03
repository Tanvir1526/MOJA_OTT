@extends('admin.layouts.main')

@section('content')
<form action="" method="post" class="form">
	{{@csrf_field()}}
						
						<div class="form__slider">
							
							<input type = "Text" name = "name"   value = "{{$user->name}}" placeholder="{{$order->name}}" />
							<input type = "Text" name = "amount"   value = "{{$order->amount}}"  placeholder="{{$order->amount}}"/>
							<input type = "Text" name = "transaction_id"   value = "{{$order->transaction_id}}"placeholder="{{$order->transaction_id}}" />
						</div>
						
					</form>
@endsection