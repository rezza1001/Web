//POST EMOTION 
function popupLogin(){
  $.magnificPopup.open({
    items: {
      src: '#popup-login'
    },
    type: 'inline',
  });
}
$('a.btnEmot').click(function(){
    var emotId =  $(this).attr('emot-id');
    var postId =  $(this).attr('post-id');

    var data = {
        _token: $(this).data('token'),
        postId: postId,
        emotId: emotId,
    }
    $.ajax({
      method: "POST",
      url: base_url+"/emotion",
      data: data
    }).done(function(data) {
        var btn = $("#btnEmot-"+data.emotion_id);
        var span = $("#emot-"+data.emotion_id);
        var count = $("#emot-"+data.emotion_id).text();
        if(data.status == 1){
          $('a.btnEmot').removeClass('hasEmot');
          btn.addClass('hasEmot');
          var value = parseInt(count, 10) + 1;
          span.text(value);   
        }else if(data.status == 2){
          $('a.btnEmot').removeClass('hasEmot');
          btn.addClass('hasEmot');
          var value = parseInt(count, 10) + 1;
          span.text(value);   
          // Cookies.set('emotId', emotId);
          // Cookies.get('name'); // => 'value'
          // Cookies.remove('name');
        }else{
          popupLogin();
        }
        console.log(data.emotion_id);
    }).fail(function (jqXHR, textStatus, errorThrown) {
         popupLogin();
      });
    return false;
});