@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
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
                <div class="col-md-4"><h4>Product List</h4></div>
                <div class="col-md-4"><a href="{{route('products.create')}}" class="btn btn-primary" style="float: right;"><li class="fa fa-plus"> Add New</li></a> </div>
              </div>
              <example-component></example-component>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#Sl</th>
                  <th>Name</th>
                  <th style="text-align: center">Action</th>  
                </tr>
                </thead>
                <tbody>
                    @if ($products)
                        @foreach ($products as $key=>$product )
                        <tr>
                            <td width="25px">{{++$key}}</td>
                            <td>{{$product->name ?? ''}}</td>
                            <td class="text-center">
                                {{-- <a href="{{route('product.edit',$product->id)}}" class="btn btn-sm tbn-info"> <i class="fa fa-edit text-success"></i> Edit</a>
                                <a href="javascript:void(0);" class="btn btn-sm tbn-info sa-delete" data-form-id="product-delete-{{$product->id}}"> <i class="fa fa-trash text-danger"></i> Delete</a>
                                <form action="{{route('product.delete',$product->id)}}" id="product-delete-{{$product->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>  --}}
                            </td>
                          </tr>
                        @endforeach
                    @endif
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
      
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection