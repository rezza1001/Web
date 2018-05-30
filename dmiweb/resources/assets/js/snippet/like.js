
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
//Like 
var likebtn = $('.setLike');
likebtn.click(function(){
     $(this).toggleClass('hasLike'); 
    var post_id = $(this).attr("post-id");
    var data = {
        _token: $(this).attr('token'),
        post_id: post_id,
    }
    $.ajax({
      method: "POST",
      url: base_url+"/like",
      data: data
    }).done(function(data) {
        console.log(data);
        if(data.status == 2){  
            var span = $("#favorite-"+data.id+" span.countLike");
            var countLike = $("#favorite-"+data.id).find('span.countLike').text();
            var value = parseInt(countLike, 10) - 1;
            span.text(value); 
            $("#favorite-"+data.id).attr('data-original-title','Set as favorite');
            $("#favorite-"+data.id+" i").removeClass('ion-android-favorite').addClass('ion-android-favorite-outline');
        }else if(data.status == 3){
            popupLogin();
        }else{
            var span = $("#favorite-"+data.id+" span.countLike");
            var countLike = $("#favorite-"+data.id).find('span.countLike').text();
            var value = parseInt(countLike, 10) + 1;
            span.text(value); 
            $("#favorite-"+data.id).attr('data-original-title','Remove as favorite');
            $("#favorite-"+data.id+" i").removeClass('ion-android-favorite-outline').addClass('ion-android-favorite');
        }
        $('[data-toggle="tooltip"]').tooltip()
    });
    return false;
});