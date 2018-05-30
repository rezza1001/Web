@extends('admin.master')

@section('content')
	<section class="content">

		<section class="content-header">
	      <h1>
	        Laporan Absensi
	      </h1>
	      <ol class="breadcrumb">
	        <li class="active"><i class="fa fa-book"></i> Laporan</li>
	      </ol>
	    </section>
   
		<section class="content" style="background-color: white; margin-top: 10px">

		<div class="modal fade"" id="modal_parameter" tabindex="-1" data-focus-on="input:first">
		    <div class="modal-dialog">
		      <div class="modal-content modal-content-full">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span></button>
		            <h4 class="modal-title">Parameter</h4>
		        </div>
		        <div class="modal-body">
		        	<div class="form-group">
                		<label>Date range:</label>
		                <div class="input-group">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="text" class="form-control pull-right" id="reservation">
		                </div>
	                </div>
		            <div class="form-group">
		                <label>Karyawan</label>
		                <select id="employee" class="form-control select2" style="width: 100%;">
		                </select>
		            </div>
		            <div class="row" >
		              <div class="col-lg-12">
		                  <button type="button"  onclick="findData()"  class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tampilkan Data </button>
		              </div>
		            </div>
		        </div>
		      </div>
		    </div>
  		</div>

		 <div class="row">
        	<div class="col-md-6" >
		 		<table style="width: 100%">
		 			<tr>
		 				<td style="width: 20%"> <small><b>Tanggal</b></small> </td>
		 				<td>:</td>
		 				<td style="width: 25%"><small id="start_date"> 12 Mei 2017</small></td>
		 				<td><b>-</b></td>
		 				<td ><small id="end_date"> 12 Mei 2017 </small> </td>
		 			</tr>
		 			<tr>
		 				<td style="width: 20%"> <small><b>Pegawai</b></small> </td>
		 				<td>:</td>
		 				<td colspan="3" style="width: 18%"><small  id="employee_text"> Semua Pegawai</small></td>
		 			</tr>
		 			<tr class="level_2" style="display: none;">
		 				<td style="width: 20%"> <small><b>Tanggal</b></small> </td>
		 				<td>:</td>
		 				<td colspan="3" style="width: 18%"><small id="text_tgl"> Semua Status</small></td>
		 			</tr>
		 		</table>
        	</div>
        	<div class="col-md-6" >
       
        		<button type="button" class="btn btn-default pull-right" style="margin-right: 5px;">
            		<i class="fa fa-print"></i> Cetak
          		</button>
          		<button type="button" onclick="openParemeter()" class="btn btn-primary pull-right" style="margin-right: 5px;">
            		<i class="fa fa-fw fa-sliders"></i> Parameter
          		</button>
        	</div>
        	<div class="col-md-12" ><br/></div>
		 </div>

	      <div class="row" id="level_1">
	      	<div class="col-md-12" >
	      		<table class="table table-bordered">
	      		<thead>
	      			<tr class="heading" >
	                  <th class="header" height="10">No.</th>
	                  <th class="header" height="10">Tanggal</th>
	                  <th class="header" height="10">Jumlah Karyawan</th>
	                  <th class="header" height="10">Persentase Absensi</th>
	                </tr>
	      		</thead>
                <tbody id="level1_body">
	                <tr>
	                  <td colspan="4">Tidak ada data</td>
	                </tr>
              </tbody></table>
	      	</div>
	      </div>
	      <div class="row level_2" style="display: none;">
	      	<i class="fa fa-fw fa-arrow-left" style="font-size: 25px; margin-bottom: 5px; margin-left: 10px; color: blue; cursor: pointer;" onclick="backToLevel1()"></i>
	      </div>
	      <div class="row level_2" style="display: none;" >
	      	<div class="col-md-12" >
	      		<table class="table table-hover">
		      		<thead>
		      			<tr class="heading" >
		                  <th  class="header" >No.</th>
		                  <th  class="header" >Nama pegawai</th>
		                  <th  class="header" >Jabatan</th>
		                  <th  class="header" >Status Absensi</th>
		                  <th  class="header" >Jam Masuk</th>
		                  <th  class="header" >Jam Pulang</th>
		                  <th  class="header" >Catatan</th>
		                </tr>
		      		</thead>
	                <tbody id="level2_body">
		                <tr style="cursor: pointer;">
		                  <td colspan="7">Tidak Ada Data</td>
		                </tr>
	               </tbody>
          		</table>
	      	</div>
	      </div>
	    </section>

	</section>
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="/js/plugin/jquery.min.js"></script>
<script src="/js/report.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            .header {
                background-color: #000111 !important;
                color: #f4f5f7 !important;
                line-height: 12px;
            }
        </style>