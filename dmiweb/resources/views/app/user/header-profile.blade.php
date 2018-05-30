<section id="heading-profile" class="flex-center">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <div class="boxPhoto">
          <div class="thumb thumb-user is-circle">
              @if (count($user->media))
                @php
                  $avatar = $user->media->first();
                @endphp
                <img src="{{ url('/') }}/media/{{$avatar->id}}/conversions/square.jpg" class="is-circle">
              @else
                 <img src="{{ url('/') }}/images/default_square.jpg" class="is-circle">
              @endif
              @if (Auth::check())
                @if (Auth::user()->id == $user->id)
                <a class="caption caption-full showPopup thumb-user is-circle" href="#popup-photo">
                  Change Photo
                </a>
                @endif
              @endif
          </div>
        </div>
      </div>
      <div class="col-md-10">
        <div class="user-detail">
          <h2><a href="{{ url('/') }}/user/{{$user->slug}}">{{$user->name}}</a>
            @if ($user->status == 1)
              <i class="ion-android-done verified-account" data-toggle='tooltip' data-placement='top' title='Verified Account'></i></h2>
            @endif
          <div class="user-info">
              <div class="row">
                <div class="col-md-6">
                  <p><span>Name</span> <span>:</span> <span>{{$user->name}}</span></p>
                  <p><span>Gender</span> <span>:</span> <span>{{$user->gender}}</span></p>
                  @if ($user->age != null)
                  <p><span>Born</span> <span>:</span> <span>{{formatdate($user->age)}}</span></p>
                  @endif
                  <p><span>Role</span> <span>:</span> <span><label class="label label-small label-warning">{{ $user->roles()->first()->name}}</label></span></p>
                </div>
                <div class="col-md-6">
                  <p><span>Article</span> <span>:</span> <span>{{userPostCount($user->id)}}</span></p>
                  <p><span>Favorite</span> <span>:</span> <span>{{userFavoriteCount($user->id)}}</span></p>
                  <p><span>Comments</span> <span>:</span> <span>{{userCommentCount($user->id)}}</span></p>
                </div>
              </div>
          </div>
        </div>{{-- .user-detail --}}
      </div>
    </div>
</div>{{-- .container --}}
</section>