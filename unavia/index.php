<?php require_once("/var/www/constants.php"); ?>
<?php $PAGE_TITLE = "Home"; ?>
<?php require_once(HEADER_FRAGMENT); ?>

<?php
	$schoolStart = strtotime("2014-09-02");
	$today = time();
	$interval = $today - $schoolStart;
	$studentDays = floor($interval / (60 * 60 * 24));
?>

<div class="container-xlarge background-light-grey">
	<div class="row medium-10 medium-centered column text-center">
		<h1><span class="hover-secondary">Hello!</span> Welcome to my online&nbsp;<span class="hover-primary">portfolio</span></h1>
	</div>
</div>
<div class="container-medium background-dark-grey description-index">
	<div class="row small-centered column text-center">
		<p>Hi, I'm Kendall Roth. I am passionate about both web and mobile&nbsp;development.<br>Enjoy looking through my portfolio!</p>
	</div>
</div>
<div class="container-large background-light-grey index-development">
	<div class="row medium-10 medium-centered column">
		<div class="callout primary update-callout">
			<h5>Construction Update</h5>
			<p>This website is currently under construction after rebuilding from scratch. I wasn't satisfied with the state of my old site, and decided to start over. I'll be adding features as I have time between school and work, so check back regularly for updates! Additionally, check out the <a data-open="modal-roadmap">planned roadmap here</a>!</p>
			<p class="text-center"><em>The site is hand-made with HTML5, CSS3 (SASS), JS, and PHP</em></p>
		</div>
		<div class="reveal description-roadmap" id="modal-roadmap" data-reveal>
		<!-- <div class="description-roadmap"> -->
			<h2 class="text-center">Roadmap</h2>
			<div class="row">
				<div class="column text-center">
					<h4>High Priority</h4>
					<ul>
						<li><i class="fi-check"></i>Site structure implemented</li>
						<li><i class="fi-check"></i>Site styles created</li>
						<li><i class="fi-check"></i>Scroll-to-Top functionality</li>
						<li><i class="fi-x"></i>Add content to About page</li>
					</ul>
				</div>
				<div class="column text-center">
					<h4>Medium Priority</h4>
					<ul>
						<li><i class="fi-x"></i>Move to Laravel for MVC</li>
						<li><i class="fi-x"></i>Customize 404 error page</li>
						<li><i class="fi-check"></i>Create feature roadmap</li>
						<li><i class="fi-x"></i>Move portfolio online</li>
						<li><i class="fi-x"></i>Develop CMS for dev blogs</li>
						<li><i class="fi-x"></i>Add a build process to Gulp</li>
						<li><i class="fi-x"></i>Add navigation menu when needed</li>
						<li><i class="fi-x"></i>Implement a staging area</li>
					</ul>
				</div>
				<div class="column text-center">
					<h4>Low Priority</h4>
					<ul>
						<li><i class="fi-check"></i>Add basic fun facts</li>
						<li><i class="fi-check"></i>Update footer social icons</li>
						<li><i class="fi-x"></i>Create vector backgrounds</li>
						<li><i class="fi-clock"></i>Continue updating styles</li>
					</ul>
				</div>
			</div>
			<button class="close-button" data-close="" aria-label="Close modal" type="button">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="row development-types">
			<div class="medium-4 column text-center">
				<img src="<?=ICONS?>/Web-Development-Icon.png" width="100" alt="Web Development">
				<h5>Web Development</h5>
				<div>Knowledge of both front-end and back-end technologies, including responsive design and MVC frameworks.</div>
			</div>
			<div class="medium-4 column text-center">
				<img src="<?=ICONS?>/Mobile-Development-Icon.png" width="100" alt="Mobile Development">
				<h5>Mobile Development</h5>
				<div>Currently learning about hybrid app development and mobile application design.</div>
			</div>
			<div class="medium-4 column text-center">
				<img src="<?=ICONS?>/Software-Development-Icon.png" width="100" alt="Software Development">
				<h5>Software Development</h5>
				<div>Capable of building basic software solutions for various purposes, ranging from data management to simple games.</div>
			</div>
		</div>
	</div>
