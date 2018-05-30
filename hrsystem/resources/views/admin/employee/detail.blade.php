<meta name="csrf-token" content="{{ csrf_token() }}" />

<div  class="modal-content col-md-12" style="max-height: 460px; overflow: auto">
  <div class="col-md-6" >
    <div class="box box-primary">
        <div class="box-header with-border">
           <h3 class="box-title">Informasi Pribadi</h3>
          <div class="box-tools pull-right">
           <!--  <button type="button"  class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input class="form-control"  id="fullname" placeholder="Nama" type="text">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input class="form-control"  id="pob" placeholder="Tempat Lahir" type="text">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                  <input class="form-control" id="dob" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" type="text">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select id="gender" class="form-control select2" style="width: 100%;">
                  <option value="1" selected="selected">Laki - Laki</option>
                  <option value="2" >Perempuan</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Alamat</label>
               <textarea id="address" class="form-control" rows="2" placeholder="Alamat Lengkap"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nomor Telepon</label>
                <input class="form-control" id="phone" onkeypress="return isNumberKey(event)" maxlength="13" placeholder="Nomor Telepon" type="text">
              </div>
            </div>
          </div>

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nomor Telepon Alternative</label>
                <input class="form-control" id="alt_phone" onkeypress="return isNumberKey(event)" maxlength="13" placeholder="Nomor Telepon" type="text">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Nomor KTP</label>
                <input class="form-control" id="id_card" onkeypress="return isNumberKey(event)" maxlength="20" placeholder="Nomor KTP" type="text">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>NPWP</label>
                <input class="form-control" id="npwp" onkeypress="return isNumberKey(event)" maxlength="20" placeholder="NPWP" type="text">
              </div>
            </div>
          </div>

           <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Posisi</label>
                <select  id="position" class="form-control select2" style="width: 100%;">
                </select>
              </div>
            </div>
          </div>

        </div>
    </div>
  </div>

   <div class="col-md-6" >
    <div class="box box-danger">
        <div class="box-header with-border">
           <h3 class="box-title">Informasi Akun</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">

              <div class="form-group">
                <label>Email</label>
                <input class="form-control"  id="email" placeholder="Enter email" type="email">
              </div>
            </div>
          </div>

        </div>
    </div>
   </div>


   <div class="col-md-6" >
    <div class="box box-success">
        <div class="box-header with-border">
           <h3 class="box-title">Informasi Pendidikan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div id="body_list">
              <ul class="todo-list" id="ul_school">  </ul>
            </div>

            <div id="new_form">
              <div class="box education-form collapsed-box">
        
                <div class="box-header with-border">
                  <span  class="text">Tambah Info Pendidikan</span>
                  <div class="box-tools pull-right">
                     <button type="button" onclick="addnew()"  class="btn btn-success"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
            
              </div>
            </div>
        </div>
    </div>
   </div>

</div>

<div class="col-md-12 modal-footer-full" align="right">
      <button onclick="sendRegister()" type="button" class="btn btn-success pull-right">Simpan Perubahan</button>
      <button type="button" style="width: 140px; margin-right: 10px" class="btn btn-danger" pull-right" data-dismiss="modal">Batal</button>
</div>


    