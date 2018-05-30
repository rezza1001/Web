
var CSRF_TOKEN;
var ObjSChool = new Object();
var mID = -1;
var OBJ_SCHOOL = new Object();
var mEditSchool = -1;

$( document ).ready(function() {
	 CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    $('[data-mask]').inputmask();

    OBJ_SCHOOL['sd'] = "Sekolah Dasar";
    OBJ_SCHOOL['smp'] = "Sekolah Menengah Pertama";
    OBJ_SCHOOL['sma'] = "Sekolah Menengah Atas";
    OBJ_SCHOOL['pt'] = "Perguruan Tinggi";

      requestOrganizations();
});

function openDetail(id){
  ObjSChool = new Object();
  mID = id;
	$('#modal_detail').modal('show');
  $('#ul_school').html("");
  $('.form-control').val('');


  if (id == -1){
    return;
  }
  
   $.ajax({
      method: "POST",
      url:"/detail_employee",
      data: {_token: CSRF_TOKEN, user: mID},
    dataType: 'JSON',
    }).done(function(data) {
      data = data['data'];
         var dob = data['dob'];
         $('#fullname').val(data['name']);
         $('#pob').val(data['pob']);
         $('#dob').val(dob.split("-")[2] +"/" + dob.split("-")[1]+"/" + dob.split("-")[0]);
         $('#gender').val(data['gender']);
         $('#address').val(data['address']);
         $('#phone').val(data['phone']);
         $('#alt_phone').val(data['alt_phone']);
         $('#npwp').val(data['npwp']);
         $('#position').val(data['organization']);
         $('#email').val(data['user_email']);
         $('#id_card').val(data['no_id']);

         var schools =  data['school'];
         for (var i=0; i<schools.length; i++){
              createComponentSchool(schools[i]['degree'],  OBJ_SCHOOL[schools[i]['degree'].split("_")[0]], schools[i]['school_name'], 
                schools[i]['major'] == null ? '':schools[i]['major'] , schools[i]['start_year'], schools[i]['end_year']);
    
         }
     
    }).fail(function (jqXHR, textStatus, errorThrown) {
       console.log(errorThrown);
     });

}


function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : evt.keyCode;
	if (charCode != 46 && charCode > 31 
	&& (charCode < 48 || charCode > 57))
	return false;
	return true;
}  

function addNewSchool(){
	var school_name 	= $("#school_name").val();
	var majors 			  = $("#majors").val();
	var started_year 	= $("#started_year").val();
	var ended_year 		= $("#ended_year").val();
	var degree_elm  	= $("#degree option:selected").text();
  var degree_val    = $("#degree option:selected").val();

  if (school_name == null || school_name == ""){
    alert("Nama Sekolah harus disi");
    return;
  } 
  else if ( started_year == "" || ended_year == ""){
    alert("Tahun angkatan disi");
    return;
  }

  if (ObjSChool[degree_val] != undefined && degree_val != 'pt' && mEditSchool == -1){
      alert("Kategori Sudah ditambahkan");
      return;
  }
  $('#modal_add').modal('hide');
  if (mEditSchool == -1){
      createComponentSchool(degree_val,  degree_elm, school_name, majors, started_year, ended_year);
  }
  else {
     updateComponentSchool(degree_val,  degree_elm, school_name, majors, started_year, ended_year);
  }
	
	$('.clear-form').val('');
	
}

function createComponentSchool(degree_val,  degree_elm, school_name, majors, started_year, ended_year){
    var school = new Object();
    school['name'] = school_name;
    school['majors'] = majors;
    school['started_year'] = started_year;
    school['ended_year'] = ended_year;
    school['degree_desc'] = degree_elm;
    

    var val_id ;
      
      if (degree_val == 'pt'){
        school['degree'] = degree_val+"_"+$("#level_degree option:selected").val() ;
          ObjSChool[degree_val+"_"+$("#level_degree option:selected").val() ] = school;
          val_id = degree_val+"_"+$("#level_degree option:selected").val() ;
      }
      else {
        school['degree'] = degree_val;
        ObjSChool[degree_val] = school;
        val_id = degree_val;
      }
  
      var htmlSechools = '<li id="'+val_id+'">';
      htmlSechools  += '<table style="width: 100%">';
      htmlSechools    += '<tr>';
      htmlSechools      += '<td style="width: 5%"> <span class="handle"> <i class="fa fa-fw fa-mortar-board"></i>  </span></td>';
      htmlSechools      += '<td> <span id="degree_'+val_id+'" class="text span-degree">'+degree_elm+'</span> <br/>';
      htmlSechools        += ' <span id="name_'+val_id+'" class="text">'+school_name+'</span><br/>';
      htmlSechools        += ' <span id="major_'+val_id+'"  class="span-school">'+majors+'</span> </td>';
      htmlSechools      += '<td style="width: 20%" id="year_'+val_id+'" > <small class="label label-danger"><i class="fa fa-fw fa-group"></i> '+started_year+' - '+ended_year+' </small></td>';
      htmlSechools      += '<td style="width: 15%">';
      htmlSechools        += '  <div class="tools">';
      htmlSechools          += '  <i class="fa fa-edit" onclick="viewSchool(\''+val_id+'\')"></i>  <i class="fa fa-trash-o" onclick="removeSchool(\''+val_id+'\')"></i>  </div>' ;
      htmlSechools      += '</td>' ;
      htmlSechools    += '</tr>' ;
      htmlSechools  += '</table>' ;
      htmlSechools  += '</li>' ;

    $('#ul_school').append(htmlSechools);
}

