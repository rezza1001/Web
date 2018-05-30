<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <title>{{$webtitle ?? "Kokiku.tv - Recipes, Review, and Tips"}}</title>
  <meta name="description" content="Kokiku TV adalah online portal kuliner untuk para pencinta makanan. Dari resep masakan rumah sampai kisah chef profesional, keunikan street food sampai keindahan fine-dining cuisine, semua ada di Kokiku TV - your ultimate cooking channel!" />
  <meta name="keywords" content="{{$keyword ?? "Kokiku, Masak, Resep, Hidangan, Makanan, Food, Koki,recipes, review, tips, resep, ulasan, tip, makanan, minuman, kuliner, masak, cooking"}}" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf_token" content="{{ csrf_token() }}" />
  <meta name="author" content="Acit Jazz">
  <meta name="twitter:image" content="{{ url('/') }}/images/share.jpg" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="@kokikutv" />
  <meta name="twitter:creator" content="@kokikutv" />
  <meta property="og:site_name" content="KOKIKU"/>
  <meta id="shareurl" property="og:url" content="{{ url('/') }}/" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="KOKIKU" />
  <meta property="og:description" content="KOKIKU" />
  <meta id="shareimg" property="og:image" content="{{ url('/') }}/images/share.jpg" />
  <meta property="og:locale" content="en_us" />
  <meta property="og:image:width" content="366">
  <meta property="og:image:height" content="244">
  <meta property="fb:app_id" content="2249457798612880"/>
  <link rel="icon" type="image/x-icon" href="{{ url('/') }}/images/favicon.png">
    <!-- Styles -->
  <link href="{{ mix('/css/kokiku.css') }}" rel="stylesheet">
  <script type="text/javascript">
    var base_url = "{{ url('/') }}"
  </script>
  <!-- Feed -->
  <link rel="alternate" type="application/atom+xml" title="KOKIKU TV" href="{{url('/')}}/feed" />
</head>
<body>
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '2249457798612880',
        xfbml      : true,
        version    : 'v2.6'
      });
    };
    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>
  <div class="animsition flex-container">
    @include('flash::message')
    @include('app.partial.header')
    <main>
      @yield('content')
    </main>
    @include('app.partial.footer')
  </div>
  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>

  @include('app.partial.popup-login')
  @include('app.partial.popup-message')

   <script src="{{ mix('/js/all.js') }}"></script>
</body>
</html>


