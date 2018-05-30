@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    Edit Domisili
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/domisili"> Domisili</a></li>
    <li class="active">Edit Domisili</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
          {!! Form::model($domisili,['method'=> 'PATCH','action'=>['Backend\DomisiliController@update',$domisili->id]]) !!}
           @include('admin.domisili.form',['submitButtonText'=>'Update Domisili'])
          {!! Form::close() !!}
          @include('admin.partial.mediacontrol')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
