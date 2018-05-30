/*!
 * Authors: Acit Jazz || chit.eureka@gmail.com
 *
 */

require('./bootstrap');
require('./components/jquery-validation/jquery.validate.min.js');
require('./components/bootstrap.file-input.js');
require('./components/confirm/jquery-confirm.min.js');
require('./components/owlcarousel/owl.carousel.min.js');
require('./components/jsScroll/jquery.jscroll.min.js');
require('./components/jsScroll/jquery.infinitescroll.min.js');
require('./components/megamenu/js/megamenu.js');
require('./components/select2/select2.full.min.js');
require('./components/magnific-popup/jquery.magnific-popup.min.js');
require('./snippet/popup.js');
require('./snippet/subscribe.js');
require('./snippet/contactform.js');
$(document).ready(function() {
  $('.btnColor').click(function(){
      var id = $(this).attr('href');
      $('.btnColor').removeClass('active');
      $('.productImages').addClass('hide');
      $(this).addClass('active');
      $(id).removeClass('hide');
      return false;
  });
  $('.alert').fadeOut(5000);
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  $('.logout').click(function() {
     $('#logout-form').submit(); 
  });
  $('.close-subscribe').click(function() {
     $('#subscribe').fadeOut(400); 
  });
  $('input[type=file]').bootstrapFileInput();
  $(".select").select2();
  //carousel
  $('.singlecarousel').owlCarousel({
      loop:true,
      margin:10,
      dots:false,
      autoplay:true,
      items:1,
      navText:["<i class='ion-chevron-left'></i>","<i class='ion-chevron-right'></i>"],
  })
  $('.headlinecarousel').owlCarousel({
      loop:true,
      margin:10,
      dots:false,
      autoplay:true,
      items:1,
      navText:["<i class='ion-chevron-left'></i>","<i class='ion-chevron-right'></i>"],
  })
  //carousel
  $('.carousel').owlCarousel({
      loop:false,
      margin:20,
      dots:false,
      navText:["<i class='ion-chevron-left'></i>","<i class='ion-chevron-right'></i>"],
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:4
          }
      }
  })
});

//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
// BUTTON PLUSMINUS
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
//Detect Mobile 
 function mobiledevice() {
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      return true;
    }else {
      return false;
    }
}
//PAGING SCROLL
$(function() {
  $('.scroll').jscroll({
      loadingHtml: '<div class="loading loading-double"></div>',
      autoTrigger: false,
      nextSelector: 'a.LoadMore',
      contentSelector: 'div.scroll',
      callback: function() {
      }
  });
});
