@extends('admin/layouts/default')

@section('title')
Searches
@parent
@stop

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Searches</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                Dashboard
            </a>
        </li>
        <li>Searches</li>
        <li class="active">Searches List</li>
    </ol>
</section>

<section class="content">
<div class="container">
    <div class="row">
     <div class="col-12">
     @include('flash::message')
        <div class="card border-primary ">
            <div class="card-header bg-primary text-white">
                <h4 class="card-title float-left"> <i class="livicon" data-name="list-ul" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Searches List
                </h4>
                
            </div>
            <br />
            <div class="card-body table-responsive">
                 @include('admin.search.searches.search')
                 
            </div>
        </div>
        </div>
 </div>
 </div>
</section>
@stop
