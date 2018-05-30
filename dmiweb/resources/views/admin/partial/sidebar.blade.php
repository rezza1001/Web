<section class="sidebar">
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ url('/') }}/images/logo_box.png" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>{{Auth::user()->name}}</p>
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <ul class="sidebar-menu">
   <li class="header">DASHBOARD</li>
    <li><a href="{{ url('/backend/dashboard') }}"><i class="fa fa-link"></i> <span>Dashboard</span></a></li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-folder"></i> <span>News</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('/') }}/backend/post"><i class="fa fa-pencil"></i> <span>News</span></a></li>
        <li><a href="{{ url('/') }}/backend/categories"><i class="fa fa-th-large"></i> <span>Category</span></a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-folder"></i> <span>Products</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('/') }}/backend/product"><i class="fa fa-pencil"></i> <span>Products Type/Model</span></a></li>
        <li><a href="{{ url('/') }}/backend/productcategory"><i class="fa fa-th-large"></i> <span>Category</span></a></li>
        <li><a href="{{ url('/') }}/backend/productcolor"><i class="fa fa-th-large"></i> <span>Color</span></a></li>
        <li><a href="{{ url('/') }}/backend/productyear"><i class="fa fa-th-large"></i> <span>Year</span></a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-map"></i> <span>Location</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ url('/') }}/backend/location"><i class="fa fa-pencil"></i> <span>Location</span></a></li>
        <li><a href="{{ url('/') }}/backend/locationcategory"><i class="fa fa-th-large"></i> <span>Category</span></a></li>
      </ul>
    </li>
    <li><a href="{{ url('/') }}/backend/domisili"><i class="fa fa-file"></i> <span>Domisili</span></a></li>
    <li><a href="{{ url('/') }}/backend/banner"><i class="fa fa-file"></i> <span>Banner</span></a></li>
    <li><a href="{{ url('/') }}/backend/page"><i class="fa fa-file"></i> <span>Pages</span></a></li>
    <li><a href="{{ url('/') }}/backend/career"><i class="fa fa-child"></i> <span>Careers</span></a></li>
    <li><a href="{{ url('/') }}/backend/reservation"><i class="fa fa-child"></i> <span>Reservation</span></a></li>
    <li><a href="{{ url('/') }}/backend/inbox"><i class="fa fa-envelope"></i> <span>Inbox</span></a></li>
    <li><a href="{{ url('/') }}/backend/option"><i class="fa fa-cog"></i> <span>Setting</span></a></li>
    <li><a href="{{ url('/') }}/logout"><i class="fa fa-lock"></i> <span>Logout</span></a></li>
  </ul>
</section><!-- /.sidebar -->
