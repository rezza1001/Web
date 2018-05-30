$( document ).ready(function() {
	$('.timepicker').timepicker({
	  showMeridian : false,
      showInputs: false,
      minuteStep:5
    });

    loadTime();
});

function saveTime(){
	var start = $("#start_time").val();
	var end = $("#end_time").val();
	$.ajax({
        method: "POST",
        url:"/update_worktime",
        data: {_token: CSRF_TOKEN,
        		work_start:start, work_end:end},
   		dataType: 'JSON',
    }).done(function(data) {
        alert("Data berhasil disimpan");
    }).fail(function (jqXHR, textStatus, errorThrown) {
     	console.log(errorThrown);
    });
}

function loadTime(){
	$.ajax({
        method: "POST",
        url:"/worktime",
        data: {_token: CSRF_TOKEN},
   		dataType: 'JSON',
    }).done(function(data) {
        console.log(data);
        $("#start_time").val(data['work_start'].substring(0,5))
        $("#end_time").val(data['work_end'].substring(0,5))
    }).fail(function (jqXHR, textStatus, errorThrown) {
     	console.log(errorThrown);
    });
}