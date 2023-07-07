@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           <a href="{{route('post.create')}}" class="btn btn-primary">{{__('Add new post')}}</a>
        </div>
    </div>
    @if(isset($posts))
        @foreach($posts as $post)
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3>{!!$post->title!!}</h3>
                        </div>
                        <div class="card-body">
                            <p>{!! mb_substr($post->body, 0, 500) !!}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('post.show',$post->id)}}" class="btn btn-primary">{{__('Show')}}</a>
                            <a href="{{route('post.edit',$post->id)}}" class="btn btn-success">{{__('Edit')}}</a>
                            <form action="{{route('post.destroy',$post->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
