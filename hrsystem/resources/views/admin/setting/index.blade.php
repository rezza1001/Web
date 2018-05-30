@extends('admin.master')

@section('content')
	<section class="content">
		<section class="content-header">
	      <h1>
	        Pengaturan
	      </h1>
	      <ol class="breadcrumb">
	        <li class="active"><i class="fa fa-fw fa-wrench"></i> Pengaturan</li>
	      </ol>
	    </section>
   
		<section class="content">
	    <div class="row">
		  <div class="col-xs-12">
		  	 <div class="col-md-6" style="padding-left: 5px !important">
        	  	@include('admin.setting.workday')
        	 </div>

        	 <div class="col-md-6" style="padding-left: 5px !important">
        	 	 @include('admin.setting.organization')
        	 </div>
          </div>
        </div>
        <div class="row">
		  <div class="col-xs-12">
		  	 <div class="col-md-6" style="padding-left: 5px !important">
        	 	 @include('admin.setting.time')
        	 </div>
		  </div>
		</div>
	    </section>

	</section>
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="/js/plugin/jquery.min.js"></script>
<script src="/js/setting/setting.js"></script>