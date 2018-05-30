@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    Edit Service
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/service"> Service</a></li>
    <li class="active">Edit Service</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
          {!! Form::model($service,['method'=> 'PATCH','action'=>['Backend\ServiceController@update',$service->id]]) !!}
           @include('admin.service.form',['submitButtonText'=>'Update Service'])
          {!! Form::close() !!}
          @include('admin.partial.mediacontrol')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
