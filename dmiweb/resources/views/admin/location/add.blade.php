@extends('admin.master')

@section('content')

  <section class="content-header">
    <h1>
      Add Location 
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/') }}/backend/location"> Location </a></li>
      <li class="active">Add Location </li>
    </ol>
  </section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($location = new\App\Location,['url' => 'backend/location', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
          @include('admin.location.form',['submitButtonText'=>'Add New Location '])
         {!! Form::close() !!}
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
