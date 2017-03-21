<?php
require_once("/var/www/constants.php");
$PAGE_TITLE = "Error";
require_once(FRAGMENT_HEADER);
?>

<section id="error" class="content__header--offset">
	<div class="row align-center">
		<div class="column medium-10 large-8">
			<div class="row">
				<div class="column small-12 text-center">
					<h1>Error Page</h1>
				</div>
			</div>
			<div class="row">
				<div class="column small-12 text-center">
					<p>It appears the the page you requested is not available. If this problem persists, please send me an email with the link and a description, and I'll try to get right on it. Thanks!</p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require_once(FRAGMENT_FOOTER); ?>
