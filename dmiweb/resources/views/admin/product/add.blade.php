@extends('admin.master')

@section('content')

  <section class="content-header">
    <h1>
      Add Product
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/') }}/backend/product"> Product</a></li>
      <li class="active">Add Product</li>
    </ol>
  </section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($product = new\App\Product,['url' => 'backend/product', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
          @include('admin.product.form',['submitButtonText'=>'Add New Product'])
         {!! Form::close() !!}
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
