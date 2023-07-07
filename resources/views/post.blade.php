@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3>{!!$post->title!!}</h3>
                </div>
                <div class="card-body">
                    <p>{!!$post->body!!}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        @if(count($posts)>0)
           <?php $i=1; ?>
            @foreach($posts as $p)
            <a href="{{route('showpost',$p->id)}}" class="btn
            @if($p->id==$post->id)
             btn-success
            @else
             btn-primary
            @endif
            ">{{$i}}</a>
            <?php $i++ ; ?>
            @endforeach

        @endif
      </div>
     </div>

</div>
@endsection
