@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    <div class="btn-group" style="margin-right:10px;">
      <a onclick="history.go(-1);" class="btn btn-info"><i class="fa fa-angle-left"></i></a>
      <a onclick="history.go(-1);" class="btn btn-primary"> Back</a>
      <a href="{{ url('/') }}/backend/user/create" class="btn btn-info ">Add New</a>
    </div>
      Edit User  <small>{{$user->name}}</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/user"> User</a></li>
    <li class="active">Edit User</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($user,['method'=> 'PATCH','action'=>['Backend\UserController@update',$user->id]]) !!}
          @include('admin.user.formedit',['submitButtonText'=>'Edit User'])
          {!! Form::close() !!}
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
