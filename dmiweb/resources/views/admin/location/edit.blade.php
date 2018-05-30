@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    Edit Location
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/location"> Location</a></li>
    <li class="active">Edit Location</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
          {!! Form::model($location,['method'=> 'PATCH','action'=>['Backend\LocationController@update',$location->id]]) !!}
           @include('admin.location.form',['submitButtonText'=>'Update Location'])
          {!! Form::close() !!}
          @include('admin.partial.mediacontrol')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
