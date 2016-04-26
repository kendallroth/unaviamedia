	<footer>
		<div class="container-medium background-medium-grey">
			<div class="row align-center">
				<div class="small-12 medium-10 column footer-bar-top">
					<ul class="horizontal-menu text-center medium-text-left">
						<li><a href="<?=HOME_URL?>">Home</a></li>
						<!--<li><a href="<?=PROJECTS_URL?>">Projects</a></li>-->
						<li><a href="<?=ABOUT_URL?>">About</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container-medium background-dark-grey">
			<div class="row align-center">
				<div class="small-12 medium-10 column footer-bar-bottom clearfix">
					<div class="row align-middle">
						<nav class="small-12 medium-6 medium-push-6 column social-media-bar text-center medium-text-right">
							<a href="//twitter.com/UnaviaMedia" target="_blank">
								<img src="<?=ICONS?>/Twitter-Icon.png" class="round" width="30" />
							</a>
							<a href="<?=GITHUB_URL?>" target="_blank">
								<img src="<?=ICONS?>/Github-Icon.png" class="round" width="30" />
							</a>
							<a href="//ca.linkedin.com/in/kendallroth/" target="_blank">
								<img src="<?=ICONS?>/LinkedIn-Icon.png" class="round" width="30" />
							</a>
						</nav>
						<div class="small-12 medium-6 medium-pull-6 column footer-copyright text-center medium-text-left">
							<div>&copy; <?=date("Y") ?>&ensp;UnaviaMedia</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Quick link to top of page -->
		<a href="#page-top" class="btn-page-top"><img src="<?=ICONS?>/Page-Top.png"/></a>
	</footer>

	<script src="/bower_components/jquery/dist/jquery.js"></script>
    <script src="/bower_components/what-input/what-input.js"></script>
    <script src="/bower_components/foundation-sites/dist/foundation.js"></script>
    <script src="/dist/js/app.js"></script>
  </body>
</html>
