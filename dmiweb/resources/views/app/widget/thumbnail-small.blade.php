<a href="{{url('/')}}/read/{{$post->slug}}"  title="{{$post->title}}" class="thumb thumb-small">
    @if (count($post->getMedia('thumbnail')))
      <img src="{{ url('/') }}/media/{{$post->getMedia('thumbnail')->first()->id}}/conversions/small.jpg">
    @else
       <img src="{{ url('/') }}/images/default.jpg">
    @endif
    @if ($post->type == 'video')
       <i class="iconpost ion-ios-videocam"></i>
    @elseif($post->type == 'photo')
       <i class="iconpost ion-images"></i>
    @endif
  </a>