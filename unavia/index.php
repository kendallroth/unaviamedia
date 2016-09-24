<?php

require_once("/var/www/constants.php");
$PAGE_TITLE = "Home";

require_once(HEADER_FRAGMENT);

?>

<section id="welcome-wrapper" class="content-wrapper">
	<div id="welcome-card" class="row align-center">
		<div class="column text-center large-8">
			<h1>Hi, I'm Kendall Roth, a web developer currently studying at Conestoga College</h1>
		</div>
	</div>
</section>

<section id="portfolio-wrapper">
	<div id="portfolio-bar" class="row">
		<div class="column text-center">
			<p>Welcome to my online portfolio!</p>
		</div>
	</div>
</section>

<section id="summary-wrapper" class="content-wrapper">
	<div class="row">
		<div class="column small-12 text-center">
			<h2>What I Do</h2>
		</div>
	</div>
	<div class="row align-center">
		<div class="column small-11 large-9">
			<blockquote>I'm primarily passionate about responsive web design, focusing on clean and simple design. I&nbsp;strive to be a dedicated team player while adapting to different environments and tasks.<br /><em>&mdash; Kendall Roth</em></blockquote>
		</div>
	</div>
	<div id="summary-card" class="row align-center">
		<div class="column small-11 medium-4 align-self-stretch">
			<div class="summary-block" id="skill-analysis">
				<!-- <img src="/images/150x150.png" /> -->
				<img src="/images/skills/analysis.svg" />
				<span class="summary-header">Analysis</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</div>
		<div class="column small-11 medium-4 align-self-stretch">
			<div class="summary-block" id="skill-design">
				<!-- <img src="/images/150x150.png" /> -->
				<img src="/images/skills/design.svg" />
				<span class="summary-header">Design</span>
				<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
			</div>
		</div>
		<div class="column small-11 medium-4 align-self-stretch">
			<div class="summary-block" id="skill-development">
				<!-- <img src="/images/150x150.png" /> -->
				<img src="/images/skills/development.svg" />
				<span class="summary-header">Development</span>
				<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
		</div>
	</div>
</section>

<!-- TODO: Add project descriptions to slide up on hover and cover the image (also animate the bottom border colour) -->
<section id="work-wrapper" class="content-wrapper">
	<div class="row">
		<div class="column text-center" >
			<h2>Work</h2>
		</div>
	</div>
	<div class="row">
		<div class="column text-center">
			<p>Here's what I've been up to recently:</p>
		</div>
	</div>
	<div class="row align-center small-collapse medium-uncollapse">
		<div class="column small-12 medium-4">
			<div class="work-card">
				<!-- <img src="/images/300x200.png" /> -->
				<img src="/images/projects/UnaviaMedia_Project.png" />
				<p>UnaviaMedia<span>2016</span></p>
			</div>
		</div>
		<div class="column small-12 medium-4">
			<div class="work-card">
				<!-- <img src="/images/300x200.png" /> -->
				<img src="/images/projects/Captain_CPA_Project.png" />
				<p>CaptainCPA<span>2015</span></p>
			</div>
		</div>
	</div>
</section>

<section id="skills-wrapper" class="content-wrapper">
	<div class="row">
		<div class="column text-center">
			<h2>Skills</h2>
		</div>
	</div>
	<div class="row align-center">
		<div class="column small-10 medium-5">
			<div id="technologies-card" class="skill-card">
				<h3>Technologies</h3>
				<dl>
					<dt>Web Front-End</dt>
					<dd>HTML5, CSS3, JS, jQuery</dd>
					<dt>Web Back-End</dd>
					<dd>PHP, ASP.NET, MySQL</dd>
					<dt>Additional</dt>
					<dd>Gulp, SASS, Git</dd>
					<dt>Desktop</dt>
					<dd>C#, Java</dd>
					<dt>Operating Systems</dt>
					<dd>Linux, Windows</dd>
					<dt>Environments</dt>
					<dd>Vim, Visual Studio</dd>
				</dl>
			</div>
		</div>
		<div class="column small-10 medium-5">
			<div id="analysis-card" class="skill-card">
				<h3>Analysis &amp; Design</h3>
				<ul>
					<li>Prototyping</li>
					<li>Data Modeling</li>
					<li>Object Oriented Programming</li>
					<li>Development Cycle</li>
					<li>Responsive Design</li>
					<li>Project Planning</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section id="contact-wrapper">
	<div id="contact-bar" class="row">
		<div class="column text-center">
			<a href="mailto:kroth@unaviamedia.ca">Contact Me</a>
		</div>
	</div>
</section>

<?php require_once(FOOTER_FRAGMENT); ?>
