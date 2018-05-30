@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    Manage Reservation
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Reservation</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Reservation <small>List</small></h3>
          <!-- tools box -->
        </div><!-- /.box-header -->
        <div class="box-body pad">

            <div class="box">
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>KTP</th>
                    <th>NPWP</th>
                    <th>Create Date</th>
                    <th>Action</th>
                  </tr>

                  @if(count($reservations))
                   <?php
                   $a = $reservations->perPage();
                   $b = $reservations->currentPage();
                   $i = ($b-1)*$a;
                   ?>
                  @foreach($reservations as $item)
                   <?php $i++; ?>
                  <tr>
                    <td width="1"> <?php echo $i; ?></div></td>
                    <td width="">{{ $item->name}}</td>
                    <td width="">{{ $item->email}}</td>
                    <td width="">{{ $item->phone}}</td>
                    <td width="">
                      @if (!is_null($item->ktp))
                        <a href="{{url('/')}}/uploads/ktp/{{$item->ktp}}" target="_blank">Download</a>
                      @endif  
                    </td>
                    <td width="">
                      @if (!is_null($item->npwp))
                        <a href="{{url('/')}}/uploads/npwp/{{$item->npwp}}" target="_blank">Download</a>
                      @endif  
                    </td>
                    <td width="">{{ $item->created_at}}</td>
                    <td width="170">
                      {{Form::open(['action'=>['Backend\ReservationController@destroy',$item->id],'onsubmit' => 'return ConfirmDelete()', 'method'=>'delete'])}}
                        <div class="btn-group">
                            <a target="_blank" class="btn btn-success btn-sm" href="{{ url('/') }}/backend/reservation/{{ $item->id}}">View</a>
                            {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])}}
                        </div>
                      {{Form::close()}}
                    </td>
                  </tr>
                  @endforeach
                  <tfoot>
                    <tr>
                      <td colspan="20">
                        {{ $reservations -> links()}}
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
