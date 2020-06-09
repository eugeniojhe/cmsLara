@extends('adminlte::page')

@section('title','Edit - Page')

@section('content_header')
    <h1>Edition</h1>    
@endsection

@section('content')

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4>
                <i class="icon fas fa-ban">
                    Alert
                </i>
            </h4>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif 

    <form class="form-horizontal" action="{{route('pages.update',['page' =>$page->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group row">
                <label for="title" class="col-sm-1 control-label">Title:</label>
                <div class="col-sm-11">
                   <input type="text" class="form-control
                    @error('title') is-invalid  @enderror"
                name="title" value="{{$page->title}}" placeholder="title">
               </div>
            </div>

            <div class="form-group row">
                <label for="body" class="col-sm-1 control-label">Body:</label>
                <div class="col-sm-11">
                    <textarea name="body" class="form-control textareafield">{{$page->body}}
                    </textarea>                 
               </div>
            </div>
             
            <div class="form-group row">
                <label class="col-sm-1" control-label></label>
                <input type="submit" class="btn btn-success" value="Confirm"> 
            </div>
        </div> 
    </form>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script> 
    <script>
        tinymce.init({
            selector:'textarea.textareafield',
            height:300,
            menubar:false,
            plugins:['table','image','autoresize','lists'],
            toolbar:'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignjustify alignright | table | link image | bullist numlist', 
            content_css:[
                '{{asset('assets/css/content.css')}}'
            ],
            images_upload_url:'{{route('imageuploado')}}',
            images_upload_credentials:'', 
        })
    </script>
@endsection 
