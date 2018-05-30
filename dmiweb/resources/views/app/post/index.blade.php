@component('layouts.app')
  @slot('webtitle')
    {{getOption('web_title')}} - NEWS
  @endslot
  <script type="text/javascript" src="./instafeed/instafeed.min.js"></script>
  <script type="text/javascript">
      var feed = new Instafeed({
          get: 'tagged',
          tagName: 'awesome',
          clientId: 'b3ee6f9cacb6432e8b9d3ee4da739e3c'
      });
      feed.run();
  </script>
  <script type="text/javascript">
      var userFeed = new Instafeed({
          get: 'user',
          userId: '1916109539',
          limit: 9,
          accessToken: '1916109539.b3ee6f9.9f1100cbf3e84feab7ffce6af32b4f16'
      });
      userFeed.run();
  </script>
  
  <section id="section-list" class="section section-default pad">
    <div class="container">
        <div class="box-head">
          <div class="titleboxs center-title">
            <h2 class="title"><span>DMI NEWS</span></h2>
          </div>
         </div>{{-- .box-head--}}
      <div class="row">
        <div class="col-md-8 theContent">
            <div class="scroll">
            @include('app.post.loop')
            </div>
         </div>{{-- .col --}}
        <div class="col-md-4 sidebar">
            <div class="widget" >
                <h3 class="widget-title"><i class="icon-brand-instagram"></i> INSTAGRAM FEED</h3>
                <div class="instagram-box">
                  <div id="instafeed"></div>
                      <a class="instagram-post" href="#" target="_blank">
                        <div class="instagram-image thumb">
                          <img src="#" alt="">
                        </div>
                        <div class="instagram-meta">
                              <span><i class="ion-android-favorite"></i></span>
                        </div>
                      </a>
                </div>
            </div>
         </div>{{-- .col --}}
      </div>{{-- .row --}}
    </div>{{-- .container --}}
  </section>
@endcomponent
