@extends('adminlte::page')

@section('title','Pages')

@section('content_header')
    <h1>Pages
        <a href="{{route('pages.create')}}" class="btn btn-sm btn-success">New</a>
    </h1>    
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="50">Id</th>
                        <th>Title</th>
                        <th width="200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                    <tr>
                        <td>{{$page->id}}</td>
                        <td>{{$page->title}}</td>
                        <td>
                            <a href="" target="_blank" class="btn btn-sm btn-success">Ver</a>
                             <a href="{{route('pages.edit',['page' =>$page->id])}}" class="btn btn-sm btn-info">Edit</a>
                            <form method="POST" action="{{route('pages.destroy',['page' =>$page->id])}}" class="d-inline">
                                @csrf
                                @method('DELETE') 
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>           
                
            </table>
        </div>
    </div>
    
    {{$pages->links()}}
@endsection 