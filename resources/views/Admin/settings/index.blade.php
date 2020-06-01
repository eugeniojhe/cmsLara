@extends('adminlte::page')

@section('title','Settings')

@section('content_header')
    <h1>Settings 
    <a href="" class="btn btn-sm btn-success">
        </a>
    </h1>       
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

    @if(session('warning'))
        <div class="alert alert-info alert-dismissible">
            <button class="close"  data-dismiss="alert" aria-label="Close">&times;</button>
            {{session('warning')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
        '   <form action="{{route('settings.save')}}" method="POST" class="form-horizontal">
            @method('put')
            @csrf 
            <div class="form-group row">
                <div class="col-sm-2 col-form-label">Title:</div>
                <div class="col-sm-10">
                <input type="text" name="title" value="{{$settings['title']}}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2 col-form-label">Sub Title:</div>
                <div class="col-sm-10">
                    <input type="text" name="subtitle" value="{{$settings['subtitle']}}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2 col-form-label">Email</div>
                <div class="col-sm-10">
                    <input type="text" name="email" value="{{$settings['email']}}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2 col-form-label">Background Color</div>
                <div class="col-sm-10">
                    <input type="color" name="bgcolor" value="{{$settings['bgcolor']}}"  class="form-control">
                </div>
            </div>       

            <div class="form-group row">
                <div class="col-sm-2 col-form-label">Text Color:</div>
                <div class="col-sm-10">
                    <input type="color" name="textcolor" value="{{$settings['textcolor']}}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2 col-form-label"></div>
                <div class="col-sm-10">
                    <input type="submit" value="Confirm" class="btn btn-sm btn-success"> 
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection 

