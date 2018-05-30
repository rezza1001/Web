@component('layouts.app')
  @slot('webtitle')
    BREAKING NEWS -  {{$user->name}}
  @endslot
  @include('app.user.header-profile')
  @include('app.user.nav-profile')
  <section id="section-body" class="section mt20">
    <div class="container">
      <div class="row">
        @include('app.widget.sidebar')
        <div class="col-md-8 theContent">
            <div class="widget">
              <div class="box-head">
                <div class="titlebox title-arrow-right">
                  <h2 class="title"><span><i class="ion-chatbubbles"></i> MY COMMENTS</span></h2>
                </div>
               </div>{{-- .box-head--}}
              <div class="scroll mt20">
                <div class="list-box">
                      @foreach ($comments as $comment)
                        <div class="flex-box list-body">
                          <a class="thumb thumb-small mr15" style="margin-bottom: auto;">
                            @if (count($comment->post->medias))
                              @php
                                $image = $comment->post->medias->first();
                              @endphp
                              <img src="{{ url('/') }}/media/{{$image->id}}/conversions/small.jpg">
                            @else
                               <img src="{{ url('/') }}/images/default_square.jpg">
                            @endif
                          </a>
                          <div class="comment-container">
                            <div class="comment-head flex-box">
                              <h3 class="s-title">
                              <a href="{{ url('/') }}/read/{{$comment->post->slug}}">{{$comment->post->title}}</a>
                              </h3>
                              <span class="date">
                                  {{humandate($comment->created_at)}}
                              </span>
                            </div>{{-- .comment-head  --}}
                            <div class="coment-body">
                                {!!limitWord($comment->content,20)!!}
                            </div>{{-- .comment-body  --}}
                            <div class="coment-footer flex-box">
                                <a href="#" id="like-{{$comment->id}}" class="like-comment" post-id="{{$comment->post->id}}" data-token="{{csrf_token()}}" comment-id="{{$comment->id}}"><i class="ion-thumbsup"></i> <span class="countLikeComment">{{$comment->like}}</span></a>
                                <a href="#" id="dislike-{{$comment->id}}" class="dislike-comment" post-id="{{$comment->post->id}}" data-token="{{csrf_token()}}" comment-id="{{$comment->id}}"><i class="ion-thumbsdown"></i> <span class="countDisLikeComment">{{$comment->dislike}}</span></a>
                            </div>{{-- .comment-footer  --}}
                          </div>{{-- .comment-container  --}}
                        </div>{{-- .comment-list  --}}
                      @endforeach
                    </div>{{-- .list-box --}}
                  <div class="flex-center">
                    {{ $comments -> links()}}
                  </div>
              </div>
            </div>{{-- .widget --}}
        </div>{{-- .col --}}
      </div>{{-- .row --}}
    </div>{{-- .container --}}
  </section>
@include('app.partial.popup-edit-profile')
@include('app.partial.popup-upload-photo')

@endcomponent
