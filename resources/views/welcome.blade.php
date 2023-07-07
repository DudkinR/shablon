@extends('layouts.app')
@section('content')
<div class="container">
    @if(count($posts)>0)
    <div class="row">
        <div class="col-md-12">
            <h1>{{__('Posts')}}</h1>
        </div>
    </div>
        @foreach($posts as $post)
        <div class="row">
            <div class="col-md-12">
               <h3><a href="{{route('showpost',$post->id)}}">{!!$post->title!!}</a></h3>
               <p class="small_img">{!! mb_substr($post->body, 0, 500) !!}</p>
              
            </div>
        </div>
        <hr>
        @endforeach
    @endif

</div>
<script>

      var imgs=  $('img');
      console.log(imgs);
      imgs.each(function(){
        var img = $(this);
        var w = img.width();
        var h = img.height();
        var new_w= 200;
        var k= w/new_w;
        // ceil
        var new_h= Math.ceil(h/k);
        img.width(new_w);
        img.height(new_h);

      });

</script>
@endsection
