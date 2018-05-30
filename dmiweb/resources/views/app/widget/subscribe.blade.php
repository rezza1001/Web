
<div id="subscribe">
  <span class="datenow">{{Carbon\Carbon::now()->toFormattedDateString()}}</span>
  <div class="subscribe">
    <form class="subscribeform" id="subscribeform">
           {{csrf_field()}}
      <input type="text" name="email" placeholder="E-mail">
            <div class="loading loading-double hide" id="loadersubscribe"></div>
      <input type="submit"  class="button btnSubscribe" value="SUBSCRIBE">
    </form>
  </div>
</div>{{-- #subscribe --}}