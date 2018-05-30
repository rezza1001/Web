<div class="box box-primary">
  <div class="box-header">
    <i class="fa fa-fw fa-clock-o"></i>
    <h3 class="box-title">Jam Kerja</h3>
  </div>
  <div class="box-body">

    <div class="form-group">
        <div class="bootstrap-timepicker">
          <div class="form-group">
            <label>Jam  Masuk</label>
            <div class="input-group">
                <input id="start_time" type="text" class="form-control timepicker">
                <div class="input-group-addon"> <i class="fa fa-clock-o"></i></div>
            </div>
          </div>
        </div>
    </div>
    <div class="form-group">
        <div class="bootstrap-timepicker">
          <div class="form-group">
            <label>Jam  Pulang</label>
            <div class="input-group">
                <input id="end_time" type="text" class="form-control timepicker">
                <div class="input-group-addon"> <i class="fa fa-clock-o"></i></div>
            </div>
          </div>
        </div>
    </div>
    <div class="form-group">
        <button type="button" onclick="saveTime()" class="btn btn-success pull-right"><i class="fa fa-fw fa-save"></i> Simpan</button>
    </div>
  </div>
</div>
<script src="/js/setting/time.js"></script>


