<footer class="bg-black">
<section class="footer-bottom">
	<div class="container flex-center">
		<div class="navigation">
			<nav class="navPage flex-center">
				<ul class="flex-center">
					<li><a href="{{url('/')}}/page/company-overview" class="@if(currentUrl(2) == 'company-overview') current @endif">About</a></li>
					<li><a href="{{url('/')}}/page/career" class="@if(currentUrl(2) == 'career') current @endif">Career</a></li>
					<li><a href="{{url('/')}}/page/contact-us" class="@if(currentUrl(2) == 'contact-us') current @endif">Contact Us</a></li>
				</ul>
			</nav>
			<div class="socmed">
	          <a href="<?=getOption('facebook_url');?>" target="_blank"><i class="ion-social-facebook"></i></a>
	          <a href="<?=getOption('instagram_url');?>" target="_blank"><i class="ion-social-instagram"></i></a>
	          <a href="<?=getOption('twitter_url');?>" target="_blank"><i class="ion-social-twitter"></i></a>
	          <a href="<?=getOption('youtube_url');?>" target="_blank"><i class="ion-social-youtube"></i></a>
			</div>
			<p class="copy"><a href="http://www.chat-id.com" target="_blank">&copy;</a> 2017 PT. Distributor Motor Indonesia All Rights Reserved.</p>
		</div> {{-- .navigation --}}
	</div>
</section>
</footer>