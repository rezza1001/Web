<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  @php
  $current = Request::segment(1);
  @endphp
  @if ($current == 'read')
  <title>{{$webtitle}} - DMI</title>
  @else
  <title>{{$webtitle ?? getOption('web_title')}}  - DMI</title>
  @endif
  <meta name="description" content="{{ $description ?? getOption('web_description')}}" />
  <meta name="keywords" content="{{ $keyword ?? getOption('web_keyword') }}" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <meta name="csrf_token" content="{{ csrf_token() }}" />
  <meta name="author" content="dmi.co.id">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@dmi">
  <meta name="twitter:title" content="DMI">
  <meta name="twitter:description" content="{{$webtitle ?? getOption('web_title')}}">
  <meta name="twitter:creator" content="@dmi">
  <meta name="twitter:image" content="{{ $shareimage ?? url('/images/share.jpg') }}">
  <meta name="twitter:domain" content="dmi.co.id">
  <meta property="og:site_name" content="dmi.co.id"/>
  <meta id="shareurl" property="og:url" content="{{ Request::url() }}" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{$webtitle ?? getOption('web_title')}}" />
  <meta property="og:description" content="{{ $description ?? getOption('web_description') }}" />
  <meta id="shareimg" property="og:image" content="{{ $shareimage ?? url('/images/share.jpg') }}" />
  <meta property="og:locale" content="en_us" />
  <meta property="og:image:width" content="366">
  <meta property="og:image:height" content="244">
  <meta property="fb:app_id" content="300460210385410"/>
  <link rel="icon" type="image/x-icon" href="{{ url('/') }}/images/favicon.png">
  <link href="{{ url('/css/dmi.css') }}" rel="stylesheet">
 {{--  <script async src="https://cdn.ampproject.org/v0.js"></script> --}}
  <script type="text/javascript">
    var base_url = "{{ url('/') }}";
    var token = "{{csrf_token()}}";
    function resizeIframe(obj) {
      obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    }
  </script>
  <link rel="alternate" type="application/atom+xml" title="DMI" href="{{url('/')}}/feed" />
</head>
<body>
  <div id="fb-root"></div>
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '300460210385410',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s);
 js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
  <div id="mainBody" class="animsition flex-container">
    @include('app.partial.header')
    <main>
      {!! $slot or "<h3 class='center'>NOT FOUND</h3>" !!}
    </main>
  </div>
    @include('app.partial.footer')
  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>
  @include('app.partial.popup-message')
   <script src="{{ url('/js/all.js') }}"></script>
  @if (currentUrl(1) == 'locations')
    <script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyCYANSwQ1MylR0TrmHhWl8nPWYo5_2XMBg&libraries=geometry,places&ext=.js'></script>
    <script type="text/javascript" src="{{ url('/vendor/map/maplace.js') }}"></script>
    <script type="text/javascript" src="{{ url('/vendor/map/mapstyle.js') }}"></script>
    @foreach (getLocation() as $location)
    <script>

        var locationId = {{$location->id}};
        var locationTitle = '{{$location->title}}';
        var locationAddress = '{!!$location->address!!}';
        var locationLat = '{{$location->latitude}}';
        var locationLong = '{{$location->longitude}}';
        var pointer = '{{ url('/')}}'+'/images/pointer.png';
        var LocsA = [
                      {
                          lat: locationLat,
                          lon: locationLong,
                          title: locationTitle,
                          html : '<div class="address-box"><h5>'+ locationTitle +'</h5><div class="address-content">'+locationAddress+'</div></div>',
                          zoom : 15,
                          icon: pointer,
                      },
                  ];
        new Maplace({
            locations: LocsA,
            map_div: '#gmap-'+locationId,
            controls_type: 'list',
            controls_on_map: false,
            styles: {
                'Night': mapStyle,
              }
            }).Load();
      </script>

    
    @endforeach
  @endif
</body>
</html>


