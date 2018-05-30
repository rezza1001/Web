@extends('admin.master')

@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-12">
      @if(Session::has('message'))
            <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>  <i class="icon fa fa-check"></i> {{ Session::get('message') }}</h4>
            </div>
      @endif
    </div>
    <div class="col-md-6">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Add <small>New Product Year</small></h3>
            <div class="pull-right box-tools">
              <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /. tools -->
          </div><!-- /.box-header -->
          <div class="box-body pad">
                <div class="box box-primary">
                  {!! Form::open(array('url' => 'backend/productyear', 'class' => 'form', 'enctype' => 'multipart/form-data')) !!}
                    <div class="box-body">
                      <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title','Product Year Name:') !!}
                        {!! Form::text('title',null, ['class'=>'form-control']) !!}
                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        {!! Form::submit('Add New Product Year', ['class'=>'btn btn-primary']) !!}
                    </div>
                  {!! Form::close() !!}
                </div><!-- /.box -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col-md-4-->
    <div class="col-md-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Product Year <small>List</small></h3>
        <div class="pull-right box-tools">
          <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /. tools -->
      </div><!-- /.box-header -->
      <div class="box-body pad">
          <div class="pad box-body table-responsive">
            <table class="table table-hover">
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
              @if(count($productyears))
<?php $i = 0;?>
@foreach($productyears as $category)
<?php $i++;?>
              <tr>
                <td width="1"> <?php echo $i;?></td>
                <td><label class="label" >{{ $category->title}}</label></td>
                <td width="170">
                  {{Form::open(['action'=>['Backend\ProductYearController@destroy',$category->id],'onsubmit' => 'return ConfirmDelete()','method'=>'delete'])}}
                    <div class="btn-group">
                        <a class="btn btn-warning btn-sm" href="{{ url('/') }}/backend/productyear/{{ $category->id}}/edit">Edit</a>
                        {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
                  </div>
                  {{Form::close()}}
                </td>
              </tr>
              @endforeach
              @endif
            </table>
          </div><!-- /.box-body -->
      </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div><!-- /.col-md-4-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection
