
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

//Add Comment
$('a.addComment').click(function(){
     $("#commentLoader").removeClass('hide');
    var postId =  $(this).attr('post-id');
    var commentId =  $(this).attr('comment-id');
    var commentMessage =  $("#commentMessage-"+commentId).val();
    var data = {
        _token: $(this).data('token'),
        postId: postId,
        commentId: commentId,
        commentMessage: commentMessage,
    }
    $.ajax({
      method: "POST",
      url: base_url+"/comment",
      data: data
    }).done(function(data) {
         $("#commentLoader").addClass('hide');
        console.log(data);
        if (data.status == 3) {
            $("#popup-title").text("Ooops!");
            $("#popup-text").text("Please type your comment.");
            popup();
        } else {
          var moment = require('moment');
          var commentDate = moment(data.date.date).fromNow();
          var newComment = '<div class="comment-list flex-box">'
                  +'<a href="'+base_url+'/user/'+data.userslug+'" class="thumb thumb-author is-circle">'
                         +'<img src="'+base_url+'/'+data.avatar+'" class=" is-circle">'
                    +'</a>'
                    +'<div class="comment-container">'
                      +'<div class="comment-head flex-box">'
                        +'<h3 class="s-title"><a href="'+base_url+'/user/'+data.userslug+'">'
                         +data.name
                        +'</a></h3>'
                        +'<span class="date">'
                                +commentDate
                        +'</span>'
                       +'</div>'
                      +'<div class="coment-body">'
                         +data.comment
                      +'</div>'
                      +'<div class="coment-footer flex-box">'    
                         +'<a href="#" id="reply-'+data.comment_id+'" class="reply-comment" post-id="'+data.post_id+'" data-token="'+token+'" comment-id="'+data.comment_id+'"><i class="ion-reply"></i>Reply</a>'
                       +'</div>'
                      +'<div class="replybox hide" id="replybox-'+data.comment_id+'">'
                        +'<div class="comment-form">'
                             +'<textarea placeholder="Tulis Komentar" id="commentMessage-'+data.comment_id+'"></textarea>'
                             +'<a href="#" class="button addComment" post-id="'+data.post_id+'" comment-id="'+data.comment_id+'" data-token="'+token+'">Comment</a>'
                        +'</div>'
                      +'</div>'
                    +'</div>'
                +'</div>';
          if(data.parent_id == null){
           $(newComment).prependTo("#newComment");
          }else{
           $(newComment).prependTo("#replyboxList-"+data.parent_id);
           $("#reply-"+data.comment_id).remove();
           $("#commentMessage-"+data.parent_id).val("");
          }
           $("#commentMessage-"+data.comment_id).val("");
          dislikeComment();
          likeComment();
          reportComment();
        }
    });
    return false;
});
//LIKE COMMENT
function likeComment(){
  $('a.like-comment').click(function(){
      var commentId =  $(this).attr('comment-id');
      var postId =  $(this).attr('post-id');
      var data = {
          _token: $(this).data('token'),
          postId: postId,
          commentId: commentId,
      }
      $.ajax({
        method: "POST",
        url: base_url+"/comment/like-comment",
        data: data
      }).done(function(data) {
          if (data.status == 3) {
            popupLogin();
          }else{
            var span = $("#like-"+data.comment_id+" span.countLikeComment");
            var countLike = $("#like-"+data.comment_id+" span.countLikeComment").text();
            var value = parseInt(countLike, 10) + 1;
            span.text(value);    
          }
          console.log(data.comment_id);
      }).fail(function (jqXHR, textStatus, errorThrown) {
           popupLogin();
        });
      return false;
  });
}
likeComment();
//DISLIKE COMMENT
function dislikeComment(){
  $('a.dislike-comment').click(function(){
      var commentId =  $(this).attr('comment-id');
      var postId =  $(this).attr('post-id');
      var data = {
          _token: $(this).data('token'),
          postId: postId,
          commentId: commentId,
      }
      $.ajax({
        method: "POST",
        url: base_url+"/comment/dislike-comment",
        data: data
      }).done(function(data) {
          if (data.status == 3) {
            popupLogin();
          }else{
            var span = $("#dislike-"+data.comment_id+" span.countDisLikeComment");
            var countLike = $("#dislike-"+data.comment_id+" span.countDisLikeComment").text();
            var value = parseInt(countLike, 10) + 1;
            span.text(value);    
          }
          console.log(data.comment_id);
      }).fail(function (jqXHR, textStatus, errorThrown) {
           popupLogin();
        });
      return false;
  });
}
dislikeComment();
//REPORT COMMENT
function reportComment(){
  $('a.report-comment').click(function(){
      var commentId =  $(this).attr('comment-id');
      var postId =  $(this).attr('post-id');
      var data = {
          _token: $(this).data('token'),
          postId: postId,
          commentId: commentId,
      }
      $.ajax({
        method: "POST",
        url: base_url+"/comment/report-comment",
        data: data
      }).done(function(data) {
          $("#popup-title").text("Terima Kasih");
          $("#popup-text").text("Laporan akan segera kami proses");
          popup();
          console.log(data.comment_id);
      }).fail(function (jqXHR, textStatus, errorThrown) {
           popupLogin();
        });
      return false;
  });
}
reportComment();
//REPLY COMMENT
$('a.reply-comment').click(function(){
  var commentId =  $(this).attr('comment-id');
  $('#replybox-'+commentId).toggleClass('hide');
  return false;
});