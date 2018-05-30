@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
    <div class="btn-group" style="margin-right:10px;">
      <a onclick="history.go(-1);" class="btn btn-info"><i class="fa fa-angle-left"></i></a>
      <a onclick="history.go(-1);" class="btn btn-primary"> Back</a>
    </div>
      {{$reservation->name}}  
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ url('/') }}/backend/reservation"> User</a></li>
    <li class="active">Edit User</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                  <div class="box box-primary">
                  <div class="box-body box-profile">
                    <h3 class="profile-username">{{$reservation->name}}  </h3>
                    <div class="box-body">
                      <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                      <p class="text-muted">
                          {{$reservation->email}}
                      </p>
                      <hr>
                      <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>
                      <p class="text-muted">
                          {{$reservation->phone}}
                      </p>
                      <hr>
                      <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
                      <p class="text-muted">
                          {!!$reservation->address!!}
                      </p>
                      <hr>
                      <strong><i class="fa fa-file-text-o margin-r-5"></i> KTP</strong>
                      <p class="text-muted">
                          @if (!is_null($reservation->ktp))
                            <a href="{{url('/')}}/uploads/ktp/{{$reservation->ktp}}" target="_blank">
                                <img src="{{url('/')}}/uploads/ktp/{{$reservation->ktp}}" alt="" width="100">
                            </a>
                          @endif  
                      </p>
                      <hr>
                      <strong><i class="fa fa-file-text-o margin-r-5"></i> NPWP</strong>
                      <p class="text-muted">
                          @if (!is_null($reservation->npwp))
                            <a href="{{url('/')}}/uploads/npwp/{{$reservation->npwp}}" target="_blank">
                                <img src="{{url('/')}}/uploads/npwp/{{$reservation->npwp}}" alt="" width="100">
                            </a>
                          @endif  
                      </p>
                      <hr>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
             </div><!-- .col-md-6-->
            <div class="col-md-6">
                  <div class="box box-primary">
                  <div class="box-body box-profile">
                    <div class="box-body">
                      <strong>Product :</strong>
                      <p class="text-muted">
                        {{$reservation->product->title}}
                      </p>
                      <hr>
                      <strong>Price : </strong>
                      <p class="text-muted">
                        Rp. {{number_format($reservation->product->price)}}
                      </p>
                      <hr>
                      <strong>Quantity :  {{$reservation->qty}}</strong>
                      <hr>
                      <strong>Domisili</strong>
                      <p class="text-muted">
                          {!!$reservation->domisili->title!!}  -  Rp. {{number_format($reservation->domisili->value)}}
                      </p>
                      <hr>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
             </div><!-- .col-md-6-->
        </div><!-- .row -->
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->

@endsection

