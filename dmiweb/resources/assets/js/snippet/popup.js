//Default Popup
 $('.showPopup').magnificPopup({
    type: 'inline',
    fixedContentPos: false,
    fixedBgPos: true,
    overflowY: 'auto',
    closeBtnInside: true,
    preloader: false,
    midClick: true,
    removalDelay: 300,
    mainClass: 'my-mfp-zoom-in'
});
//Close Popup
$('.closePopup').click(function(){
  var magnificPopup = $.magnificPopup.instance;
  magnificPopup.close();
    return false;
});
//Video Popup
$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
  disableOn: 700,
  type: 'iframe',
  mainClass: 'mfp-fade',
  removalDelay: 160,
  preloader: false,
  fixedContentPos: false
});
//Gallery Popup
$('.popup-gallery').magnificPopup({
  delegate: 'a',
  type: 'image',
  tLoading: 'Loading image #%curr%...',
  mainClass: 'mfp-img-mobile',
  gallery: {
    enabled: true,
    navigateByImgClick: true,
    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
  },
  image: {
    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
  },
  callbacks: {
    close: function() {
      return false;
    },
  }
});
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