@extends('admin.master')

@section('content')

  <section class="content-header">
    <h1>
      Add Domisili
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/') }}/backend/domisili"> Domisili</a></li>
      <li class="active">Add Domisili</li>
    </ol>
  </section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($domisili = new\App\Domisili,['url' => 'backend/domisili', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
          @include('admin.domisili.form',['submitButtonText'=>'Add New Domisili'])
         {!! Form::close() !!}
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
