<div class="box box-primary">
  <div class="box-header">
    <i class="fa fa-fw fa-group"></i>
    <h3 class="box-title">Organisasi</h3>
  </div>
  <div class="box-body">
    <ul class="todo-list organization" id="organization">
    </ul>
  </div>
  <div class="box-footer clearfix no-border">
    <button type="button" class="btn btn-default pull-right" onclick="addNew()"><i class="fa fa-plus"></i> Tambah </button>
  </div>
</div>


<div class="modal fade"" id="modal_org" tabindex="-1" data-focus-on="input:first">
    <div class="modal-dialog">
      <div class="modal-content modal-content-full">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Organisasi Baru</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Atasan</label>
                <select id="parent" class="form-control select2" style="width: 100%;">
                </select>
            </div>
            <div class="form-group">
                <label>Nama Organisasi</label>
                <input class="form-control"  id="name" placeholder="Nama" type="text">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
               <textarea id="description" class="form-control" rows="2" placeholder="Deskripsi posisi"></textarea>
            </div>
            <div class="row" >
              <div class="col-lg-12">
                  <button type="button"  onclick="save()"  class="btn btn-success pull-right"><i class="fa fa-plus"></i> Simpan</button>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>