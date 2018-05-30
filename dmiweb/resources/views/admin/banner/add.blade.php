@extends('admin.master')

@section('content')

  <section class="content-header">
    <h1>
      Add Banner
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/') }}/backend/banner"> Banner</a></li>
      <li class="active">Add Banner</li>
    </ol>
  </section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($banner = new\App\Banner,['url' => 'backend/banner', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
          @include('admin.banner.form',['submitButtonText'=>'Add New Banner'])
         {!! Form::close() !!}
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
