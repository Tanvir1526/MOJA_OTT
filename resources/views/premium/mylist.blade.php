mylist
@foreach($mylist as $d)
@foreach($d->content as $c)
{{$c->title}}
@endforeach
@endforeach
