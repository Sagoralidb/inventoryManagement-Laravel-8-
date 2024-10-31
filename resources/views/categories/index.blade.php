@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Categories</h1>
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
                <div class="col-md-4"><h4>Category List</h4></div>

                <div class="col-md-4"><a href="{{route('category.create')}}" class="btn btn-primary" style="float: right;"><li class="fa fa-plus"> Add New</li></a> </div>
              </div>

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
                    @if ($categories)
                        @foreach ($categories as $key=>$category )
                        <tr>
                            <td width="25px">{{++$key}}</td>
                            <td>{{$category->name ?? ''}}</td>
                            <td class="text-center">
                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm tbn-info"> <i class="fa fa-edit text-success"></i> Edit</a>
                                <a href="javascript:void(0);" class="btn btn-sm tbn-info sa-delete" data-form-id="category-delete-{{$category->id}}"> <i class="fa fa-trash text-danger"></i> Delete</a>
                                <form action="{{route('category.delete',$category->id)}}" id="category-delete-{{$category->id}}" method="post">
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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
