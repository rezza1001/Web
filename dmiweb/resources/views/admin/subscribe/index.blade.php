@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    Manage Subscriber
    <a class="btn btn-info btn-sm" href="{{ url('/') }}/backend/export">Export to Excel</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Subscriber</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Subscriber <small>List</small></h3>
        </div><!-- /.box-header -->
        <div class="box-body pad">

            <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Create Date</th>
                  </tr>

                  @if(count($subscribes))
                   <?php
                   $a = $subscribes->perPage();
                   $b = $subscribes->currentPage();
                   $i = ($b-1)*$a;
                   ?>
                  @foreach($subscribes as $item)
                   <?php $i++; ?>
                  <tr>
                    <td width="1"> <?php echo $i; ?></div></td>
                    <td width="">{{ $item->email}}</td>
                    <td>
                      @if($item->status == 1)
                        <label class="label label-info">Subscribed</label>
                      @else
                        <label class="label label-warning">Unubscribed</label><br>
                        <strong>Reason:</strong><br>{{$item->message}}
                      @endif
                    </td>
                    <td width="">{{ $item->created_at}}</td>
                  </tr>
                  @endforeach
                  <tfoot>
                    <tr>
                      <td colspan="20">
                        {{ $subscribes -> links()}}
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
