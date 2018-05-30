@include('app.widget.emotion')
<div class="box">
  <div class="border-title">
    <h2 class="title"><span><i class="ion-chatbubbles"></i> WRITE COMMENT</span></h2>
  </div>
  <div class="box-content">
    <div class="box-comment">
      <div class="comment-box">
       @if (Auth::check())
          <div class="box-author flex-box">
            <a class="thumb thumb-author is-circle" href="{{ url('/') }}/user/{{Auth::user()->slug}}">
              @if (count(Auth::user()->getMedia('thumbnail')))
                @php
                  $avatar = Auth::user()->getMedia('thumbnail')->first();
                @endphp
                <img src="{{ url('/') }}/media/{{$avatar->id}}/conversions/square.jpg" class="is-circle">
              @else
                 <img src="{{ url('/') }}/images/default_square.jpg" class="is-circle">
              @endif
            </a>
            <div class="meta-title">
              <h3 class="s-title">
                <a href="{{ url('/') }}/user/{{Auth::user()->slug}}">{{Auth::user()->name}}</a>
              </h3>
            </div>
          </div>{{-- .box-meta --}}
        @endif
        <div class="comment-form">
             <textarea placeholder="Tulis Komentar" id="commentMessage-0"></textarea>
             @if (Auth::check())
               <a href="#" class="button addComment" post-id="{{$post->id}}" data-token="{{csrf_token()}}" comment-id="0">Comment</a>
             @else
               <a href="#popup-login" class="button showPopup">Comment</a>
             @endif
        </div>{{-- .comment-form--}}
      </div>{{-- .comment-box --}}
      <div id="commentTab">
           <div class="flex-center hide" id="commentLoader"><div class="loading loading-double"></div></div>
           <div id="newComment"></div>
           <div class="scroll">
           <div class="comment-box">
              @foreach ($comments as $comment)
                <div class="comment-list flex-box">
                  <a href="{{ url('/') }}/user/{{$comment->user->slug}}" class="thumb thumb-author is-circle">
                    @if (count($comment->user->getMedia('thumbnail')))
                      @php
                        $avatar = $comment->user->getMedia('thumbnail')->first();
                      @endphp
                      <img src="{{ url('/') }}/media/{{$avatar->id}}/conversions/square.jpg" class="is-circle">
                    @else
                       <img src="{{ url('/') }}/images/default_square.jpg" class="is-circle">
                    @endif
                  </a>
                  <div class="comment-container">
                    <div class="comment-head flex-box">
                      <h3 class="s-title">
                       <a href="{{ url('/') }}/user/{{$comment->user->slug}}">{{$comment->user->name}}</a>
                      </h3>
                      <span class="date">
                          {{humandate($comment->created_at)}}
                      </span>
                    </div>{{-- .comment-head  --}}
                    <div class="coment-body">
                          {{$comment->content}}
                    </div>{{-- .comment-body  --}}
                    <div class="coment-footer flex-box">
                        <a href="#" id="like-{{$comment->id}}" class="like-comment" post-id="{{$post->id}}" data-token="{{csrf_token()}}" comment-id="{{$comment->id}}"><i class="ion-thumbsup"></i> <span class="countLikeComment">{{$comment->like}}</span></a>
                        <a href="#" id="dislike-{{$comment->id}}" class="dislike-comment" post-id="{{$post->id}}" data-token="{{csrf_token()}}" comment-id="{{$comment->id}}"><i class="ion-thumbsdown"></i> <span class="countDisLikeComment">{{$comment->dislike}}</span></a>
                        <a href="#" id="reply-{{$comment->id}}" class="reply-comment" post-id="{{$post->id}}" data-token="{{csrf_token()}}" comment-id="{{$comment->id}}"><i class="ion-reply"></i>Reply</a>
                        <a href="#" id="report-{{$comment->id}}" class="report-comment" post-id="{{$post->id}}" data-token="{{csrf_token()}}" comment-id="{{$comment->id}}"><i class="ion-android-warning"></i>Report</a>
                    </div>{{-- .comment-footer  --}}
                    <div class="replybox hide" id="replybox-{{$comment->id}}">
                        <div class="comment-form">
                             <textarea placeholder="Tulis Komentar" id="commentMessage-{{$comment->id}}"></textarea>
                             @if (Auth::check())
                               <a href="#" class="button addComment" post-id="{{$post->id}}" comment-id="{{$comment->id}}" data-token="{{csrf_token()}}">Comment</a>
                             @else
                               <a href="#popup-login" class="button showPopup">Comment</a>
                             @endif
                        </div>{{-- .comment-form--}}
                    </div>
                  </div>{{-- .comment-container  --}}
                </div>{{-- .comment-list  --}}
                <div class="replyComment" id="replyboxList-{{$comment->id}}">
                   @if (count($comment->parents))
                    @foreach ($comment->parents as $comment)
                    <div class="comment-list flex-box">
                      <a href="{{ url('/') }}/user/{{$comment->user->slug}}" class="thumb thumb-author is-circle">
                        @if (count($comment->user->getMedia('thumbnail')))
                          @php
                            $avatar = $comment->user->getMedia('thumbnail')->first();
                          @endphp
                          <img src="{{ url('/') }}/media/{{$avatar->id}}/conversions/square.jpg" class="is-circle">
                        @else
                           <img src="{{ url('/') }}/images/default_square.jpg" class="is-circle">
                        @endif
                      </a>
                      <div class="comment-container">
                        <div class="comment-head flex-box">
                          <h3 class="s-title">
                            <a href="{{ url('/') }}/user/{{$comment->user->slug}}">{{$comment->user->name}}</a>
                          </h3>
                          <span class="date">
                              {{humandate($comment->created_at)}}
                          </span>
                        </div>{{-- .comment-head  --}}
                        <div class="coment-body">
                              {{$comment->content}}
                        </div>{{-- .comment-body  --}}
                        <div class="coment-footer flex-box">
                            <a href="#" id="like-{{$comment->id}}" class="like-comment" post-id="{{$post->id}}" data-token="{{csrf_token()}}" comment-id="{{$comment->id}}"><i class="ion-thumbsup"></i> <span class="countLikeComment">{{$comment->like}}</span></a>
                            <a href="#" id="dislike-{{$comment->id}}" class="dislike-comment" post-id="{{$post->id}}" data-token="{{csrf_token()}}" comment-id="{{$comment->id}}"><i class="ion-thumbsdown"></i> <span class="countDisLikeComment">{{$comment->dislike}}</span></a>
                            <a href="#" id="report-{{$comment->id}}" class="report-comment" post-id="{{$post->id}}" data-token="{{csrf_token()}}" comment-id="{{$comment->id}}"><i class="ion-android-warning"></i>Report</a>
                        </div>{{-- .comment-footer  --}}
                      </div>{{-- .comment-container  --}}
                    </div>{{-- .comment-list  --}}
                    @endforeach
                   @endif
                </div>
             @endforeach
          </div>{{-- .comment-box --}}
          <div class="flex-center">
            {{ $comments -> links()}}
          </div>
          </div>{{-- .scroll --}}
      </div>{{-- #commentTab --}}
    </div>{{-- .box-comment --}}
  </div>{{-- .box-content --}}
</div>{{-- .box --}}