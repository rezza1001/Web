@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    <div class="btn-group">
      <a onclick="history.go(-1);" class="btn btn-info"><i class="fa fa-angle-left"></i></a>
      <a onclick="history.go(-1);" class="btn btn-primary"> Back</a>
      <a onclick="javascript.void(0);" class="btn btn-default btn-disable"> Add New User</a>
    </div>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/user"> User</a></li>
    <li class="active">Add New</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($user = new\App\User,['url' => '/backend/user', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}

          @include('admin.user.form',['submitButtonText'=>'Add User'])
        {!! Form::close() !!}
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
