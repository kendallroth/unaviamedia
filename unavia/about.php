<?php
require_once("/var/www/constants.php");
$PAGE_TITLE = "About Me";
require_once(HEADER_FRAGMENT);
?>

<section id="about-wrapper">
	<div class="row">
		<div class="column small-12 text-center">
			<h1>About Me</h1>
		</div>
	</div>
	<div class="row about-subsection about-introduction">
		<div class="column">
			<h2>Introduction</h2>
			<p>Hi, my name is Kendall Roth. I am currently pursuing my dream as a developer by attending Conestoga College for Computer Programming/Analysis. I am passionate about learning and applying new concepts to my work, and enjoy facing a challenge head on. One of my career goals is to become a better developer through constant learning and experimentation; a goal that I also apply to life in general.</p>
		</div>
	</div>
	<div class="row about-subsection about-interests">
		<div class="column">
			<h2>Interests</h2>
			<p>Aside from my inner "geek zone", my interests also include relaxation through reading and choral music.</p>
		</div>
	</div>
	<div class="row about-subsection about-objective">
		<div class="column">
			<h2>Objective</h2>
			<p>To obtain a coop position in a environment where my passion for development and learning can be used to solve business problems effectively.</p>
		</div>
	</div>
	<div class="row about-subsection about-education">
		<div class="column">
			<h2>Education</h2>
			<h3>
				<a href="//www.conestogac.on.ca/fulltime/computer-programmer-analyst-optional-co-op" target="_blank">Computer Programmer/Analyst</a>
				<span class="date-right">2014&mdash;present</span>
			</h3>
			<p>Conestoga College, Kitchener, ON</p>
			<ul>
				<li>Expected graduation date: April 2018</li>
				<li>Maintaining a 4.0 GPA</li>
			</ul>

			<p><u>Program Highlights</u></p>
			<ul>
				<li>Microsoft and Java Web Technologies</li>
				<li>Object Oriented Game Design</li>
				<li>Systems Analysis and Design</li>
				<li>Software Quality Assurance</li>
			</ul>
		</div>
	</div>
	<div class="row about-subsection about-employment">
		<div class="column">
			<h2>Employment</h2>

			<h3>
				<a href="//www.netsweeper.com/">Web Developer</a>
				<span class="employment-type">(Coop)</span>
			</h3>
			<p>Netsweeper Inc, Kitchener, ON<span class="date-right">2016&mdash;Present</span></p>
			<ul>
				<li>Analyze and apply fixes to bugs while working in a sprint-based development cycle under source control.</li>
				<li>Responsible for developing, integrating and documenting new features as specified by team supervisor.</li>
				<li>Assist with quality assurance testing on product involving writing unit tests and running manual tests.</li>
			</ul>

			<h3>
				<a href="//www.conestogac.on.ca">Web Developer</a>
				<span class="employment-type">(Work Study)</span>
			</h3>
			<p>Conestoga College, Kitchener, ON<span class="date-right">2015&mdash;2016</span></p>
			<ul>
				<li>Responsible for creating, updating and maintaining web pages based on content provided by Project Manager and clients.</li>
				<li>Ensure design and content of web pages meet usability and accessibility standards.</li>
				<li>Interfac with clients through email and face-to-face to ensure finished product meets their expectations.</li>
			</ul>
		</div>
	</div>
</section>

<section id="contact-wrapper">

</section>

<?php require_once(FOOTER_FRAGMENT); ?>
