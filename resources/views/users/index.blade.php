@extends('layouts.master')
@section('title','Users Page')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
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
                <div class="col-md-4"><h4>All user's list</h4></div>
                <div class="col-md-4"><a href="{{route('users.create')}}" class="btn btn-primary" style="float: right;"><li class="fa fa-plus"> Add User</li></a> </div>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#Sl</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created At</th>
                  <th style="text-align: center">Action</th>
                </tr>
                </thead>
                <tbody>
                    @if ($users)
                        @foreach ($users as $key=>$user )
                        <tr>
                            <td width="25px">{{++$key}}</td>
                            <td>{{$user->name ?? ''}}</td>
                            <td>{{ $user->email ?? '' }}
                                @if (auth()->id() == $user->id)
                                    <i class="text-info">(You)</i>
                                @endif

                            </td>
                            <td>{{$user->created_at ? $user->created_at->format('d F, Y:i A') : ''}}</td>

                            <td class="text-center">
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm tbn-info"> <i class="fa fa-edit text-success"></i> Edit</a>
                               @if (auth()->id() != $user->id)
                               <a href="javascript:void(0);" class="btn btn-sm tbn-info sa-delete" data-form-id="user-delete-{{$user->id}}"> <i class="fa fa-trash text-danger"></i> Delete</a>
                               <form action="{{route('users.destroy',$user->id)}}" id="user-delete-{{$user->id}}" method="post">
                                   @csrf
                                   @method('DELETE')
                               </form>
                               @endif

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
