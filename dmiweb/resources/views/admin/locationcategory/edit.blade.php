@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    Edit Location Category
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/locationcategory"> Location Category</a></li>
    <li class="active">Edit Location Category</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
          {!! Form::model($locationcategory,['method'=> 'PATCH','action'=>['Backend\LocationCategoryController@update',$locationcategory->id]]) !!}
           @include('admin.locationcategory.form',['submitButtonText'=>'Update Location Category'])
          {!! Form::close() !!}
          @include('admin.partial.mediacontrol')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
