@component('layouts.app')
  @slot('webtitle')
    {{$post->title}}
  @endslot
  @slot('keyword')
   {{$post->keyword}}
  @endslot
  @slot('description')
   {{strip_tags($post->summary)}}
  @endslot
  @slot('shareimage')
      @if (count($post->getMedia('posts')))
        {{ url('/') }}/media/{{$post->getMedia('posts')->first()->id}}/conversions/medium.jpg
      @else
        {{ url('/') }}/images/default_square.jpg
      @endif
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

<section id="section" class="section section-default">
  <div class="container">
        <div class="row">
      <div class="col-md-12 theContent">
       <div class="entry-content">
          <div class="box-meta">
            <a href="{{ url('/') }}/read/{{$post->slug}}" class="thumb">
              @if (count($post->getMedia('posts')))
                <img src="{{ url('/') }}/media/{{$post->getMedia('posts')->first()->id}}/conversions/large.jpg" >
              @else
                 <img src="{{ url('/') }}/images/default_square.jpg">
              @endif
            </a>
            <div class="meta-title">
              <h1 class="the-title">{{$post->title}}</h1>
              <span class="date">{{ formatdate($post->published_at)}}</span>
            </div>
          </div>{{-- .box-meta --}}
          <div class="post-content">
            <div class="post-desc" id="post">
                {!! $post->description !!}
            </div>
          </div>{{-- .post-content --}}
        </div>{{-- .entry-content --}}
        </div>{{-- .entry-content --}}  
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
        </div>
  </div> {{-- .container --}}
</section>
@endcomponent
