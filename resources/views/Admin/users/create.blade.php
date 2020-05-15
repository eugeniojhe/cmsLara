@extends('adminlte::page')

@section('title','Usuários')

@section('content_header')
    <h1>New</h1>    
@endsection

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif 

    <form class="form-horizontal" action="{{route('users.store')}}" method="POST">
        @csrf 
        <div class="form-group">
            <div class="row">
                <label for="name" class="col-sm-1 control-label">Name:</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="name" placeholder="name">
                </div>
            </div>          
        </div>
        <div class="form-group">
            <div class="row">
                <label for="email" class="col-sm-1 control-label">Email:</label>
                <div class="col-sm-11">
                    <input type="email" class="form-control" name="email" placeholder="name">
                </div>
            </div>       
        </div>
        <div class="form-group">
            <div class="row">
                <label for="name" class="col-sm-1 control-label">Password:</label>
                <div class="col-sm-11">
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
            </div> 
        </div> 
        <div class="form-group">
            <div class="row">
                <label for="name" class="col-sm-1 control-label">Confirm:</label>
                <div class="col-sm-11">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="confirm password">
                </div>
            </div> 
        </div> 
        <div class="form-group">
            <label class="col-sm-1" control-label></label>
            <input type="submit" class="btn btn-success" value="Confirm"> 
        </div>
    </form> 
@endsection 