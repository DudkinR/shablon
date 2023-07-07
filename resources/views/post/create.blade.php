@extends('layouts.app')
@section('content')
<script src="/js/ckeditor.js"></script>
<div class="container">
<!-- include errors.blade.php -->

    <div class="row justify-content-center">
        <div class="col-sm-12">
            <a href="{{route('post.index')}}" class="btn btn-primary">{{__('Back')}}</a>
        </div>
    </div>
    <form  action ="{{route('post.store')}}" method="POST" >
        @csrf
        @method('POST')
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <label for="title">{{__('Title')}}</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="{{__('Enter title')}}">
            </div>
            <div class="form-group">
                <label for="body">{{__('Body')}}</label>
                <textarea class="form-control ckeditor" id="body" name="body" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="slug">{{__('Slug')}}</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="{{__('Enter slug')}}">
             </div>
            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
           </form>
        </div>
        
         <div class="col-sm-4">
         @foreach($images as $image)
         <img  src="{{ route('imgshow', ['filename' => $image->name]) }}" width=100 alt="{{$image->alt}}">
        @endforeach
         <form method="POST" action="{{route('upload')}}" enctype="multipart/form-data">
            @csrf
            @method('POST')
           <div class="container" id="image-preview">  
           </div>
         <div class="form-group">
                <label for="image">{{__('Image')}}</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="{{__('Enter image')}}">
            </div>
            <div class="form-group">
                <label for="alt">{{__('Alt')}}</label>
                <input type="text" class="form-control" id="alt" name="alt" placeholder="{{__('Enter alt')}}">
            </div>
            <div class="form-group">
                <label for="title">{{__('Title')}}</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="{{__('Enter title')}}">
            </div>
            <div class="form-group">
                <label for="caption">{{__('Caption')}}</label>
                <input type="text" class="form-control" id="caption" name="caption" placeholder="{{__('Enter caption')}}">
            </div>
            <div class="form-group">
                <label for="description">{{__('Description')}}</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="{{__('Enter description')}}">
            </div>
            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
        </form>

        </div>
    </div>
</div>
<script>
 var image_preview = document.getElementById('image-preview');
var image = document.getElementById('image');
image.addEventListener('change', function(){
    showImage(this);
});
function showImage(fileInput){
    var files = fileInput.files;
    for(var i=0; i<files.length; i++){
        var file = files[i];
        var imageType = /image.*/;
        if(!file.type.match(imageType)){
            continue;
        }
        var img=document.createElement("img");
        img.classList.add("obj");
        img.file = file;
        img.style.width = "100px"; // Установка ширины изображения
        image_preview.appendChild(img);
        var reader = new FileReader();
        reader.onload = (function(aImg){
            return function(e){
                aImg.src = e.target.result;
            };
        })(img);
        var ret = reader.readAsDataURL(file);
        var canvas = document.createElement("canvas");
        ctx = canvas.getContext("2d");
        ctx.drawImage(img, 30, 30);
        var dataURL = canvas.toDataURL("image/png");
    }
}

</script>
@endsection
