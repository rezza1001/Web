
//Share Facebook

function fb_share(data) {
  FB.ui({
  method: 'feed',
  name: data.name,
  link: data.link,
  picture: data.picture,
  caption: data.caption,
  },
  function(response) {
    if (response && response.post_id) {
      console.log('share');
    } else {
      console.log('notshare');
    }
  });
}
$('.shareFacebook').on( 'click', function() {
    var data = {
        name: $(this).data('name'),
        link: $(this).data('link'),
        picture: $(this).data('picture'),
        caption: $(this).data('caption'),
    }
    console.log(data);
    fb_share(data);
});
$('.shareTwitter').on( 'click', function(e) {
    var data = {
        shareurl: $(this).data('shareurl'),
        via: $(this).data('via'),
        hastag: $(this).data('hastag'),
        text: $(this).data('text')
    }
    e.preventDefault(); 
    var url =  "https://twitter.com/share?url="+data.shareurl+"&via="+data.via+"&hashtags="+data.hastag+"&text="+data.text;
    window.open(url, '_blank');
});
