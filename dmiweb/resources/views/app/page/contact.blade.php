@component('layouts.app')
  @slot('webtitle')
    {{getOption('web_title')}} - {{$page->title}}
  @endslot
<section class="section section-default pad">
  <div class="container">
    <div class="box-head">
      <div class="titleboxs center-title">
        <h2 class="title"><span>{{$page->title}}</span></h2>
      </div>
     </div>{{-- .box-head--}}
    <div class="row">  
      <div class="col-md-12">
      <div class="tengah">
        <form class="form contact-form mt20" id="contactform">
          {{csrf_field()}}
          <div class="rows">
            <input type="text" name="name" placeholder="Full Name">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="rows">
                <input type="text" name="email" placeholder="Email Address">
              </div>
            </div>
            <div class="col-md-6">
              <div class="rows">
                <input type="text" name="phone" placeholder="Phone Number">
              </div>
            </div>
          </div>
          <div class="rows">
            <input type="text" name="subject" placeholder="Subject">
          </div>
          <div class="rows">
            <textarea name="message" placeholder="Message"></textarea>
          </div>
          <div class="rows">
            <div class="loading loading-double hide" id="loaderContact"></div>
            <input type="submit" class="button btn-primary" value="SUBMIT">
          </div>
        </form>
      </div>
     </div>{{-- .col --}}
      <!-- <div class="col-md-5">
          <div class="map mt20">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.9087790033727!2d106.81883531467287!3d-6.275723663179951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f22103a53611%3A0xfa3747e0a7d49d3b!2sRoyal+Enfield+Indonesia!5e0!3m2!1sen!2sid!4v1507692713503" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
          <div class="address">
              {!!$page->description!!}
          </div>
      </div>{{-- .col --}} -->
    </div>{{-- .row --}}
    
  </div> {{-- .container --}}
</section>
@endcomponent