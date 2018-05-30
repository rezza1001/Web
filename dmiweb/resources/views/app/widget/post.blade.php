  <div class="meta-title">
    <h3 class="s-title"><a title="{{$post->title}}" href="{{ url('/') }}/news/read/{{$post->slug}}">
        {{limitWord($post->title,7)}}
    </a></h3>
    <span class="date"><i class="ion-android-calendar"></i> {{ formatdate($post->published_at) }}</span>
     </a>
     <a href="{{ url('/') }}/news/read/{{$post->slug}}" class="readmore">Read more</a>
  </div>