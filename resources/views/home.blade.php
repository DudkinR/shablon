@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>
    </div>
    @if(count($posts)>0)
    <div class="row">
        <div class="col-md-12">
            <h1>{{__('Posts')}}</h1>
        </div>
    </div>
        @foreach($posts as $post)
        <div class="row">
            <div class="col-md-12">
               <h3>{!!$post->title!!}</h3>
               <p class="small_img">{!! mb_substr($post->body, 0, 500) !!}</p>
               <a href="{{route('showpost',$post->id)}}" class="btn btn-primary">{{__('Show')}}</a>
            </div>
        </div>
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
