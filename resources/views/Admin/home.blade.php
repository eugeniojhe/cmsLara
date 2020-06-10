@extends('adminlte::page')

@section('title','Panel')

@section('content_header')
    <h1>Dashboard</h1>    
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$visitorsTotal}}</h3>
                    <p>Visitors</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-eye"></i>
                </div>
            </div>   
        </div>

        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$usersOnline}}</h3>
                    <p>Users online</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-heart"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$pagesTotal}}</h3>
                    <p>Pages</p>
                </div>
                <div class="icon">
                    <i class="fa fa-fw fa-sticky-note"></i>
                </div>
            </div>            
        </div>

        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$usersRegistered}}</h3>
                    <p>Registered Users</p>
                </div>
                <div class="icon">
                    <i class="far fa-fw fa-eye"></i>
                </div>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top pages</h3>
                </div>
                <div class="card-body">
                    -----------
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">About</h3>
                </div>
                <div class="card-body">
                    ------------
                </div>
            </div>
        </div>
    </div>
@endsection 
