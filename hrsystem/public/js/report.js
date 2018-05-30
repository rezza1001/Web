var CSRF_TOKEN;
$(document).ready(function() {
	 CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	  $('#reservation').daterangepicker();
	  requestStatus();
	  reQuestEmployees();

});

function openParemeter(){
	$('#modal_parameter').modal("show");
}

function findData(){
	var range_date = $('#reservation').val();
	var date_start = new Date(range_date.split(" - ")[0]);
	var date_end  = new Date(range_date.split(" - ")[1]);
	$("#start_date").html(formatDate(date_start));
	$("#end_date").html(formatDate(date_end));
	$('#employee_text').html( $("#employee option:selected").text());
	$('#status_text').html( $("#status option:selected").text());
	$('#modal_parameter').modal("hide");

	var start_date = new Date(range_date.split(" - ")[0]);
	var end_date   = new Date(range_date.split(" - ")[1]);
	$.ajax({
        method: "POST",
        url:"/request_report",
        data: {_token: CSRF_TOKEN, level : "1",
        		start_date:(start_date.getFullYear() +"-"+(start_date.getMonth()+1)+"-"+ start_date.getDate()),
        		end_date:(end_date.getFullYear() +"-"+(end_date.getMonth()+1)+"-"+ end_date.getDate()),
        	},
   		dataType: 'JSON',
      }).done(function(data) {
      	$("#level1_body").html("");
  		for (var i=0; i<data['data'].length; i++){
  			var report = data['data'][i];
  			if (report['status'] == '1'){
				var html = "<tr style='cursor: pointer;' onclick='openDetail("+report['id']+", \""+report['work_date']+"\")'>"
	  					  +" <td>"+ (i+1) +"</td>  "
	  					  +" <td>"+report['work_date']+"</td> "
	  					  +" <td>"+report['Employees']+" Orang</td> "
	  					  +" <td><span class='label label-success'>"+report['persent']+" %</span> </td>"
	  					  +"</tr>"
	  			$("#level1_body").append(html);
  			}
  			else {
  				var html = "<tr style='background-color: #b3afaf; color:white'> "
  							+" <td>"+ (i+1) +"</td>  " 
  							+" <td>"+report['work_date']+"</td> "
  							+" <td colspan='2'> Libur </td> </tr> ";
  				$("#level1_body").append(html);
  			}
  			
  		}
      }).fail(function (jqXHR, textStatus, errorThrown) {
         console.log(errorThrown);
       });
}


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


function requestStatus(){
	var html = "<option value='-99' selected='selected'>Semua Status</option>";
  	$('#status').append(html);
	$.ajax({
        method: "POST",
        url:"/status_list",
        data: {_token: CSRF_TOKEN},
   		dataType: 'JSON',
      }).done(function(data) {
      	 $('#status').html('');
          var arr = data['data'];
          for (var i=0; i<arr.length; i++){
		  	     html += "<option value='"+arr[i]['id']+"' selected='selected'>"+arr[i]['name']+"</option>";
          }
          $('#status').append(html);
          $('#status').val('-99');
      }).fail(function (jqXHR, textStatus, errorThrown) {
         console.log(errorThrown);
       });
}

function reQuestEmployees(){
	var html = "<option value='-99' selected='selected'>Semua Pegawai</option>";
  	$('#employee').append(html);
	$.ajax({
        method: "POST",
        url:"/employee_list",
        data: {_token: CSRF_TOKEN},
   		dataType: 'JSON',
      }).done(function(data) {
      	 $('#employee').html('');
          var arr = data['data'];
          for (var i=0; i<arr.length; i++){
		  	     html += "<option value='"+arr[i]['id']+"' selected='selected'>"+arr[i]['name']+"</option>";
          }
          $('#employee').append(html);
          $('#employee').val('-99');
      }).fail(function (jqXHR, textStatus, errorThrown) {
         console.log(errorThrown);
       });
}

function openDetail(id, date){
	$("#level_1").hide();
	$(".level_2").show();
	$("#level2_body").html("");
	$("#text_tgl").html(date);
	$.ajax({
       method: "POST",
       url:"/request_report",
       data: {_token: CSRF_TOKEN, level : "2",
       		header:id,
       	},
   	 dataType: 'JSON',
     }).done(function(data) {
      if (data['data'].length == 0){
			var html = "<tr style='cursor: pointer;'> <td colspan='7' >Tidak ada data</td> <tr> ";
			$("#level2_body").append(html);
      	return;
      }
  		for (var i=0; i<data['data'].length; i++){
  			var report = data['data'][i];
  			var html = "<tr style='cursor: pointer;'>"
	  					  +" <td>"+ (i+1) +"</td>  "
	  					  +" <td>"+report['name']+"</td> "
	  					  +" <td>"+report['organization']+"</td> "
	  					  +" <td>"+report['status_desc']+"</td> "
	  					  +" "+getTime(report['check_in'])+""
	  					  +" "+getTime(report['check_out'])+""
	  					  +" <td>"+report['note']+"</td> "
	  					  +"</tr>"
	  		$("#level2_body").append(html);
  			
  		}
    }).fail(function (jqXHR, textStatus, errorThrown) {
         console.log(errorThrown);
    });
}

function getTime(time){
	if (time == null){
		return " <td><span class='label label-danger'> - </span> </td>";
	}
	else {
		return "<td><span class='label label-success'>"+time.split(" ")[1]+" </span> </td>" ;
	}
}

function backToLevel1(){
	$("#level_1").show();
	$(".level_2").hide();
}