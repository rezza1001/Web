
function popup(){
  $.magnificPopup.open({
    items: {
      src: '#popup-message'
    },
    type: 'inline',
  });
}
function popupLogin(){
  $.magnificPopup.open({
    items: {
      src: '#popup-login'
    },
    type: 'inline',
  });
}
//DELETE POST
var jc = $('a.deletePost').confirm({
    icon: 'ion-android-warning',
    title: 'WARNING!',
    content: 'Are you sure want to delete this item? <br> this action cannot be undone!',
    type: 'red',
    buttons: {
        confirm: function () {
            var postId =  jc.attr('post-id');
            var data = {
                _token: token,
                postId: postId,
            }
            $.ajax({
              method: "POST",
              url: base_url+"/delete-post",
              data: data
            }).done(function(data,jc) {
                $("#popup-title").text("WARNING!");
                $("#popup-text").text("Your post has been deleted");
                popup();
                $("#post-"+data.id).hide(700);
                console.log(data.id);
            }).fail(function (jqXHR, textStatus, errorThrown) {
                 popupLogin();
              });
        },
        cancel: function () {
        }
    }
});