<?php
require_once("/var/www/constants.php");
$PAGE_TITLE = "Home";
require_once(HEADER_FRAGMENT);
?>

<section id="welcome" class="section--welcome content__wrapper">
	<div id="welcome-card" class="row align-center align-middle">
		<div class="column text-center large-8">
			<h1>Hi, I'm Kendall Roth, a web developer currently studying at Conestoga College</h1>
		</div>
	</div>
</section>

<section id="portfolio" class="section--portfolio">
	<div id="portfolio-bar" class="row">
		<div class="column text-center">
			<p>Welcome to my online portfolio!</p>
		</div>
	</div>
</section>

<section id="summary" class="section--summary content__wrapper">
	<div class="row">
		<div class="column small-12 text-center">
			<h2>What I Do</h2>
		</div>
	</div>
	<div class="row align-center">
		<div class="column small-11 large-9">
			<blockquote>
				I'm passionate about web design and development, focusing on clean and simple design/functionality. I&nbsp;strive to be a dedicated team player while adapting to different environments and tasks.<br />
				<cite>Kendall Roth</cite>
			</blockquote>
		</div>
	</div>
	<div id="summary-card" class="row align-center">
		<div class="column small-11 medium-4 align-self-stretch">
			<div class="summary__block" id="skill-analysis">
				<img src="/images/skills/analysis.svg" alt="Analysis" />
				<span class="summary__header">Analysis</span>
				<p>Careful analysis, including data modeling and project management, is a necessity for project planning and plays a vital role in my work.</p>
			</div>
		</div>
		<div class="column small-11 medium-4 align-self-stretch">
			<div class="summary__block" id="skill-design">
				<img src="/images/skills/design.svg" alt="Design" />
				<span class="summary__header">Design</span>
				<p>While not a designer, I do enjoy creating my own content and illustrations while striving to follow a simple and minimalistic approach.</p>
			</div>
		</div>
		<div class="column small-11 medium-4 align-self-stretch">
			<div class="summary__block" id="skill-development">
				<img src="/images/skills/development.svg" alt="Development" />
				<span class="summary__header">Development</span>
				<p>The steps in the development cycle&mdash;whether front-end, back-end, database, documentation, etc.&mdash;all receive the same careful attention to detail.</p>
			</div>
		</div>
	</div>
</section>

<section id="projects" class="section--projects content__wrapper">
	<!-- Finished Projects -->
	<div id="recent-projects" class="projects__section">
		<div class="row">
			<div class="column text-center" >
				<h2>Projects</h2>
				<p>Here's what I've been up to recently:</p>
			</div>
		</div>
		<div class="row align-center small-collapse medium-uncollapse">
			<div class="column small-12 medium-5">
				<a href="https://github.com/Unavia/UnaviaMedia" class="card--project" target="_blank">
					<img src="/images/projects/UnaviaMedia_WebSite.png" />
					<p><strong>UnaviaMedia Site</strong><span>2016</span></p>
				</a>
			</div>
			<div class="column small-12 medium-5">
				<a href="https://github.com/KendallRoth/CaptainCPA" class="card--project" target="_blank">
					<img src="/images/projects/Captain_CPA.png" />
					<p><strong>CaptainCPA</strong><span>2015</span></p>
				</a>
			</div>
		</div>
	</div>
	<!-- Planned projects -->
	<div id="upcoming-projects" class="projects__section">
		<div class="row">
			<div class="column text-center">
				<h2>Upcoming Plans</h2>
				<p>And here's a look ahead at what's coming!</p>
			</div>
		</div>
		<div class="row align-center small-collapse medium-uncollapse">
			<div class="column small-12 medium-5">
				<a href="https://github.com/Unavia/CommitteeHelp" class="card--project" target="_blank">
					<img src="/images/projects/CommitteeHelp.png" />
					<p><strong>CommitteeHelp</strong><span>coming soon</span></p>
				</a>
			</div>
		</div>
	</div>
</section>

<section id="skills" class="section--skills content__wrapper">
	<div class="row">
		<div class="column text-center">
			<h2>Skills</h2>
		</div>
	</div>
	<div class="row align-center">
		<div class="column small-10 medium-5 large-4 align-stretch">
			<div id="technologies-card" class="card--skill">
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
					<dd>Vim, Visual Studio, Atom</dd>
				</dl>
			</div>
		</div>
		<div class="column small-10 medium-5 large-4 align-stretch">
			<div id="analysis-card" class="card--skill">
				<h3>Analysis &amp; Design</h3>
				<ul>
					<li>Prototyping</li>
					<li>Data Modeling</li>
					<li>Object Oriented Programming</li>
					<li>Development Cycle</li>
					<li>Responsive Design</li>
					<li>Project Planning</li>
				</ul>
			</div><br class="show-for-medium" />
			<div id="frameworks-card" class="card--skill">
				<h3>Frameworks</h3>
				<ul>
					<li>GitHub&ensp;<small><em>Project Management</em></small></li>
					<li>BugZilla&ensp;<small><em>Issue Tracking</em></small></li>
					<li>Cloud 9&ensp;<small><em>Online IDE</em></small></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section id="quick-contact" class="section--quick-contact">
	<div id="quick-contact-bar" class="row">
		<div class="column text-center">
			<a href="mailto:kroth@unavia.ca">Contact Me</a>
		</div>
	</div>
</section>

<?php require_once(FOOTER_FRAGMENT); ?>
