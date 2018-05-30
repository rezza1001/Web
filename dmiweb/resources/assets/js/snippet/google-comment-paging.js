
//Comment Paging 
$('a.NextComment').click(function(){
    $("#loadingbox").removeClass('hide');
    $(this).hide();
    var videoId =  $(this).attr('data-video');
    var pageToken =  $(this).attr('data-pageToken');
    var data = {
        _token: $(this).data('token'),
        videoId: videoId,
        pageToken: pageToken,
    }
    $.ajax({
      method: "POST",
      url: base_url+"/nexPage",
      data: data
    }).done(function(data) {
          $("#loadingbox").addClass('hide');
          $('a.NextComment').show();
          var moment = require('moment');
          $("a.NextComment").attr('data-pageToken',data.nextPageToken);
          var items = [];
          $.each(data.items, function(i, item) {
            items.push( 
                '<div class="comment-box box"><div class="box-body">'
                +'<div class="box-meta flex-box">'
                +'<a class="thumb thumb-small is-circle">'
                       +'<img src="'+item.snippet.topLevelComment.snippet.authorProfileImageUrl+'" class=" is-circle">'
                  +'</a>'
                  +'<div class="meta-title">'
                    +'<h3 class="s-title">'
                     +item.snippet.topLevelComment.snippet.authorDisplayName
                    +'</h3>'
                    +'<span class="date">'
                            +moment([item.snippet.topLevelComment.snippet.publishedAt]).fromNow()
                    +'</span>'
                  +'</div>'
                +'</div>'
              +'</div>'
              +'<div class="box-footer">'
                +'<div class="coments">'
                   +item.snippet.topLevelComment.snippet.textDisplay
                +'</div>'
              +'</div></div>' );
          });
        $( "<div/>", {
          "class": "newList",
          html: items.join( "" )
        }).appendTo( "#nextComment" );
        console.log(data);
    });
    return false;
});