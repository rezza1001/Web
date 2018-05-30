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
<section id="section" class="section section-default">
  <div class="container">
        <div class="row">
      <div class="col-md-8 theContent">
       <div class="entry-content">
          
          <div class="video-containers videobox" id="yt-{{$post->video_id}}">
                @if (count($post->medias))
                  @php
                    $media = $post->medias()->first();
                  @endphp
                  <img src="{{ url('/') }}/media/{{$media->id}}/conversions/maxres.jpg" >
                @else
                   <img src="{{ url('/') }}/images/default_square.jpg">
                @endif
              <div class="container-{{$post->video_id}}"  yt-width="1070" yt-height="602"></div>
              <a href="#yt-{{$post->video_id}}" yt-id="{{$post->video_id}}" class="play-btn play-video"><i class="icons-play"></i></a>

          </div>{{-- .videobox --}}
          <div class="box-meta">
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
            <div class="widget">
                <h3 class="widget-title"><i class="icon-brand-instagram"></i> INSTAGRAM FEED</h3>
                <div class="instagram-box">
                  @if (count(getInstagram('royalenfieldid')))
                    @foreach (getInstagram('royalenfieldid') as $key => $instagram)
                      <a class="instagram-post" href="{{ $instagram['link'] }}" target="_blank">
                        <div class="instagram-image thumb">
                          <img src="{{ $instagram['images']['thumbnail']['url'] }}" alt="">
                        </div>
                        <div class="instagram-meta">
                              <span><i class="ion-android-favorite"></i>{{ $instagram['likes']['count'] }}</span>
                        </div>
                      </a>
                    @endforeach
                  @endif
                </div>
            </div>
         </div>{{-- .col --}}
        </div>
  </div> {{-- .container --}}
</section>
@endcomponent
