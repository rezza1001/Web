@extends('admin.master')

@section('content')
	<section class="content">
		<section class="content-header">
	      <h1>
	        Halaman Utama
	      </h1>
	      <ol class="breadcrumb">
	        <li class="active"><i class="fa fa-book"></i> Halaman Utama</li>
	      </ol>
	    </section>
   
		<div class="modal fade"" id="modal_detail" tabindex="-1" data-focus-on="input:first">
		    <div class="modal-dialog">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		            <span aria-hidden="true">&times;</span></button>
		            <h4 class="modal-title">Absensi Manual</h4>
		        </div>
		        <div class="modal-body">
		            <div class="form-group">
		                <label>Absensi</label>
		                <select id="type_absent" onchange="selectAbsent(this.value)" class="form-control select2" style="
		                width: 100%;">
		                	<option value="-99">Pilih tipe absensi</option>
		                	<option value="1">Masuk Kerja</option>
		                	<option value="2">Pulang Kerja</option>
		                </select>
		            </div>
		             <div class="form-group">
				        <div class="bootstrap-timepicker">
				          <div class="form-group">
				            <label id="lbl_time">Jam </label>
				            <div class="input-group">
				                <input id="start_time" type="text" class="form-control timepicker">
				                <div class="input-group-addon"> <i class="fa fa-clock-o"></i></div>
				            </div>
				          </div>
				        </div>
				    </div>
			        <div class="form-group">
		                <label id="lbl_note">Catatan</label>
		                <textarea id="note" class="form-control" rows="2" placeholder="Catatan/Alasan"></textarea>
              		</div>			    
		            <div class="row" >
		              <div class="col-lg-12">
		                  <button type="button"  onclick="saveData()"  class="btn btn-success pull-right"><i class="fa fa-plus"></i> Simpan </button>
		              </div>
		            </div>
		        </div>
		      </div>
		    </div>
  		</div>

		<section class="content" style="background-color: white; margin-top: 10px">
		 <div class="row" style="margin-left: 5px">
        	 <div class="col-md-3" style="background-color: #00a65a; padding: 10px; box-shadow: 0 3px 3px rgba(0,0,0,0.1); border-radius: 5px;" >
		 		<table style="width: 100%">
		 			<tr>
		 				<td rowspan="2"><i class="fa fa-fw fa-calendar-minus-o" style="font-size: 40px; width:50px; color: white"></i></td>
		 				<td style="width: 40%"> <small style="color: white"><b>Tanggal </b></small> </td>
		 				<td style="color: white; width: 5%"> : </td>
		 				<td style="width: 50%"><small id="date_today" style="color: white"> -</small></td>
		 			</tr>
		 			<tr>
		 				<td style="width: 40%"> <small style="color: white"><b>Status</b></small> </td>
		 				<td style="color: white; width: 5%"> : </td>
		 				<td style="width: 50%"><small id="status" style="color: white"> -</small></td>
		 			</tr>
		 		</table>
        	</div>
        	 <div class="col-md-3" style="background-color: #00a65a; padding: 10px; box-shadow: 0 3px 3px rgba(0,0,0,0.1); border-radius: 5px; margin-left: 5px" >
		 		<table style="width: 100%">
		 			<tr>
		 				<td rowspan="2"><i class="fa fa-clock-o" style="font-size: 40px; width:50px; color: white"></i></td>
		 				<td style="width: 40%"> <small style="color: white"><b>Jam Masuk</b></small> </td>
		 				<td style="color: white; width: 5%"> : </td>
		 				<td style="width: 50%"><small id="checkin" style="color: white"> - </small></td>
		 			</tr>
		 			<tr>
		 				<td style="width: 40%"> <small style="color: white"><b>Jam Keluar</b></small> </td>
		 				<td style="color: white; width: 5%"> : </td>
		 				<td style="width: 50%"><small id="checkout" style="color: white"> - </small></td>
		 			</tr>
		 		</table>
        	</div>
        	<div class="col-md-12" ><br/></div>
        </div>
	      <div class="row">
	      	<div class="col-md-12" >
	      		<table class="table table-hover">
	      		<thead>
	      			  <tr>
	                  <th>No.</th>
	                  <th>Nama karywan</th>
	                  <th>Jam Masuk</th>
	                  <th>Catatan Masuk</th>
	                  <th>Jam Keluar</th>
	                  <th>Catatan Keluar</th>
	                  <th>Keterangan</th>
	                </tr>
	      		</thead>
                <tbody id="absent_body">
	                <tr>
	                  <td colspan="7" style="text-align: center;">Tidak ada data</td>
	                </tr>
              </tbody></table>
	      	</div>
	      </div>
	    </section>

	</section>
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="/js/plugin/jquery.min.js"></script>
<script src="/js/dashboard.js"></script>