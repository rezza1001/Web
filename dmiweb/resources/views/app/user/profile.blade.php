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
                  <h2 class="title"><span><i class="ion-document-text"></i> MY ARTICLES</span></h2>
                </div>
                  <a href="{{url('/')}}/all-post" class="btn-more"><span>VIEW ALL</span> <i class="ion-android-arrow-forward"></i></a>
               </div>{{-- .box-head--}}
              <div class="scroll mt20">
                <div class="list-box">
                    @if (count($posts))
                      @foreach ($posts as $post)
                          <div class="flex-box list-body" id="post-{{$post->id}}">
                            @include('app.widget.thumbnail-small')
                            <div class="meta-title">
                              <h3 class="s-title"><a title="{{$post->title}}" href="{{ url('/') }}/read/{{$post->slug}}">
                                  {{$post->title}}
                              </a></h3>
                              <span class="date">{{ formatdate($post->created_at)}}</span>
                              <div class="post-action">
                                @if ($post->published == 1)
                                   <label class="label label-small green">STATUS : PUBLISH</label>
                                @elseif($post->published == 2)
                                   <label class="label label-small orange">STATUS : PENDING</label>
                                @else
                                   <label class="label label-small red">STATUS : REJECT</label>
                                @endif
                                <div class="btn-group">
                                    <a class="btn btn-success btn-xs" href="{{ url('/') }}/edit-post/{{ $post->id}}"><i class="ion-edit"></i> Edit</a>
                                    <a class="btn btn-danger btn-xs deletePost" href="{{ url('/') }}/delete-post" post-id="{{$post->id}}" data-token="{{csrf_token()}}"><i class="ion-trash-a"></i> Delete</a>
                                </div>
                              </div>
                            </div>
                          </div>{{-- .flex-box --}}
                      @endforeach
                    @else
                      <div class="entry center">
                          <h3>You don't have any article yet</h3>
                          <a href="{{ url('/create-post') }}" class="button">CREATE ARTICLE HERE</a>
                      </div>
                    @endif
                </div>{{-- .list-box --}}
              </div>
            </div>{{-- .widget --}}
            <div class="widget">
              <div class="box-head">
                <div class="titlebox title-arrow-right">
                 <h2 class="title"><span><i class="ion-chatbubbles"></i> MY COMMENTS</span></h2>
                </div>
                <a href="{{url('/')}}/all-comment" class="btn-more"><span>VIEW ALL</span> <i class="ion-android-arrow-forward"></i></a>
               </div>{{-- .box-head--}}
              <div class="scroll mt20">
                <div class="list-box">
                    @if (count($comments))
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
                    @else
                      <div class="entry center">
                          <h3>You don't have any comment</h3>
                      </div>
                    @endif
                    </div>{{-- .list-box --}}
              </div>
            </div>{{-- .widget --}}
            <div class="widget">
              <div class="box-head">
                <div class="titlebox title-arrow-right">
                  <h2 class="title"><span><i class="icons-favorite"></i> MY FAVORITE ARTICLES</span></h2>
                </div>
                <a href="{{url('/')}}/all-favorite" class="btn-more"><span>VIEW ALL</span> <i class="ion-android-arrow-forward"></i></a>
               </div>{{-- .box-head--}}
              <div class="scroll mt20">
                <div class="list-box">
                  @if (count($favorites))
                  @foreach ($favorites as $post)
                      <div class="flex-box list-body">
                        <a href="{{url('/')}}/read/{{$post->slug}}"  title="{{$post->title}}" class="thumb thumb-small mr15" style="margin-bottom: auto;">
                          @if (count($post->medias))
                            @php
                              $media = $post->medias->first();
                            @endphp
                            <img src="{{ url('/') }}/media/{{$media->id}}/conversions/medium.jpg">
                          @else
                             <img src="{{ url('/') }}/images/default.jpg">
                          @endif
                          @if ($post->type == 'video')
                             <i class="iconpost ion-ios-videocam"></i>
                          @elseif($post->type == 'photo')
                             <i class="iconpost ion-images"></i>
                          @endif
                        </a>
                        <div class="meta-title">
                          <h3 class="s-title"><a title="{{$post->title}}" href="{{ url('/') }}/read/{{$post->slug}}">
                              {{$post->title}}
                          </a></h3>
                          <span class="date">{{ formatdate($post->created_at)}}</span>
                          <div class="summary">{!!limitWord($post->summary,20)!!}</div>
                        </div>
                      </div>{{-- .flex-box --}}
                  @endforeach
                  @else
                    <div class="entry center">
                        <h3>You don't have any favorite article</h3>
                    </div>
                  @endif
                </div>{{-- .list-box --}}
              </div>
            </div>{{-- .widget --}}
         </div>{{-- .col --}}
      </div>{{-- .row --}}
    </div>{{-- .container --}}
  </section>
@include('app.partial.popup-edit-profile')
@include('app.partial.popup-upload-photo')

@endcomponent
