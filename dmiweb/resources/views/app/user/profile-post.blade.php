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
               </div>{{-- .box-head--}}
              <div class="scroll mt20">
                <div class="list-box">
                  @foreach ($posts as $post)
                      <div class="flex-box list-body" id="post-{{$post->id}}">
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
                          <div class="post-action">
                              @if ($post->published == 1)
                                 <label class="label label-small green">STATUS : PUBLISH</label>
                              @elseif($post->published == 2)
                                 <label class="label label-small orange">STATUS : PENDING</label>
                              @else
                                 <label class="label label-small label-warning">STATUS : REJECT</label>
                              @endif
                            <div class="btn-group">
                                <a class="btn btn-success btn-xs" href="{{ url('/') }}/edit-post/{{ $post->id}}"><i class="ion-edit"></i> Edit</a>
                                <a class="btn btn-danger btn-xs deletePost" href="{{ url('/') }}/delete-post" post-id="{{$post->id}}" data-token="{{csrf_token()}}"><i class="ion-trash-a"></i> Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>{{-- .flex-box --}}
                  @endforeach
                </div>{{-- .list-box --}}
                <div class="flex-center">
                  {{ $posts -> links()}}
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
