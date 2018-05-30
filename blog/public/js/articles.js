$(document).ready(function() {
	console.log("Call");
  

     $.post( "http://blog.dev/api/articles", function( data ) {
  		console.log(data);
	});
     console.log("Data");
})