</div>
<div class="container-large background-blue index-skills">
	<div class="row medium-10 medium-centered column">
		<h2 class="text-center">Skills</h2>
	</div>
	<div class="row small-11 small-centered medium-10 column">
		<div class="row skills-container">
			<div class="column">
				<h3 class="text-center">Languages</h3>
				<hr>
			</div>
			<div class="medium-4 large-3 column">
				<div class="skill-card">
					<div class="progress"><div class="progress-meter" style="width: 90%;"></div></div>
					<h5>HTML</h5>
				</div>
			</div>
			<div class="medium-4 large-3 column">
				<div class="skill-card">
					<div class="progress"><div class="progress-meter" style="width: 85%;"></div></div>
					<h5>CSS</h5>
				</div>
			</div>
			<div class="medium-4 large-3 column">
				<div class="skill-card">
					<div class="progress"><div class="progress-meter" style="width: 75%;"></div></div>
					<h5>C#</h5>
				</div>
			</div>
			<div class="medium-4 large-3 column">
				<div class="skill-card">
					<div class="progress"><div class="progress-meter" style="width: 60%;"></div></div>
					<h5>JavaScript</h5>
				</div>
			</div>
			<div class="medium-4 large-3 column">
				<div class="skill-card">
					<div class="progress"><div class="progress-meter" style="width: 45%;"></div></div>
					<h5>PHP</h5>
				</div>
			</div>
			<div class="medium-4 large-3 column">
				<div class="skill-card">
					<div class="progress"><div class="progress-meter" style="width: 70%;"></div></div>
					<h5>SQL</h5>
				</div>
			</div>
			<div class="medium-4 large-3 column">
				<div class="skill-card">
					<div class="progress"><div class="progress-meter" style="width: 55%;"></div></div>
					<h5>SASS</h5>
				</div>
			</div>
			<div class="medium-4 large-3 column end">
				<div class="skill-card">
					<div class="progress"><div class="progress-meter" style="width: 15%;"></div></div>
					<h5>Java</h5>
				</div>
			</div>
		</div>
	</div>
	<div class="row small-11 small-centered medium-10 column">
		<div class="row skills-container no-vmargin">
			<div class="column">
				<h3 class="text-center">Concepts</h3>
				<hr>
			</div>
			<div class="medium-6 large-3 column">
				<div class="skill-card">
					<h5>Mobile-First Design</h5>
				</div>
			</div>
			<div class="medium-6 large-3 column">
				<div class="skill-card">
					<h5>Agile Methodologies</h5>
				</div>
			</div>
			<div class="medium-6 large-3 column">
				<div class="skill-card">
					<h5>Software QA</h5>
				</div>
			</div>
			<div class="medium-6 large-3 column end">
				<div class="skill-card">
					<h5>Object Oriented Programming</h5>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-large background-dark-grey index-stats">
	<div class="row medium-10 medium-centered column">
		<div class="row">
			<div class="medium-3 column stat">
				<h3 class="secondary-color"><?=$studentDays ?></h3>
				<h5>Days as a Student</h5>
			</div>
			<div class="medium-3 column stat">
				<h3 class="primary-color">0</h3>
				<h5>Coffees Drunk</h5>
			</div>
			<div class="medium-3 column stat">
				<h3 class="quanternary-color">112</h3>
				<h5>Sleepless Hours</h5>
			</div>
			<div class="medium-3 column stat no-vmargin">
				<h3 class="tertiary-color">4.0</h3>
				<h5>GPA</h5>
			</div>
		</div>
	</div>
</div>
<div class="container-large background-green quick-contact">
	<div class="row medium-10 medium-centered column text-center">
		<h3>Want to quickly <a href="#">contact</a> me?</h3>
		<a href="mailto:kroth@unaviamedia.ca" class="button-contact">Contact</a>
	</div>
</div>

<?php require_once(FOOTER_FRAGMENT); ?>
