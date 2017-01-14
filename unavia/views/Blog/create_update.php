<?php
//Assume the page is for the Create view
$pageAction = $this->request->action == "edit" ? "Edit" : "Create";

$PAGE_TITLE = "$pageAction Post";
require_once(FRAGMENT_HEADER);
?>

<section class="content__header--offset">
	<div class="row">
		<div class="column text-center">
			<h1><?=$pageAction ?> Post</h1>
		</div>
	</div>
</section>

<?php
//Determine if post has been published or not
$publishedChecked = $post->published == "1" ? "checked" : "";
?>

<section class="row align-center">
	<div class="column medium-10 large-8">
		<form action="<?=URL_BLOG ?>/<?=$pageAction ?>" method="POST">
			<input type="hidden" name="id" value="<?=$post->id ?>" />
			<input type="hidden" name="date_created" value="<?=$post->dateCreated ?>" / />
			<div class="row">
				<div class="column">
					<label>Title
						<input type="text" id="postTitle" name="title" placeholder="Title" value="<?=$post->title ?>" />
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>Description
						<input type="text" id="postDescription" name="description" placeholder="Description" value="<?=$post->description ?>" />
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>Author
						<input type="text" id="postAuthor" name="author" placeholder="Author" value="<?=$post->author ?>"/>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>Content
						<textarea id="postContent" name="content" placeholder="Post Content"><?=$post->content ?></textarea>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label for="postPublished">Published</label>
					<div class="switch small">
						<input type="checkbox" class="switch-input" id="postPublished" name="published" value="1" <?=$publishedChecked ?> />
						<label for="postPublished" class="switch-paddle">
							<span class="show-for-sr">Published</span>
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="column">
					<input type="submit" class="button" name="submitPost" value="<?=$pageAction ?>" />
				</div>
			</div>
		</form>
	</div>
</section>

<?php
require_once(FRAGMENT_FOOTER);
?>
