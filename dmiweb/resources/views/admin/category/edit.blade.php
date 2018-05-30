@extends('admin.master')

@section('content')
<section class="content-header">
    <h1 class="box-title">Edit <small> Category</small></h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
          {!! Form::model($category,['method'=> 'PATCH','action'=>['Backend\CategoryController@update',$category->id]]) !!}
           @include('admin.category.form',['submitButtonText'=>'Update Category'])
          {!! Form::close() !!}
          @include('admin.partial.mediacontrol')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
