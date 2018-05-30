
<div class="popup">
  <div class="popup-container center" id="popup-unsubscribe">
    <div class="popup-header">
      <h3>UNSUBSCRIBE NEWSLETTER</h3>
    </div><!-- /.popup-header -->
    <div class="popup-body">
       <h4>ARE YOU SURE WANT TO UNSUBSCRIBE NEWSLETTER ?</h4>
       <textarea id="reason" placeholder="Type your reason.."></textarea><br><br>
       <a class="button btn-s btnUsubscribe" token="{{csrf_token()}}" href="#">YES IM'SURE</a>
       <a class="button btn-s btn-primary closePopup" href="#">CANCEL</a>
    </div><!-- /.popup-body -->
  </div><!-- /.popup-container -->
</div><!-- /.popup -->