@extends('admin.master')

@section('content')

<section class="content-header">
  <h1>
    Edit Product
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/product"> Product</a></li>
    <li class="active">Edit Product</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
          {!! Form::model($product,['method'=> 'PATCH','action'=>['Backend\ProductController@update',$product->id]]) !!}
           @include('admin.product.form',['submitButtonText'=>'Update Product'])
          {!! Form::close() !!}
          @include('admin.partial.mediacontrol')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
