<a href="{{url('/')}}/news/read/{{$post->slug}}"  title="{{$post->title}}" class="thumb thumb-medium">
   @if (count($post->getMedia('posts')))
      <img src="{{ url('/') }}/media/{{$post->getMedia('posts')->first()->id}}/conversions/medium.jpg">
    @else
       <img src="{{ url('/') }}/images/default.jpg">
    @endif
  </a>