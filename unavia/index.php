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
				<a href="https://github.com/UnaviaMedia/UnaviaMedia" class="card--project" target="_blank">
					<img src="/images/projects/UnaviaMedia_WebSite.png" />
					<p><strong>UnaviaMedia Site</strong><span>2016</span></p>
				</a>
			</div>
			<div class="column small-12 medium-5">
				<a href="https://github.com/UnaviaMedia/CaptainCPA" class="card--project" target="_blank">
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
				<a href="https://github.com/UnaviaMedia/CommitteeHelp" class="card--project" target="_blank">
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
			<div id="miscellaneous-card" class="card--skill">
				<h3>Miscellaneous</h3>
				<ul>
					<li>GitHub&ensp;<small><em>Project Management</em></small></li>
					<li>BugZilla&ensp;<small><em>Issue Tracking</em></small></li>
					<li>Cloud 9&ensp;<small><em>Online IDE</em></small></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section id="employment" class="section--employment content__wrapper">
	<div class="row">
		<div class="column text-center">
			<h2>Employment</h2>
		</div>
	</div>
	<div class="row align-center">
		<div class="column small-10 medium-8">
			<ul class="employment-cards">
				<li class="employment__card">
					<div class="employment__header">
						<h3>SAP Labs</h3>
						<span class="employment__type">(Co-op)</span>
						<span class="employment__date">2017</span>
					</div>
					<div class="employment__description">
						<p>SAP is a market leader in enterprise application software, with applications and services enabling organizations to operate profitably while continuously adapting to helpful analytics. The Emerging Technologies department is a dedicated team focused on innovating how businesses can collect these data insights and act upon them. From IoT to edge computing and distributed data to mobile solutions, the team deals with a wide variety of technologies on a daily basis.</p>
						<p>The team spent most of the term developing a custom edge processing solution designed for IoT data analysis simplification. I was able to spend some time and gain experience in each aspect of the project, from planning and architecture to development and deployment strategies. The scope of the project and the small size of the team meant that each day brought a new challenge and responsibility; in fact, I'm still doing new things on a daily basis!</p>
					</div>
					<div class="employment__summary">
						<ol>
							<li>Create and maintain database schemas and procedures for data management and maintenance</li>
							<li>Work closely with local and remote team to develop new features/fixes in an Agile environment</li>
							<li>Update web interface for new features and streaming configuration options</li>
							<li>Utilize regression and performance testing to verify continual system integrity</li>
							<li>Modify existing data streaming engine to handle additional use cases</li>
						</ol>
					</div>
				</li>
				<li class="employment__card">
					<div class="employment__header">
						<h3>Netsweeper</h3>
						<span class="employment__type">(Co-op)</span>
						<span class="employment__date">2016</span>
					</div>
					<div class="employment__description">
						<p>Netsweeper Inc. is a world leader in web filtering and management, best known for their real-time web content categorization technology. Netsweeper offers a highly specialized product in a competitive field, which causes their customer feedback to be quickly analyzed and integrated into the development cycle.</p>
						<p>I worked primarily as a member of the Web Development Team during my eight month co-op term at Netsweeper, responsible for applying bug fixes as well as implementing new features within the web portal. Part of my time was also spent in a Quality Assurance role, ensuring that the web interface remained stable when testing new features and fixes. I also worked briefly with the UI/UX designer to update several small portions of the web interface for increased consistency and user experience.</p>
					</div>
					<div class="employment__summary">
						<ol>
							<li>Analyze and apply fixes to bugs while working in a sprint-based development cycle</li>
							<li>Develop, integrate, and document new features as specified by team supervisor</li>
							<li>Assist with quality assurance testing involving regression testing and manual test cases</li>
							<li>Collaborate with other team members on projects and changes using source control</li>
							<li>Work with UI/UX designer to enhance user experience in the web interface</li>
						</ol>
					</div>
				</li>
				<li class="employment__card">
					<div class="employment__header">
						<h3>Conestoga College</h3>
						<span class="employment__type">(Work Study)</span>
						<span class="employment__date">2015&ndash;2016</span>
					</div>
					<div class="employment__description">
						<p>The Conestoga College Web Development Team is the main development team for the corporate Conestoga site as well as most related internal and external sites. The team is primarily responsible for content updates, architecting site structure, maintaining various databases, and performing other miscellaneous tasks to keep the sites up and running smoothly.	</p>
						<p>I spent the summer months of 2015 as a full-time member of the Web Development Team, performing maintenance and page updates, before moving into a part-time position for the following two semesters. Part of this time was spent as lead developer on another site being developed for an outside organization, where I designed and prototyped several requested features before submitting them for client approval.</p>
					</div>
					<div class="employment__summary">
						<ol>
							<li>Responsible for creating and maintaining web pages and content provided by project manager</li>
							<li>Interface with clients to ensure finished product meets their expectations</li>
							<li>Ensure design and content of web pages meet usability and AODA accessibility standards</li>
							<li>Design and implement several features for an external project managed by Conestoga College</li>
						</ol>
					</div>
				</li>
			</ul>
		</div>
	</div>
</section>

<section id="quick-contact" class="section--quick-contact">
	<div id="quick-contact-bar" class="row">
		<div class="column text-center">
			<a href="mailto:kroth@unaviamedia.ca">Contact Me</a>
		</div>
	</div>
</section>

<?php require_once(FOOTER_FRAGMENT); ?>
