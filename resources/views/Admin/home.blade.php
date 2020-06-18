@extends('adminlte::page')

@section('plugins.Chartjs',true); 

@section('title','Panel')

@section('content_header')
     <div class="row">
        <div class="col-md-6">
            <h1>Dashboard</h1>  
        </div>
        <div class="col-md-6">
            <form method="GET">
                <select onchange="this.form.submit()" name="interval" class="float-md-right">
                    <option {{$dateInterval == 30?'selected="selected"':''}} value="30">Last 30 days</option>
                <option {{$dateInterval == 60?'selected="selected"':''}} value="60">Last 2 months</option>
                <option {{$dateInterval == 90?'selected="selected"':''}} value="90">Last 3 months</option>
                    <option {{$dateInterval == 120?'selected="selected"':''}} value="120">Last 4 months</option>
                </select>    
            </form>
        </div>
    </div>  
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
                    <canvas id="pagePie">

                    </canvas>
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
    <script>
        window.onload = function(){
            let ctx = document.getElementById('pagePie').getContext('2d'); 
            window.pagePie = new Chart(ctx,{
                type:'pie', 
                data:{
                    datasets:[{
                        data:{{$pageValues}},
                        backgroundColor:'#0000af'
                    }],
                    labels:{!!$pageLabels!!}
                },
                legend:{
                    display:false
                }
            });
        };
    </script>
@endsection 
