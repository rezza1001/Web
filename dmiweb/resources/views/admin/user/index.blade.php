@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    Member List
    <div class="btn-group">
      <a href="{{ url('/') }}/backend/user/create" class="btn btn-primary btn-sm"> Add New User</a>
    </div>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/user"> User</a></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">User <small>List</small></h3>
          <!-- tools box -->
          <div class="pull-right box-tools">
            <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          </div><!-- /. tools -->
        </div><!-- /.box-header -->
        <div class="box-body pad">
            <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>

                  @if(count($users))
<?php
$a = $users->perPage();
$b = $users->currentPage();
$i = ($b-1)*$a;
?>
@foreach($users as $item)
<?php $i++;?>
                    @if($item->id != 1)
                    @php
                      $like = App\Like::where('user_id',$item->id)->count();
                    @endphp
                  <tr>
                    <td width="1"> <?php echo $i;?></div></td>
                    <td width="100">{{ $item->name}}</td>
                    <td width="140">{{ $item->email}}</td>
                    <td width="140"><label class="label label-primary">{{ $item->roles()->first()->name}}</label></td>
                    <td width="100">{{ $item->created_at}}</td>
                    <td width="70">
                      {{Form::open(['action'=>['Backend\UserController@destroy',$item->id],'onsubmit' => 'return ConfirmDelete()','method'=>'delete'])}}
                        <div class="btn-group">
                            <a target="_blank" class="btn btn-success btn-sm" href="{{ url('/') }}/user/{{ $item->slug}}">View</a>
                            <a class="btn btn-warning btn-sm" href="{{ url('/') }}/backend/user/{{ $item->id}}/edit">Edit</a>
                            {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
                      </div>
                      {{Form::close()}}
                    </td>
                  </tr>
                    @endif
                  @endforeach
                  <tfoot>
                    <tr>
                      <td colspan="20">
                        {{ $users -> links()}}
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
