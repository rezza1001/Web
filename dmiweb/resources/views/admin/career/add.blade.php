@extends('admin.master')

@section('content')

  <section class="content-header">
    <h1>
      Add Career
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/') }}/backend/career"> Career</a></li>
      <li class="active">Add Career</li>
    </ol>
  </section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($career = new\App\Career,['url' => 'backend/career', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
          @include('admin.career.form',['submitButtonText'=>'Add New Career'])
         {!! Form::close() !!}
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
