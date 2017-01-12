<?php
$PAGE_TITLE = "Edit Post";
require_once(FRAGMENT_HEADER);
?>

<section class="content__header--offset">
	<div class="row">
		<div class="column text-center">
			<h1>Edit Post</h1>
		</div>
	</div>
</section>

<?php
//Determine if post has been published or not
$publishedChecked = $post->published == "1" ? "checked" : "";
?>

<section class="row align-center">
	<div class="column medium-10 large-8">
		<form action="<?=URL_BLOG ?>/Edit" method="POST">
			<input type="hidden" name="id" value="<?=$post->id ?>" />
			<input type="hidden" name="date_created" value="<?=$post->dateCreated ?>" / />
			<div class="row">
				<div class="column">
					<input type="text" id="title" name="title" placeholder="Title" value="<?=$post->title ?>" />
				</div>
			</div>
			<div class="row">
				<div class="column">
					<input type="text" id="description" name="description" placeholder="Description" value="<?=$post->description ?>" />
				</div>
			</div>
			<div class="row">
				<div class="column">
					<input type="text" id="author" name="author" placeholder="Author" value="<?=$post->author ?>"/>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<textarea id="content" name="content" placeholder="Post Content"><?=$post->content ?></textarea>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<input type="text" id="categories" name="categories" placeholder="Categories" />
				</div>
			</div>
			<div class="row">
				<div class="column">
					<input type="checkbox" id="published" name="published" value="1" <?=$publishedChecked ?> />
				</div>
			</div>
			<div class="row">
				<div class="column">
					<input type="submit" class="button" name="submitPost" value="Update" />
				</div>
			</div>
		</form>
	</div>
</section>

<?php
require_once(FRAGMENT_FOOTER);
?>
