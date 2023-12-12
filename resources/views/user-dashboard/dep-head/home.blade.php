@extends('layouts.app_custom')
@section('title','Dashboard')
@section('title-head','DEPT HEAD - Dashboard')
@section('content')
<div class="row">

  <div class="col-12 mb-4">
    <div class="hero bg-primary text-white">
      <div class="hero-inner">
        <h2>Welcome, {{ Auth::user()->name }} </i></h2>
        <p class="lead">This page is a system Web Checkseet for Departemen Head</p>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-md-4 col-sm-12">
    <div class="card card-statistic-2">
      <div class="card-icon shadow-primary bg-primary">
        <i class="fas fa-archive"></i>
      </div>
      <div class="card-wrap"> 
        <div class="card-header">
          <h4>Total Data</h4>
        </div>
        <div class="card-body">
          {{ $count }}
        </div>
      </div>
    </div>
  </div>


 

</div>
</div>
</div>
</div>

@endsection