
<div class="popup">
  <div class="popup-container center" id="popup-subscribe">
    <div class="popup-header">
      <h3>SUBSCRIBE NEWSLETTER</h3>
    </div><!-- /.popup-header -->
    <div class="popup-body">
       <h4>SUBSCRIBE TO OUR NEWSLETTER TO RECEIVE UPDATES FROM US</h4>
      <form id="subscribeform">
             {{csrf_field()}}
        <input type="text" name="email" placeholder="Insert your email address"><br><br>
        <div class="loading loading-double hide" id="loaderSubscribeProfile"></div>
        <input type="submit"  class="button btn-primary btn-s btnSubscribe" value="SUBSCRIBE">
      </form>
    </div><!-- /.popup-body -->
  </div><!-- /.popup-container -->
</div><!-- /.popup -->