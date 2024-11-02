@extends('layouts.master')
@section('title','Edit user page')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">New user </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Edit</li>
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
            <h3 class=" text-center">Edit and update</h3>
            <div class="card-body">
              <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="Name">User Name <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" id="name" value="{{$user->name ?? ''}}" name="name" placeholder="Enter user name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">User Email<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="email" value="{{ $user->email ?? ''}}" name="email" placeholder="Enter user email">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="password">Password <span class="text-danger">*</span></label>
                      <input type="password" class="form-control" id="password"  name="password" placeholder="Enter user password">
                      @if ($errors->has('password'))
                          <span class="text-danger">{{ $errors->first('password') }}</span>
                      @endif
                  </div>
                  <div class="form-group">
                    <label for="password">Confiram Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Enter user password">
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{route('users.index')}}" type="submit" class="btn btn-secondary float-right">Back</a>
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
