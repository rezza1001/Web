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
            <h3 class="box-title">Add <small>New Product Category</small></h3>
            <div class="pull-right box-tools">
              <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /. tools -->
          </div><!-- /.box-header -->
          <div class="box-body pad">
                <div class="box box-primary">
                  {!! Form::open(array('url' => 'backend/productcategory', 'class' => 'form', 'enctype' => 'multipart/form-data')) !!}
                    <div class="box-body">
                      <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title','Product Category Name:') !!}
                        {!! Form::text('title',null, ['class'=>'form-control']) !!}
                      </div>
                      <div class="form-group  {{ $errors->has('image_upload') ? ' has-error' : '' }}">
                        <div class="rowupload">
                            <label>Category Image</label>
                            <input type="file" name="image_upload" value="{{ old('image_upload') }}" placeholder="Upload Image">
                        </div>
                      </div>
                      <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                        {!! Form::label('description','Product Category Description:') !!}
                        {!! Form::textarea('description',null, ['class'=>'form-control textarea']) !!}
                      </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        {!! Form::submit('Add New Product Category', ['class'=>'btn btn-primary']) !!}
                    </div>
                  {!! Form::close() !!}
                </div><!-- /.box -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col-md-4-->
    <div class="col-md-6">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Product Category <small>List</small></h3>
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
              @if(count($productcategories))
<?php $i = 0;?>
@foreach($productcategories as $category)
<?php $i++;?>
              <tr>
                <td width="1"> <?php echo $i;?></td>
                <td><label class="label" >{{ $category->title}}</label></td>
                <td width="170">
                  {{Form::open(['action'=>['Backend\ProductCategoryController@destroy',$category->id],'onsubmit' => 'return ConfirmDelete()','method'=>'delete'])}}
                    <div class="btn-group">
                        <a class="btn btn-warning btn-sm" href="{{ url('/') }}/backend/productcategory/{{ $category->id}}/edit">Edit</a>
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
