@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                   <h1 >{{__('Welcome to your profile')}}</h1>
                    <h2>{{__('Your name is')}} {{$user->name}}</h2>
                    <h2>{{__('Your email is')}} {{$user->email}}</h2>
                    <h2>{{__('Your created at')}} {{$user->created_at}}</h2>
                    <h2>{{__('Your updated at')}} {{$user->updated_at}}</h2>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
