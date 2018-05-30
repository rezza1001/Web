$( document ).ready(function() {
    loadDay();
});

function loadDay(){
	$.ajax({
        method: "POST",
        url:"/workday",
        data: {_token: CSRF_TOKEN},
   		dataType: 'JSON',
    }).done(function(data) {
    	for (var i=0; i<data.length; i++){
    		$('#wd_'+data[i]['day_of_week']).iCheck('check');
    	}
       
    }).fail(function (jqXHR, textStatus, errorThrown) {
     	console.log(errorThrown);
    });
}

function saveDay(){
	var days = new Array();
	for (var i=1; i<= 7; i++){
		if ($('#wd_'+ i).is(":checked")){
			days.push(i);
		}
	}
	$.ajax({
        method: "POST",
        url:"/update_workday",
        data: {_token: CSRF_TOKEN, day:days},
   		dataType: 'JSON',
    }).done(function(data) {
        alert("Data berhasil disimpan");
    }).fail(function (jqXHR, textStatus, errorThrown) {
     	console.log(errorThrown);
    });
}