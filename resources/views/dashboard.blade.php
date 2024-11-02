@extends('layouts.master')
@section('title','Dashboad')

@section('content')
    <section class="content">
         <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                    <div class="inner text-center">
                      <h3>{{$totalUser ?? 0}}</h3>

                      <p>User</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('users.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                    <div class="inner text-center">
                      {{-- <h3>{{ $totalProduct ?? 0}}<sup style="font-size: 20px">%</sup></h3> --}}
                      <h3>{{ $totalProduct ?? 0}}</h3>

                      <p>Total Product</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('products.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-secondary">
                    <div class="inner text-center">
                      <h3 class="text-light">{{$totalStockIn ?? 0}}</h3>

                      <p class="text-light">Total Stock In</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('stockHistory.admin')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                    <div class="inner text-center">
                      <h3>{{$totalReturnProduct ?? 0}}</h3>

                      <p>Total return product</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('returnProductsHistory.admin')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>
              <div class="card card-primary card-outline">
                 <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>#Sl</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Retail Price</th>
                          <th>Sku</th>
                          <th>category</th>
                          <th>Brand</th>
                          <th>Image</th>
                          <th style="text-align: center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if ($latestProduct)
                            @foreach($latestProduct as $key => $product)
                                <tr>
                                    <td width="25px">{{ count($latestProduct) - $loop->index }}</td>

                                    <td>{{$product->name ?? ''}}</td>
                                    <td>{{$product->cost_price ?? ''}}</td>
                                    <td>{{$product->retail_price ?? ''}}</td>
                                    <td>{{$product->sku ?? ''}}</td>
                                    <td>{{$product->category->name ?? ''}}</td>
                                    <td>{{$product->brand->name ?? ''}}</td>
                                    <td>
                                        <img src="{{asset($product->image)}}" alt="{{$product->name ?? ''}}" style="width: 50px; height:60px; border-radius: 25px; ">
                                    </td>
                                    <td class="text-center">
                                         <a href="{{route('productShow.admin',$product->id)}}" class="btn btn-sm btn-primary">
                                            <li class="fa fa-desktop" title="View button"></li>
                                         </a>
                                         <a href="{{route('editProduct.Admin',$product->id)}}" class=" btn btn-sm btn-info" title="Edit button">
                                            <li class="fa fa-edit"></li>
                                         </a>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-warning sa-delete" data-form-id="product-delete-{{$product->id}}">
                                            <i class="fa fa-trash text-danger" title="Delete"></i></a>
                                        <form action="{{route('product.delete',$product->id)}}" id="product-delete-{{$product->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                  </tr>
                                @endforeach
                            @endif
                        </tbody>
                      </table>
                 </div>
              </div>
        </div>
    </section>
@endsection
