@extends('admin.master')

@section('content')
	<section class="content">
		<section class="content-header">
	      <h1>
	        Data karyawan
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="active">Data Pegawai</li>
	      </ol>
	    </section>

        <div class="modal fade"" id="modal_detail" tabindex="-1" data-focus-on="input:first">
          <div class="modal-dialog modal-dialog-full">
            <div class="modal-content modal-content-full">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Informasi Pegawai</h4>
              </div>
              <div class="modal-body">
                 @include('admin.employee.detail')
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


        <div class="modal fade col-md-12" id="modal_add" tabindex="-1" data-focus-on="input:first" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Informasi Pegawai</h4>
              </div>
              <div class="modal-body " >
                 @include('admin.employee.edit')
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>



		<section class="content">
	    <div class="row">
		<div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
            	<div class="pull-right">
              		 <button type="button" class="btn btn-success" onclick="openDetail(-1)">Tambah</button>
          		</div>

{{--           		<div class="pull-left">
              		<div class="input-group">
		                <div class="input-group-btn">
		                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Semua Posisi
		                    <span class="fa fa-caret-down"></span></button>
		                  	<ul class="dropdown-menu">
		                    <li o><a>Semua Posisi</a></li>
		                    <li><a>Semua Posisi 1</a></li>
		                  	</ul>
		                </div>
	               	 	<input type="text" class="form-control" placeholder="Cari karyawan">
	              </div>
          		</div> --}}

 
            	</div>

	             <div class="box-body table-responsive no-padding">
	              <table class="table table-hover">
	                <tr style="background-color: #bdd1ef">
	                  <th>No</th>
	                  <th>Nama</th>
	                  <th>Email</th>
	                  <th>Telepon</th>
	                  <th>Posisi</th>
	                </tr>
	                @if(count($employee))
	                   <?php
	                   $a = $employee->perPage();
	                   $b = $employee->currentPage();
	                   $i = ($b-1)*$a;
	                   ?>
	                  @foreach($employee as $item)
	                   <?php $i++; ?>
		        
		                <tr style="cursor: pointer;" id="{{ $item->userid}}" onclick="openDetail({{ $item->userid}})" >
		                  <td> <?php echo $i; ?> </td>
		                  <td>{{ $item->fullname}}</td>
		                  <td>{{ $item->user_email}}</td>
		                  <td>{{ $item->phone}}</td>
		                  <td>{{ $item->position}}</td>
		                </tr>
	                  @endforeach
	                  <tfoot>
	                    <tr>
	                      <td colspan="4">
	                        {{ $employee -> links()}}
	                      </td>
	                    </tr>
	                  </tfoot>
	                @endif
	              </table>
	            </div>
            </div>
          </div>
        </div>
	    </section>

	</section>
@endsection

<script src="/js/plugin/jquery.min.js"></script>
<script src="/js/employee_index.js"></script>