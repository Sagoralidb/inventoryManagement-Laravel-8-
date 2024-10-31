@extends('layouts.master')
@section('title','Stock history')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Stock history</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Index</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.card -->

        <div class="card" style="width: 100%">
            <div class="card-header">
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"><h4>Category List</h4></div>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#Sl</th>
                  <th>Date</th>
                  <th style="text-align: center">Product</th>
                  <th>Size</th>
                  <th>Quantity</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    @if ($stocks)
                        @foreach ($stocks as $key=>$stock )
                        <tr>
                            <td width="25px">{{++$key}}</td>
                            <td>{{$stock->date ?? ''}}</td>
                            <td>{{ $stock->product->name ?? ''}}</td>
                            <td>{{ $stock->size->size ?? ''}}</td>
                            <td>{{ $stock->quantity ?? ''}}</td>
                            <td>{{ strtoupper($stock->status) ?? '' }}</td>
                          </tr>
                        @endforeach
                    @endif
                </tbody>
              </table>
              {{-- {{ $stocks->links(); }} --}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
