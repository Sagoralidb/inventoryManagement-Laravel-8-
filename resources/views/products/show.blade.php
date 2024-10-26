@extends('layouts.master')
@section('title','Show product')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Product show</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Product show</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card card-primary card-outline"><br>
                    <h3 class="card-title text-center">Product Info</h3>
                    <div class="card-body">
                        <!-- card-body -->
                        <div class="card-body">
                            <table class="table table-sm table-bordered">

                                <tr>
                                    <td class="text-info">Product name</td>
                                    <td>{{$product->name ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="text-info">Product category</td>
                                    <td>{{$product->category->name ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="text-info">Product Brand</td>
                                    <td>{{$product->brand->name ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="text-info">Product SKU</td>
                                    <td>{{$product->sku ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="text-info">Product price({{ config('app.currency_symbol') }})</td>
                                    <td>{{$product->cost_price ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="text-info">Retail price({{ config('app.currency_symbol') }})</td>
                                    <td>{{$product->retail_price ?? ''}}</td>
                                </tr>
                                 <tr>
                                    <td class="text-info">Year</td>
                                    <td>{{$product->year ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td class="text-info">Descriptions</td>
                                    <td class="text-justify" style="padding:15px">{!! $product->description ?? ''!!}</td>
                                </tr>
                                 <tr>
                                    <td class="text-info">Status</td>
                                    <td class="text-justify text-center">{!! $product->status ? '<p class="text-info"> Active </p>' : '<p class="text-danger">InActive </p>' !!}</td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="{{route('products.index')}}" class="btn btn-sm btn-dark">
                                <li class="fa fa-arrow-left">Back</li>
                            </a>
                        </div>
                    </div>
                </div><!-- /.card -->
            </div>
            <div class="col-sm-6">
                <div class="card card-primary card-outline"><br>
                    <h5 class="card-title text-center">Product Image</h5>
                    <div class="card-body">
                        <!-- card-body -->
                        <div class="card-body text-center">
                            <img src="{{asset($product->image ?? '')}}" alt="{{$product->name ?? ''}}" class="rounded" width="300px">
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div><!-- /.card -->

                <div class="card card-primary card-outline"><br>
                    <h5 class="card-title text-center">Product stock</h5>
                    <div class="card-body">
                        <!-- card-body -->
                        <div class="card-body">
                            <table class="table table-sm table-bordered">
                                @foreach ($product->product_stocks as $p_stock )
                                <tr>
                                    <td>{{ $p_stock->size->size?? ''}}</td>
                                    <td>{{ $p_stock->location ?? ''}}</td>
                                    <td>{{ $p_stock->quantity ?? ''}}</td>

                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div><!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
  </div>
@endsection
