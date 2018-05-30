  function ytplay(ytid) {
    var ytcontainer = $(".container-"+ytid);
    var width = $(".container-"+ytid).attr("yt-width");
    var height = $(".container-"+ytid).attr("yt-height");
        ytcontainer.tubeplayer({
        initialVideo: ytid,
        width: width,
        height:height,   
        autoPlay: true,    
        onPlayerLoaded: function(){
            console.log(this.tubeplayer("data"));
            ytcontainer.find('iframe').addClass("superembed-force");
            superEmbed();
            $(window).resize(superEmbed());
        },
    });
  }
  $('.play-video').click(function() {
     target = $(this).attr("href");
     $(target).find('img').hide();
     ytid = $(this).attr("yt-id");
     ytplay(ytid);
     $(this).hide();
     return false;
  });