function updateComponentSchool(degree_val,  degree_elm, school_name, majors, started_year, ended_year){
    var school = new Object();
    school['name'] = school_name;
    school['majors'] = majors;
    school['started_year'] = started_year;
    school['ended_year'] = ended_year;
    school['degree_desc'] = degree_elm;
    school['degree'] = degree_val+"_"+$("#level_degree option:selected").val() ;


    var val_id ;
     if (degree_val == 'pt'){
          school['degree'] = degree_val+"_"+$("#level_degree option:selected").val() ;
          val_id = degree_val+"_"+$("#level_degree option:selected").val() ;
      }
      else {
          school['degree'] = degree_val;
          val_id = degree_val;
      }
  
    $('#name_'+val_id).html(school_name);
    $('#major_'+val_id).html(majors);
    $('#year_'+val_id).html('<small class="label label-danger"><i class="fa fa-fw fa-group"></i> '+started_year+' - '+ended_year+' </small>');

    ObjSChool[school['degree']] = school;

}

function requestOrganizations(){
	var html = "<option value='-99' selected='selected'>Pilih Posisi</option>";
  $('#position').append(html);
	$('#position_e').append(html);
	$.ajax({
        method: "POST",
        url:"/organization",
        data: {_token: CSRF_TOKEN},
   		dataType: 'JSON',
      }).done(function(data) {
      	 $('#position').html('');
          var arr = data['data'];
          for (var i=0; i<arr.length; i++){
		  	     html += "<option value='"+arr[i]['id']+"' selected='selected'>"+arr[i]['name']+"</option>";
          }
          $('#position').append(html);
          $('#position_e').append(html);
          $('#position').val('-99');
      }).fail(function (jqXHR, textStatus, errorThrown) {
         console.log(errorThrown);
       });
}

function sendRegister(){

   if ($('#fullname').val() == "" ){
      alert("Nama lengkap harus di isi");
    return;
   }
   else  if ($('#pob').val() == "" ){
      alert("Tempat lahir harus di isi");
    return;
   }
   else  if ($('#dob').val() == "" ){
      alert("Tanggal lahir harus di isi");
    return;
   }
   else  if ($('#address').val() == "" ){
      alert("Alamat harus di isi");
    return;
   }
    else  if ($('#phone').val() == "" ){
      alert("Nomor Telepon harus di isi");
    return;
   }
    else  if ($('#position option:selected').val() == "-99" ){
      alert("Pilih posisi");
    return;
   }
   else  if ($('#email').val() == "" ){
      alert("Email harus di isi");
    return;
   }

  var schools = [];
  for (var key in ObjSChool) {
      if (ObjSChool.hasOwnProperty(key)) {
          schools.push(ObjSChool[key])
      }
  }

  var murl = "/register";
  if (mID != -1){
      murl = "/edit_employee";
  }

   $.ajax({
          method: "POST",
          url: murl,
          data: {
          	_token: CSRF_TOKEN, 
          	name : $('#fullname').val(),
          	pob : $('#pob').val(),
          	dob : $('#dob').val(),
          	gender : $("#gender option:selected").val(),
          	address : $("#address").val(),
          	phone1 : $("#phone").val(),
          	id_card : $("#id_card").val(),
            npwp : $("#npwp").val(),
          	ktp : $("#id_card").val(),
          	position :$("#position option:selected").val(),
          	email :$("#email").val(),
            school: schools,
            employee_id : mID,
          },
     		dataType: 'JSON',
        }).done(function(data) {
             alert("Success!");
             $('.form-control').val('');
             $('#modal_detail').modal('hide');
             refreshTable();
        }).fail(function (data) {
        	alert("Failed!");
           console.log(data);
         });
}

function refreshTable() {
  $('div.table-responsive').fadeOut();
  location.reload();
  $('div.table-responsive').fadeIn();
}

function removeSchool(id){
  $( "#"+id ).remove();
  var mID = id;
  delete ObjSChool[mID];
   console.log(ObjSChool);
}

function addnew(id){
   mEditSchool = -1;
  $('.clear-form').val('');
  $('#modal_add').modal('show');
  $("#degree").attr("disabled", false); 
  $("#level_degree").attr("disabled", false); 
}

function viewSchool(id){

  mEditSchool = id;
  $('#modal_add').modal('show');
  var obj = ObjSChool[id];

  $("#degree").attr("disabled", true); 
  $("#level_degree").attr("disabled", true); 
  $("#school_name").val(obj['name']);
  $("#majors").val(obj['majors']);
  $("#started_year").val(obj['started_year']);
  $("#ended_year").val(obj['ended_year']);
  $("#degree").val(obj['degree'].split("_")[0]);

  changeDegree(obj['degree'].split("_")[0]);
  if (obj['degree'].split("_")[0] == "pt"){
    $("#level_degree").val(obj['degree'].split("_")[1]);
  }
}

function changeDegree(value){
    if (value == 'pt'){
       $('#group_level_degree').show();
    }
    else {
       $('#group_level_degree').hide();
    }
}

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};