<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!-- Styles -->
    </head>
    <body>

<!-- Navbar (sit on top) -->

<div class="w3-top">

  <div class="w3-bar w3-white w3-wide w3-padding w3-card">

    <a href="#home" class="w3-bar-item w3-button"><b>ReaSoft</b>98</a>

    <!-- Float links to the right. Hide them on small screens -->

    <div class="w3-right w3-hide-small">

      <a href="#projects" class="w3-bar-item w3-button">Projects</a>

      <a href="#about" class="w3-bar-item w3-button">About</a>

      <a href="#contact" class="w3-bar-item w3-button">Contact</a>

    </div>

  </div>

</div>


<!-- Header -->

<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">

  <img class="w3-image" src="https://i.ytimg.com/vi/ZNpTml6-Gk0/maxresdefault.jpg" alt="Architecture" width="1500" height="800">

  <div class="w3-display-middle w3-margin-top w3-center">

    <h1 class="w3-xxlarge w3-text-white">  <span class="w3-hide-small w3-text-light-grey">ReaSoft</span> <span class="w3-padding w3-black w3-opacity-min"><b>98</b></span></h1>

  </div>

</header>

​

<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Project</h3>
  </div>

  <div class="w3-row-padding">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Web</div>
        <img src="https://i.ytimg.com/vi/OJUNZlJGXSc/maxresdefault.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Android</div>
        <img src="https://s-media-cache-ak0.pinimg.com/originals/a2/2d/06/a22d06c2bc2daf7970529819802113ca.jpg" alt="House" style="width:100%">
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-display-container">
        <div class="w3-display-topleft w3-black w3-padding">Design</div>
        <img src="https://wallinsider.com/wp-content/uploads/2017/05/HD-Graphic-Design-Wallpapers.jpg" alt="House" style="width:100%;">
      </div>
    </div>
  </div>
      
  </div>



  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint
      occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
      laboris nisi ut aliquip ex ea commodo consequat.
    </p>
  </div>

  <div class="w3-row-padding w3-grayscale">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="https://scontent.fcgk12-1.fna.fbcdn.net/v/t1.0-9/22449753_1179610842140474_1773275177294928667_n.jpg?oh=278b525f8422a6d3d55aced52416e265&oe=5AB902F0" alt="John" style="width:100%; height: 400px;">
      <h3>Rezza G</h3>
      <p class="w3-opacity">Android Developer</p>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
      <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="https://scontent.fcgk12-1.fna.fbcdn.net/v/t1.0-9/10647084_793220714052848_649481951964909360_n.jpg?oh=7bb93e0f3bc5c53d3a6cb709aeb7d4ce&oe=5AC544F4" alt="Jane" style="width:100%; height: 400px">
      <h3>Samsul M</h3>
      <p class="w3-opacity">Design</p>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
      <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="https://scontent.fcgk12-1.fna.fbcdn.net/v/t1.0-0/p206x206/16938552_1627459460603778_6263795171833115426_n.jpg?oh=fe8336b26323f292e66258021d7d8ae3&oe=5AD551EA" alt="Mike" style="width:100%; height:400px">
      <h3>Daday R</h3>
      <p class="w3-opacity">Architect</p>
      <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
      <p><button class="w3-button w3-light-grey w3-block">Contact</button></p>
    </div>
  </div>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-32" id="contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contact</h3>
    <p>Lets get in touch and talk about your and our next project.</p>
    <form action="/action_page.php" target="_blank">
      <input class="w3-input" type="text" placeholder="Name" required name="Name">
      <input class="w3-input w3-section" type="text" placeholder="Email" required name="Email">
      <input class="w3-input w3-section" type="text" placeholder="Subject" required name="Subject">
      <input class="w3-input w3-section" type="text" placeholder="Comment" required name="Comment">
      <button class="w3-button w3-black w3-section" type="submit">
        <i class="fa fa-paper-plane"></i> SEND MESSAGE
      </button>
    </form>
  </div>
  
<!-- End page content -->
</div>

<!-- Google Map -->
<!-- <div id="googleMap" class="w3-grayscale" style="width:100%;height:450px;"></div> -->

<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p>Powered by <a href="#" title="W3.CSS" target="_blank" class="w3-hover-text-green">ReaSoft98.com</a></p>
</footer>

<!-- Add Google Maps -->
<script>
function myMap()
{
  myCenter=new google.maps.LatLng(41.878114, -87.629798);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>

</body>
</html>