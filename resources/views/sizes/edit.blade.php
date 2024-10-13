@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Sizes</h1>
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
      <div class="row">
        <div class="col-lg-6">
          <div class="card card-primary card-outline"><br>
            <h5 class="card-title text-center">Update Size</h5>
            <div class="card-body">         
              <form action="{{ route('sizes.update',$size->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="Name">Update Size</label>
                        <input type="text" class="form-control" id="size" name="size" value="{{$size->size}}" placeholder="Enter category size">
                        @if ($errors->has('size'))
                            <span class="text-danger">{{ $errors->first('size') }}</span>
                        @endif
                    </div>
                </div>
                <!-- /.card-body -->   
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{route('sizes.index')}}" type="submit" class="btn btn-secondary float-right">Back</a>
                </div>
            </form>
            
            </div>
          </div><!-- /.card -->
        </div>
      
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection