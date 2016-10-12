<?php
require_once("/var/www/constants.php");
$PAGE_TITLE = "Home";
require_once(HEADER_FRAGMENT);
?>

<section id="welcome-wrapper" class="content-wrapper">
	<div id="welcome-card" class="row align-center align-middle">
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
				<img src="/images/skills/analysis.svg" alt="Analysis" />
				<span class="summary-header">Analysis</span>
				<p>Careful analysis, including data modeling and project management, is a necessity for project planning and plays a vital role in my work.</p>
			</div>
		</div>
		<div class="column small-11 medium-4 align-self-stretch">
			<div class="summary-block" id="skill-design">
				<img src="/images/skills/design.svg" alt="Design" />
				<span class="summary-header">Design</span>
				<p>While not a designer, I do enjoy creating my own content and illustrations while striving to follow a simple and minimalistic approach.</p>
			</div>
		</div>
		<div class="column small-11 medium-4 align-self-stretch">
			<div class="summary-block" id="skill-development">
				<img src="/images/skills/development.svg" alt="Development" />
				<span class="summary-header">Development</span>
				<p>The steps in the development cycle&mdash;whether front-end, back-end, database, documentation, etc.&mdash;all receive the same careful attention to detail.</p>
			</div>
		</div>
	</div>
</section>

<section id="project-wrapper" class="content-wrapper">
	<!-- Finished Projects -->
	<div id="projects" class="project-section">
		<div class="row">
			<div class="column text-center" >
				<h2>Projects</h2>
				<p>Here's what I've been up to recently:</p>
			</div>
		</div>
		<div class="row align-center small-collapse medium-uncollapse">
			<div class="column small-12 medium-5">
				<a href="https://github.com/UnaviaMedia/UnaviaMedia" class="project-card" target="_blank">
					<img src="/images/projects/UnaviaMedia_Site.png" />
					<p><strong>UnaviaMedia Site</strong><span>2016</span></p>
				</a>
			</div>
			<div class="column small-12 medium-5">
				<a href="https://github.com/UnaviaMedia/CaptainCPA" class="project-card" target="_blank">
					<img src="/images/projects/Captain_CPA.png" />
					<p><strong>CaptainCPA</strong><span>2015</span></p>
				</a>
			</div>
		</div>
	</div>
	<!-- Planned projects -->
	<div id="plans" class="project-section">
		<div class="row">
			<div class="column text-center">
				<h2>Upcoming Plans</h2>
				<p>And here's a look ahead at what's coming!</p>
			</div>
		</div>
		<div class="row align-center small-collapse medium-uncollapse">
			<div class="column small-12 medium-5">
				<a href="https://github.com/UnaviaMedia/CommitteeHelp" class="project-card" target="_blank">
					<img src="/images/projects/CommitteeFlow.png" />
					<p><strong>CommitteeHelp</strong><span>coming soon</span></p>
				</a>
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
		<div class="column small-10 medium-5 large-4">
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
		<div class="column small-10 medium-5 large-4">
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

<section id="quick-contact-wrapper">
	<div id="quick-contact-bar" class="row">
		<div class="column text-center">
			<a href="mailto:kroth@unaviamedia.ca">Contact Me</a>
		</div>
	</div>
</section>

<?php require_once(FOOTER_FRAGMENT); ?>
