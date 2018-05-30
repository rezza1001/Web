var CSRF_TOKEN;
var headerid = -99;
var detailid = -99;
var employeid = -99;
var absent = new Object();
$(document).ready(function() {
	 CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	 var date = new Date();
	 $('#date_today').html(formatDate(date));

	$('.timepicker').timepicker({
	  showMeridian : false,
      showInputs: false,
      minuteStep:5
    });

	 getAbsentToday();
	 getEmployees();

	 $('#start_time').attr('disabled','disabled');
	 $('#note').attr('disabled','disabled');

});


function formatDate(date) {
  var monthNames = [
    "January", "February", "March",
    "April", "May", "June", "July",
    "August", "September", "October",
    "November", "December"
  ];

  var day = date.getDate();
  var monthIndex = date.getMonth();
  var year = date.getFullYear();

  return day + ' ' + monthNames[monthIndex] + ' ' + year;
}

function getAbsentToday(){
	$.ajax({
        method: "POST",
        url:"/absent_today",
        data: {_token: CSRF_TOKEN},
   		dataType: 'JSON',
      }).done(function(data) {
      	 var data = data['data'][0];
      	 headerid = data['id'];
      	 $("#checkin").html(data['work_start']);
      	 $("#checkout").html(data['work_end']);
      	 $("#status").html(data['status']);
      }).fail(function (jqXHR, textStatus, errorThrown) {
         console.log(errorThrown);
       });	
}

function getEmployees(){
  absent = new Object();
	$("#absent_body").html('');
	$.ajax({
        method: "POST",
        url:"/absent_employees",
        data: {_token: CSRF_TOKEN},
   		dataType: 'JSON',
      }).done(function(data) {
      	for (var i=0; i<data['data'].length; i++){
  			var report = data['data'][i];
  			var note_in = "-";
  			var note_out = "-";
  			if (report['note'] != null){
  				note_in = report['note'].split("|")[0] == undefined ? "-" : report['note'].split("|")[0];
  				note_out = report['note'].split("|")[1] == undefined ? "-" : report['note'].split("|")[1];

  			}
      absent[report['employeeid']] = report;
      var htmlstatus = "<span class='label label-warning'>Belum Absent</span>";
      if (report['status'] == 1){
          htmlstatus = "<span class='label label-success'>Tepat Waktu</span>";
      }
      else if (report['status'] == 6){
          htmlstatus = "<span class='label label-danger'>Terlambat</span>";
      }
			var html = "<tr style='cursor: pointer;' onclick='openDetail("+report['id']+","+report['employeeid']+")'>"
  					  +" <td>"+ (i+1) +"</td>  "
  					  +" <td>"+report['name']+"</td> "
  					  +" <td>"+report['chekin']+"</td> "
  					  +" <td>"+note_in+"</td> "
  					  +" <td>"+report['chekout']+" </td> "
              +" <td>"+note_out+" </td> "
  					  +" <td>"+htmlstatus+"</td> "
  					  +"</tr>"
  			$("#absent_body").append(html);

         
  		}
      	 
      }).fail(function (jqXHR, textStatus, errorThrown) {
         console.log(errorThrown);
       });	
}

function openDetail(id, employee){

	employeid = employee;
	detailid = id;
	$('#modal_detail').modal('show');
}

function saveData(){
	var absent_type = $('#type_absent').val();
	if (absent_type == -99){
		alert("Pilih tipe absensi");
		return;
	}
	$.ajax({
        method: "POST",
        url:"/manual_absent",
        data: {_token: CSRF_TOKEN,
        		absent_header: headerid, 
        		employee_id: employeid,
        		detail_id: detailid,
        		note: $("#note").val(),
        		timein:$("#start_time").val(),
        		type:absent_type
        	},
   		dataType: 'JSON',
    }).done(function(data) {
    	if (data['error_code'] == 200){
        alert("Transaksi Sukses");
        $('#modal_detail').modal('hide');
        location.reload();
      }
      else {
         alert(data['error_desc']);
      }
	  
    }).fail(function (jqXHR, textStatus, errorThrown) {
         console.log(errorThrown);
    });	
}

function selectAbsent(value){

	if (value == -99){
		 $('#start_time').attr('disabled','disabled');
		 $('#note').attr('disabled','disabled');
		 return;
	}

	if (value == 1){
    try {
      note_in = absent[employeid]['note'].split("|")[0] == undefined ? "" : absent[employeid]['note'].split("|")[0];
      $("#note").val(note_in);
      $("#start_time").val(absent[employeid]['chekin']);
    } catch(e) {
      // statements
      console.log(e);
    }


		$("#lbl_time").html("Jam Masuk");
		$("#lbl_note").html("Catatan Masuk");
	}
	else {
    try {
      note_in = absent[employeid]['note'].split("|")[1] == undefined ? "" : absent[employeid]['note'].split("|")[1];
      $("#note").val(note_in);
      $("#start_time").val(absent[employeid]['chekout']);
    } catch(e) {
      // statements
      console.log(e);
    }


		$("#lbl_time").html("Jam Pulang");
		$("#lbl_note").html("Catatan Pulang");
	}
	$('#start_time').removeAttr('disabled');
	$('#note').removeAttr('disabled');
}