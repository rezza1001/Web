
//preview Image
  function readURL(input) {
     if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function (e) {
             $('#image_upload_preview').attr('src', e.target.result);
             $('#image-data').val(e.target.result);
             $('#image_upload_preview').show();

         }
         reader.readAsDataURL(input.files[0]);
     }
 }
 $("#image").change(function () {
     readURL(this);
 });
 $("#file").change(function () {
     readURL(this);
 });

 //Update Profile

var updateprofile = $("#update-profile");
updateprofile.validate({
  rules: {
    name: {
      required: true,
      minlength: 2
    },
    email: {
      required: true,
      email: true
    },
    confirmpassword: {
      equalTo: "#password"
    }
  },
  messages: {
    name: {
      required: "Please enter your name",
      minlength: "Your name must consist of at least 2 characters"
    },
    email: "Please enter a valid email address",
  },
  submitHandler: function (form,values) {
      return true;
  }
});

// update account


$( "#update-account" ).validate({
  rules: {
    password:  {
      required: true,
    },
    confirmpassword: {
      required: true,
      equalTo: "#password"
    },
    email: {
      required: true,
      email: true
    }
  }
});