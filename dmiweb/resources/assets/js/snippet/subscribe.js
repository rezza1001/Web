
function popup(){
  $.magnificPopup.open({
    items: {
      src: '#popup-message'
    },
    type: 'inline',
  });
}

// SUBSCRIBE FORM
var subscribe = $("#subscribeform");
subscribe.validate({
  rules: {
    email: {
      required: true,
      email: true
    },
  },
  messages: {
    email: "Please enter a valid email address",
  },
  submitHandler: function (subscribe,values) {
      var values = $(subscribe).serializeArray();
      $('#loadersubscribe').removeClass('hide');
      var data = values;
      $.ajax({
        method: "POST",
        url: base_url+"/subscribe",
        timeout: 30000, //Set your timeout value in milliseconds or 0 for unlimited
        data : $.param(data)
      }).done(function(data) {
        $('#loadersubscribe').addClass('hide');
        console.log(data);
        if(data.status == 1){
          $("#popup-title").text("Ooops!");
          $("#popup-text").text("Your email already subscribed.");
        }else{
          $("#popup-title").text("Thanks you for Subscribing!");
          $("#popup-text").text("You will receive updates from us.");
        }
        popup();
      }).fail(function (jqXHR, textStatus, errorThrown) {
            $('#loader').hide();
            $("#popup-title").text("Ooops!");
            $("#popup-text").text("Please try again.");
            popup();
        });
      return false;
  }
});
//UNSUBSCRIBED
var unsubscribe = $('.btnUsubscribe');
unsubscribe.click(function(){
    var message = $("#reason").val();
    var data = {
        _token: $(this).attr('token'),
        message: message,
    }
    $.ajax({
      method: "POST",
      url: base_url+"/unsubscribe",
      data: data
    }).done(function(data) {
        console.log(data);
        location.reload();
    });
    return false;
});

//SUBSCRIBED BUTTON 
var btnSubscribe = $('#btnSubscribe');
btnSubscribe.click(function(){
    $('#loadersubscribe').removeClass('hide');
    var data = {
        email_user: $(this).attr('email-user'),
        _token: $(this).attr('token'),
    }
    $.ajax({
      method: "POST",
      url: base_url+"/subscribed",
      data: data
    }).done(function(data) {
        $('#loadersubscribed').addClass('hide');
        if(data.status == 1){
          $("#popup-title").text("Ooops!");
          $("#popup-text").text("You email already subscribed.");
        }
        $('.btnSubscribe').removeAttr('id').addClass('showPopup').attr('href','#popup-unsubscribe').text('NEWSLETTER SUBSCRIBED');
        console.log(data);
        popup();
      }).fail(function (jqXHR, textStatus, errorThrown) {
            $('#loader').hide();
            $("#popup-title").text("Ooops!");
            $("#popup-text").text("Please try again.");
            popup();
      });
    return false;
});