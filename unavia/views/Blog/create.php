<?php
$PAGE_TITLE = "Create Post";
require_once(FRAGMENT_HEADER);
?>

<section class="content__header--offset">
	<div class="row">
		<div class="column text-center">
			<h1>Create Post</h1>
		</div>
	</div>
</section>

<section class="row align-center">
	<div class="column medium-10 large-8">
		<form action="<?=URL_BLOG ?>/Create" method="POST">
			<div class="row">
				<div class="column">
					<input type="text" id="title" name="title" placeholder="Title" />
				</div>
			</div>
			<div class="row">
				<div class="column">
					<input type="text" id="description" name="description" placeholder="Description" />
				</div>
			</div>
			<div class="row">
				<div class="column">
					<input type="text" id="author" name="author" placeholder="Author" />
				</div>
			</div>
			<div class="row">
				<div class="column">
					<textarea id="content" name="content" placeholder="Post Content"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<input type="text" id="categories" name="categories" placeholder="Categories" />
				</div>
			</div>
			<div class="row">
				<div class="column">
					<input type="checkbox" id="published" name="published" value="1" />
				</div>
			</div>
			<div class="row">
				<div class="column">
					<input type="submit" class="button" name="submitPost" value="Create" />
				</div>
			</div>
		</form>
	</div>
</section>

<?php
require_once(FRAGMENT_FOOTER);
?>
