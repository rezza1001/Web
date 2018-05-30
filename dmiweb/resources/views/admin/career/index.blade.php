@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    Manage Careers
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Careers</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Careers</h3>
          <!-- tools box -->
          <div class="pull-right">
              <a class="btn btn-info btn-sm" href="{{ url('/') }}/backend/career/create">Add New Career</a>
          </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body pad">

            <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>No</th>
                    <th>Career Title</th>
                    <th>Language</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>

                  @if(count($careers))
                   <?php
                   $a = $careers->perPage();
                   $b = $careers->currentPage();
                   $i = ($b-1)*$a;
                   ?>
                  @foreach($careers as $item)
                   <?php $i++; ?>
                  <tr>
                    <td width="1"> <?php echo $i ;?></div></td>
                    <td width="">{{ $item->title}}</td>
                    <td width="">{{ $item->locale}}</td>
                    <td width="">{{ $item->created_at}}</td>
                    <td width="170">
                      {{Form::open(['action'=>['Backend\CareerController@destroy',$item->id],'onsubmit' => 'return ConfirmDelete()', 'method'=>'delete'])}}
                        <div class="btn-group">
                            <a class="btn btn-warning btn-sm" href="{{ url('/') }}/backend/career/{{ $item->id}}/edit">Edit</a>
                            {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
                        </div>
                      {{Form::close()}}
                    </td>
                  </tr>
                  @endforeach
                  <tfoot>
                    <tr>
                      <td colspan="20">
                        {{ $careers->links()}}
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
