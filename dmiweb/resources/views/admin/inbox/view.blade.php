@extends('admin.master')

@section('content')
<section class="content-header">
  <h1>
   Inbox <a href="{{ url('/') }}/backend/inbox" class="btn btn-info">Inbox</a>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url('/') }}/backend/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Inbox</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
           <div class="box-header with-border">
              <h3 class="box-title">Read Mail</h3>
            </div>
             <div class="box-body">
               <div class="mailbox-read-info">
                 <h3>{{$inbox->subject}}</h3>
                 <h5>From : {{$inbox->email}} ({{$inbox->name}})
                    <span class="mailbox-read-time pull-right">{{$inbox->created_at}}</span>
                 </h5>
               </div>
               <div class="mailbox-read-message">
                  Phone : {{$inbox->phone}}<br><br>
                 {{$inbox->message}}
               </div>
             </div><!-- /.box-body -->
      </div>
    </div><!-- /.col-->
  </div><!-- ./row -->
</section><!-- /.content -->
@endsection
