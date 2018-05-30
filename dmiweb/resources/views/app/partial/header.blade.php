<header>
<div id="top">
	<div class="container">
		<a href="{{url('/')}}" class="logo">
			<img src="{{url('/')}}/images/logo.png" alt="">
		</a>
		<div class="headerbox">
				<div id="navigation">
					 <div class="menu-container">
				        <div class="menu">
				          <ul>
							<li>
								<a href="{{url('/')}}" class="@if(currentUrl(1) == '') current @endif">Home</a>
							</li>
							<li>
								<a href="{{url('/')}}/page/company-overview" class="@if(currentUrl(2) == 'company-overview') current @endif">About</a>
							</li>
							<li>
								<a href="{{url('/')}}/products" class="@if(currentUrl(1) == 'products') current @endif">Royal Enfield Motorcycles</a>
							</li>
							<li>
								<a href="{{url('/')}}/locations" class="@if(currentUrl(1) == 'locations') current @endif">Locate Us</a>
							</li>
							<li>
								<a href="{{url('/')}}/shop" class="@if(currentUrl(1) == 'shop') current @endif">Book Now</a>
							</li>
							<li>
								<a href="{{url('/')}}/news" class="@if(currentUrl(1) == 'news') current @endif">News</a>
							<li>
							<li>
								<a href="{{url('/')}}/page/contact-us" class="@if(currentUrl(2) == 'contact-us') current @endif">Contact Us</a>
							</li>
				            </ul>
				        </div>{{-- .menu --}}
				    </div>{{-- .menu-container --}}
				</div>{{-- #navigation --}}

		</div>{{-- .headerbox --}}
	</div>{{-- .container --}}
</div>
</header>