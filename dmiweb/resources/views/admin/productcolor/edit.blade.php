@extends('admin.master')

@section('content')
<section class="content-header">
    <h1 class="box-title">Edit <small> Product Color</small></h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
          {!! Form::model($productcolor,['method'=> 'PATCH','action'=>['Backend\ProductColorController@update',$productcolor->id]]) !!}
           @include('admin.productcolor.form',['submitButtonText'=>'Update Color'])
          {!! Form::close() !!}
          @include('admin.partial.mediacontrol')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
