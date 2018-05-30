@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    Edit Career
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/career"> Career</a></li>
    <li class="active">Edit Career</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
          {!! Form::model($career,['method'=> 'PATCH','action'=>['Backend\CareerController@update',$career->id]]) !!}
           @include('admin.career.form',['submitButtonText'=>'Update Career'])
          {!! Form::close() !!}
          @include('admin.partial.mediacontrol')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
