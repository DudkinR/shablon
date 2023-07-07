@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           <a href="{{route('post.index')}}" class="btn btn-primary">{{__('Back')}}</a>
        </div>
    </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3>{!!$post->title!!}</h3>
                    </div>
                    <div class="card-body">
                        <p>{!!$post->body!!}</p>
                    </div>
                    <div class="card-footer">
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
</div>
@endsection
