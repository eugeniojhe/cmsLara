@extends('adminlte::page')

@section('title','Usuários')

@section('content_header')
    <h1>New</h1>    
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

    <form class="form-horizontal" action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-1 control-label">Name:</label>
                <div class="col-sm-11">
                <input type="text" class="form-control @error('name') is-invalid  @enderror" name="name" value="{{old('name')}}" placeholder="name">
               </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-1 control-label">Email:</label>
                <div class="col-sm-11">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" placeholder="name">
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-1 control-label">Password:</label>
                <div class="col-sm-11">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password">
                </div>
            </div> 
            <div class="form-group row">
                 <label for="password_confirmation" class="col-sm-1 control-label">Confirm:</label>
                 <div class="col-sm-11">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="confirm password">
                 </div>
            </div> 
            <div class="form-group row">
                <label class="col-sm-1" control-label></label>
                <input type="submit" class="btn btn-success" value="Confirm"> 
            </div>
        </div> 
        
    </form> 
@endsection 