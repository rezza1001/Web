@extends('admin.master')

@section('content')

  <section class="content-header">
    <h1>
      Add Article
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('/') }}/backend/post"> Article</a></li>
      <li class="active">Add Article</li>
    </ol>
  </section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
         {!! Form::model($post = new\App\Post,['url' => 'backend/post', 'class' => 'form', 'enctype' => 'multipart/form-data']) !!}
          @include('admin.post.form',['submitButtonText'=>'Add New Article'])
         {!! Form::close() !!}
          @include('admin.partial.mediacontrol-post')
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->
@endsection
