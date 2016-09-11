<?php

require_once("/var/www/constants.php");
$PAGE_TITLE = "Home";

require_once(HEADER_FRAGMENT);

?>

<section id="welcome-wrapper">
	<div id="welcome-card" class="row align-center">
		<div class="text-center large-8 column">
			<h1>Hi, I'm Kendall Roth, a web developer currently studying at Conestoga College</h1>
		</div>
	</div>
</section>

<section id="portfolio-wrapper" class="bar">
	<div id="portfolio-bar" class="row">
		<div class="text-center column">
			<p>Welcome to my online portfolio!</p>
		</div>
	</div>
</section>

<section id="summary-wrapper">
	<div id="summary-card" class="row align-center">
		<div class="small-12 medium-4 align-self-stretch column">
			<div class="summary-block">
				<img src="http://placehold.it/150x100" />
				<span class="summary-header">Analysis</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</div>
		<div class="small-12 medium-4 align-self-stretch column">
			<div class="summary-block">
				<img src="http://placehold.it/150x100" />
				<span class="summary-header">Design</span>
				<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			</div>
		</div>
		<div class="small-12 medium-4 align-self-stretch column">
			<div class="summary-block">
				<img src="http://placehold.it/150x100" />
				<span class="summary-header">Development</span>
				<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div>
</section>

<section id="introduction-wrapper" class="bar">
	<div id="introduction-bar" class="row align-center">
		<div class="large-9 column">
			<blockquote>I'm primarily passionate about responsive web design and development, focusing on clean and simple implementations. I strive to be a dedicated team player while adapting to different environments and tasks.<br /><em>&mdash; Kendall Roth</em></blockquote>
		</div>
	</div>
</section>

<section id="skills-wrapper">
	<div id="skills-card" class="row">
		<div class="column">
			Skills
		</div>
	</div>
</section>

<section id="facts-wrapper" class="bar">
	<div id="facts-bar" class="row align-center">
		<div class="text-center medium-2 column">
			Fact about me
		</div>
		<div class="text-center medium-2 column">
			Fact about me
		</div>
		<div class="text-center medium-2 column">
			Fact about me
		</div>
	</div>
</section>

<section id="experience-wrapper">
	<div id="experience-card" class="row">
		<div class="small-12 medium-4 align-self-stretch">
			Place
		</div>
		<div class="small-12 medium-4 align-self-stretch">
			Place
		</div>
		<div class="small-12 medium-4 align-self-stretch">
			Place
		</div>
	</div>
</section>

<section id="contact-wrapper" class="bar">
	<div id="contact-bar" class="row">
		<div class="text-center column">
			<a href="mailto:kroth@unaviamedia.ca">Contact Me</a>
		</div>
	</div>
</section>

<?php require_once(FOOTER_FRAGMENT); ?>
