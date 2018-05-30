@extends('admin.master')

@section('content')

  <section class="content-header">
    <h1>
      Add Service
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/') }}/backend/service"> Service</a></li>
      <li class="active">Add Service</li>
    </ol>
  </section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($service = new\App\Service,['url' => 'backend/service', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
          @include('admin.service.form',['submitButtonText'=>'Add New Service'])
         {!! Form::close() !!}
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
