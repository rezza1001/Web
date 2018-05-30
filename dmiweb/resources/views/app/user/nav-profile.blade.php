@php
$current = Request::segment(1);
@endphp
@if (Auth::check())
  @if (Auth::user()->id == $user->id)
    <section class="navigation-user">
        <div class="container">
          <div class="user-action">
            <div class="btn-group">
              <a class="btn btn-tab @if ($current == 'profile') current @endif"  href="{{ url('/profile') }}"><i class="ion-android-apps"></i> <span>DASHBOARD</span></a>
              <a class="btn btn-tab @if ($current == 'all-post') current @endif" "  href="{{ url('/all-post') }}"><i class="ion-document-text"></i> <span>MY ARTICLES</span></a>
              <a class="btn btn-tab @if ($current == 'all-comment') current @endif" "  href="{{ url('/all-comment') }}"><i class="ion-chatbubbles"></i> <span>MY COMMENTS</span></a>
              <a class="btn btn-tab @if ($current == 'all-favorite') current @endif" "  href="{{ url('/all-favorite') }}"><i class="icons-favorite"></i> <span>MY FAVORITES</span></a>
              <a class="btn btn-tab @if ($current == 'create-post') current @endif" "  href="{{ url('/create-post') }}"><i class="ion-compose"></i> <span>CREATE ARTICLE</span></a>
              <a class="btn btn-tab editProfile showPopup" href="#popup-edit-profile"><i class="ion-edit"></i> <span>EDIT PROFILE</span></a>
            </div>
          </div>
        </div>
    </section>
  @endif
@endif