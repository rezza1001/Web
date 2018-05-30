@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    Edit Banner
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/banner"> Banner</a></li>
    <li class="active">Edit Banner</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
          {!! Form::model($banner,['method'=> 'PATCH','action'=>['Backend\BannerController@update',$banner->id]]) !!}
           @include('admin.banner.form',['submitButtonText'=>'Update Banner'])
          {!! Form::close() !!}
          @include('admin.partial.mediacontrol')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
