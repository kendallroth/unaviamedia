<?php
require_once("/var/www/constants.php");
$PAGE_TITLE = "About Me";
require_once(HEADER_FRAGMENT);
?>

<section id="about" class="about__wrapper">
	<div class="row align-center">
		<div class="column medium-10 large-8">
			<div class="row">
				<div class="column small-12 text-center">
					<h1>About Me</h1>
				</div>
			</div>
			<div class="row about__subsection about__introduction">
				<div class="column paragraph-block">
					<h2>Introduction</h2>
					<p>Hi, I'm Kendall Roth! I am currently pursuing my dream as a developer as a student at Conestoga College for Computer Programming/Analysis. My primary passion involves learning and applying new concepts to my work, and I enjoy facing challenges head on. One of my goals is to become a better developer through constant learning and experimentation; a goal that I also try to apply to life in general.</p>
					<blockquote class="text-center no-border">
						Continuous effort&thinsp;&ndash;&thinsp;not strength or intelligence&thinsp;&ndash;&thinsp;is the key to&nbsp;unlocking&nbsp;our&nbsp;potential.<br />
						<cite>Winston Churchill</cite>
					</blockquote>
					<p>I'm passionate about web design and development, focusing primarily on simple and modern design/functionality. No matter what I am doing, I try to produce clean and maintainable code while still being committed to producing quality work. On a personal level, I am a dedicated team player who enjoys working in a collaborative environment and forming relationships within a team.</p>
				</div>
			</div>
			<div class="row about__subsection about__interests">
				<div class="column paragraph-block">
					<h2>Interests</h2>
					<p>In my spare time I enjoy playing around with various technologies or simply experiment with my current knowledge by trying to apply it in new ways. This site is a primary example, as I update it frequently with interesting (to me) discoveries/ideas that I come across in my daily work or side experimentation.</p>
					<p>Aside from my inner "geek zone", my interests also include unwinding through reading and choral music. Reading (along with colouring) plays a very active role in my life, and I can often be found curled up on a couch with a book. Choral music offers another form of relaxation and I was recently privileged to sing with the Faith Builders Chorale on their British Isles Tour in 2015, as well as several other local choirs (<a href="//villagevoicescchoir.weebly.com/" target="_blank">Village Voices</a>, Menno Mass Singers, youth choirs, etc).</p>
				</div>
			</div>
			<div class="row about__subsection about__objective">
				<div class="column">
					<h2>Objective</h2>
					<p>To obtain a coop position in a environment where my passion for development and learning can be used to solve business problems effectively.</p>
				</div>
			</div>
			<div class="row about__subsection about__education">
				<div class="column">
					<h2>Education</h2>
					<h3>
						<a href="//www.conestogac.on.ca/fulltime/computer-programmer-analyst-optional-co-op" target="_blank">Computer Programmer/Analyst</a>
						<span class="date--right">2014&mdash;present</span>
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
			<div class="row about__subsection about__employment">
				<div class="column">
				<h2>Employment</h2>
					<h3>
						<a href="//www.netsweeper.com/" target="_blank">Web Developer</a>
						<span class="employment-type">(Coop)</span>
						<span class="date--right">2016&mdash;Present</span>
					</h3>
					<p><em>Netsweeper Inc, Kitchener, ON</em></p>
					<ul>
						<li>Analyze and apply fixes to bugs while working in a sprint-based development cycle under source control.</li>
						<li>Responsible for developing, integrating and documenting new features as specified by team supervisor.</li>
						<li>Assist with quality assurance testing on product involving writing unit tests and running manual tests.</li>
					</ul>
					<h3>
						<a href="//www.conestogac.on.ca" target="_blank">Web Developer</a>
						<span class="employment-type">(Work Study)</span>
						<span class="date--right">2015&mdash;2016</span>
					</h3>
					<p><em>Conestoga College, Kitchener, ON</em></p>
					<ul>
						<li>Responsible for creating, updating and maintaining web pages based on content provided by Project Manager and clients.</li>
						<li>Ensure design and content of web pages meet usability and accessibility standards.</li>
						<li>Interfac with clients through email and face-to-face to ensure finished product meets their expectations.</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require_once(HTML_ROOT . "/controllers/contact_controller.php"); ?>

<section id="contact" class="contact__wrapper">
	<div class="row">
		<div class="column text-center">
			<h2>Contact Me</h2>
			<p>Feel free to contact me with any questions&nbsp;or&nbsp;comments!</p>
		</div>
	</div>
	<div class="row align-center">
		<div class="column medium-6 large-5">
			<form action="<?=ABOUT_URL?>#contact" method="POST">
				<div class="row form__row">
					<div class="column">
						<label for="contactName" class="hide">Name</label>
						<input type="text" id="contactName" name="contactName" placeholder="Name" value="<?= $contactName ?>" />
					</div>
				</div>
				<div class="row form__row">
					<div class="column">
						<label for="contactEmail" class="hide">Email</label>
						<input type="text" id="contactEmail" name="contactEmail" placeholder="Email" value="<?= $contactEmail ?>" />
					</div>
				</div>
				<div class="row form__row">
					<div class="column">
						<label for="contactSubject" class="hide">Subject</label>
						<input type="text" id="contactSubject" name="contactSubject" placeholder="Subject" value="<?= $contactSubject ?>" />
					</div>
				</div>
				<div class="row form__row">
					<div class="column">
						<label for="contactComments" class="hide">Comments</label>
						<textarea  id="contactComments" name="contactComments" placeholder="Comments"><?= $contactComments ?></textarea>
					</div>
				</div>
				<div class="row form__row">
					<div class="column text-center">
						<div class="g-recaptcha" data-sitekey="<?=RECAPTCHA_SITE?>"></div>
					</div>
				</div>
				<?php //Output the status of the form submission
				if (isEmpty($messageHTML) == false) {
					echo "<div class='row form__row' data-closable><div class='column'>$messageHTML</div></div>";
				}
				?>
				<div class="row">
					<div class="column text-center">
						<input type="submit" id="contactSubmit" name="contactSubmit" value="Send Message" />
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<?php require_once(FOOTER_FRAGMENT); ?>
