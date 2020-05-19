@extends('adminlte::page')

@section('title','Usuários')

@section('content_header')
    <h1>Usuários
        <a href="{{route('users.create')}}" class="btn btn-sm btn-success">New</a>
    </h1>    
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                        <a href="{{route('users.edit',['user' =>$user->id])}}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{route('users.destroy',['user' =>$user->id])}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>           
                
            </table>
        </div>
    </div>
    
    {{$users->links()}}
@endsection 