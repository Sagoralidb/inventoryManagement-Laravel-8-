@extends('layouts.master')
@section('title','Stock manage page')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Stock manage</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="content">
    <div class="container-fluid">
        <stock-manage></stock-manage>
        {{-- <div class="col-lg-6">
          <div id="app">
        </div>
        </div> --}}
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
