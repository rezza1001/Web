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
                         @include('app.widget.thumbnail-small')
                         @include('app.widget.post')
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
