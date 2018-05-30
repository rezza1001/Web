@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    Manage Service
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Service</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Service <small>List</small></h3>
          <!-- tools box -->
          <div class="pull-right">
              <a class="btn btn-info btn-sm" href="{{ url('/') }}/backend/service/create">Add New Service</a>
          </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body pad">

            <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Language</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>

                  @if(count($services))
                   <?php
                   $a = $services->perPage();
                   $b = $services->currentPage();
                   $i = ($b-1)*$a;
                   ?>
                  @foreach($services as $item)
                   <?php $i++; ?>
                  <tr>
                    <td width="1"> <?php echo $i; ?></div></td>
                    <td width="">{{ $item->title}}</td>
                    <td width="">{{ $item->locale}}</td>
                    <td width="">{{ $item->created_at}}</td>
                    <td width="170">
                      {{Form::open(['action'=>['Backend\ServiceController@destroy',$item->id],'onsubmit' => 'return ConfirmDelete()', 'method'=>'delete'])}}
                        <div class="btn-group">
                            <a target="_blank" class="btn btn-success btn-sm" href="{{ url('/') }}/service/{{ $item->slug}}">View</a>
                            <a class="btn btn-warning btn-sm" href="{{ url('/') }}/backend/service/{{ $item->id}}/edit">Edit</a>
                            {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
                        </div>
                      {{Form::close()}}
                    </td>
                  </tr>
                  @endforeach
                  <tfoot>
                    <tr>
                      <td colspan="20">
                        {{ $services -> links()}}
                      </td>
                    </tr>
                  </tfoot>
                  @endif
                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
      </div>
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->
@endsection
