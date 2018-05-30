<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="box-body" >

    <div class="form-group" >
      <label>Pendidikan</label>
      <select id="degree" class="form-control select2" style="width: 100%;" onchange="changeDegree(this.value)">
        <option selected="selected" value="sd">Sekolah Dasar</option>
        <option selected="selected" value="smp">Sekolah Menengah Pertama</option>
        <option selected="selected" value="sma">Sekolah Menengah Atas</option>
        <option selected="selected" value="pt">Perguruan Tinggi</option>
      </select>
    </div>

    <div id="group_level_degree" class="form-group" >
      <label>Jenjang</label>
      <select id="level_degree" class="form-control select2" style="width: 100%;">
        <option selected="selected" value="d3">Diploma 3 (D3)</option>
        <option selected="selected" value="d4">Diploma 4 (D4)</option>
        <option selected="selected" value="s1">Strata 1 (S1)</option>
        <option selected="selected" value="s2">Strata 2 (S2)</option>
        <option selected="selected" value="s3">Strata 3 (S3)</option>
      </select>
    </div>

    <div class="form-group">
        <label>Nama Sekolah</label>
        <input  class="form-control clear-form" required  id="school_name" placeholder="e.g. Universitas XYZ" type="text">
    </div>

    <div class="form-group">
        <label>Jurusan</label>
        <input class="form-control clear-form"  id="majors" placeholder="e.g. Sistem Informasi" type="text">
    </div>

    <div class="form-group">
        <label>Tahun Mulai</label>
        <input class="form-control clear-form"  id="started_year" maxlength="4" onkeypress="return isNumberKey(event)"  placeholder="e.g. 2011" type="text">
    </div>
    <div class="form-group">
        <label>Tahun Selesai</label>
        <input class="form-control clear-form"  id="ended_year" onkeypress="return isNumberKey(event)" maxlength="4" placeholder="e.g. 2013" type="text">
    </div>

    <div >
        <button type="button" class="btn btn-block btn-success" onclick="addNewSchool()" >Simpan</button>
    </div>

</div>