<div class="list-box">
  @foreach ($posts as $post)
      <div class="list-body">
          <div class="box flex-box">
            @include('app.widget.thumbnail-medium')
            <div class="meta-title">
              <h3 class="s-title"><a title="{{$post->title}}" href="{{ url('/') }}/news/read/{{$post->slug}}">
                  {{$post->title}}
              </a></h3>
              <span class="date">{{ formatdate($post->published_at)}}</span>
                                 {!!limitWord($post->summary,32)!!}
            </div>
          </div>{{-- .flex-box --}}
      </div>{{-- .flex-box --}}
  @endforeach
</div>{{-- .list-box --}}
<div class="flex-center">
  {{ $posts -> links()}}
</div>