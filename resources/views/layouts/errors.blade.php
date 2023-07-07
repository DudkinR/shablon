<div class="row justify-content-center">
    <div class="col-sm-12">
        @if ($errors->any())
        <h1>{{__('Errors')}}</h1>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li> @endforeach
            </ul>
        </div>
        @endif
        @if (session('success'))
        <h1>{{__('Success')}}</h1>
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
        @endif

    </div>
</div>
