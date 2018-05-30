
function popup(){
  $.magnificPopup.open({
    items: {
      src: '#popup-message'
    },
    type: 'inline',
  });
}
// CONTACT FORM
var form = $("#contactform");
form.validate({
  rules: {
    name: {
      required: true,
      minlength: 2
    },
    email: {
      required: true,
      email: true
    },
    phone: {
      required: true,
      number: true
    },
    subject: {
      required: true,
    },
    message: {
      required: true,
    },
  },
  messages: {
    name: {
      required: "Please enter your name",
      minlength: "Your name must consist of at least 2 characters"
    },
    email: "Please enter a valid email address",
    phone: {
      required: "Please enter your phone number",
    },
    subject: {
      required: "Please enter your subject",
    },
    message: {
      required: "Please enter your message",
    },
  },
  submitHandler: function (form,values) {
      var values = $(form).serializeArray();
      $('#loaderContact').removeClass("hide");
      var data = values;
      $.ajax({
        method: "POST",
        url: base_url+"/send",
        timeout: 30000, //Set your timeout value in milliseconds or 0 for unlimited
        data : $.param(data)
      }).done(function(data) {
        $('#contactform')[0].reset();
        $('#loaderContact').addClass("hide");
        console.log(data);
        $("#popup-title").text("Thank You");
        $("#popup-text").text("We will contact you as soon as possible");
        popup()
      }).fail(function (jqXHR, textStatus, errorThrown) {
            $('#loader').hide();
            $("#popup-title").text("Ooops!");
            $("#popup-text").text("Please try again.");
            popup()
        });
      return false;
  }
});
