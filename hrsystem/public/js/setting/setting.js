var CSRF_TOKEN;
 var token = "{{csrf_token()}}";
 var pID = -1;
$(document).ready(function() {
	CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	requestOrganizations();
  initCheckBox();

});


function requestOrganizations(){
	
	$('#organization').html("");
	$.ajax({
        method: "POST",
        url:"/organization",
        data: {_token: CSRF_TOKEN},
   		dataType: 'JSON',
    }).done(function(data) {
  	 	 var arr = data['data'];
         for (var i=0; i<arr.length; i++){
         	var html = "";
         	html += '<li>';
         	html += ' <span class="handle"><i class="fa fa-ellipsis-v"></i> <i class="fa fa-ellipsis-v"></i> </span>';
         	html += ' <span class="text">'+arr[i]['name']+'</span>';
		  	html += '<div class="tools"><i class="fa fa-edit" onclick="onEdit('+arr[i]['id']+','+arr[i]['parent']+',\''+arr[i]['name']+'\')"></i> <i class="fa fa-trash-o" onclick="deleteOrg('+arr[i]['id']+')"></i> </div>';
		  	html += '</li>';
		  	$('#organization').append(html);
         }
    }).fail(function (jqXHR, textStatus, errorThrown) {
     	console.log(errorThrown);
    });
}

function addNew(){
  pID = -1;
	$('#modal_org').modal('show');
	loadOrg(1);
	$("#name").val("");
}

function onEdit(id,parent, name){
	pID = id;
	$('#modal_org').modal('show');
	loadOrg(parent);
	$("#name").val(name);
}

function loadOrg(id){
	$('#parent').html("<option value='1' selected='selected'>Pemilik</option>");
	$.ajax({
        method: "POST",
        url:"/organization",
        data: {_token: CSRF_TOKEN},
   		dataType: 'JSON',
    }).done(function(data) {
  	 	 var arr = data['data'];
         for (var i=0; i<arr.length; i++){
         	var html = "<option value='"+arr[i]['id']+"' selected='selected'>"+arr[i]['name']+"</option>";
		  	$('#parent').append(html);
         }
         $("#parent").val(id);
    }).fail(function (jqXHR, textStatus, errorThrown) {
     	console.log(errorThrown);
    });
}

function save(){
	var pName  = $('#name').val();
	var pDesc  = $('#description').val();
	var pParent = $('#parent option:selected').val();
	if (pName == ""){
		alert("Nama organisasi harus di isi!");
		return;
	}

	$.ajax({
        method: "POST",
        url:"/add_organization",
        data: {_token: CSRF_TOKEN,
        		id:pID,
        		name:pName,
        		description: pDesc,
        		parent:pParent},
   		dataType: 'JSON',
    }).done(function(data) {
  	 	 console.log(data);
  	 	 alert("Berhasil disimpan");
  	 	 $('#modal_org').modal('hide');
  	 	 refreshTable();
    }).fail(function (jqXHR, textStatus, errorThrown) {
     	console.log(errorThrown);
    });
}

function deleteOrg(mId){
	$.ajax({
        method: "POST",
        url:"/delete_organization/",
        data: {_token: CSRF_TOKEN,
        		id:mId},
   		dataType: 'JSON',
    }).done(function(data) {
    	if (data['error_code'] == 200){
	 		alert("Berhasil di hapus");
  	 	 	$('#modal_org').modal('hide');
  	 	 	refreshTable();
    	}
    	else {
    		alert(data['error_desc']);
    	}
  	 
    }).fail(function (jqXHR, textStatus, errorThrown) {
     	console.log(errorThrown);
    });
}

function refreshTable() {
  $('div.organization').fadeOut();
  location.reload();
  $('div.organization').fadeIn();
}

function initCheckBox(){
     //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
}