<?php
$PAGE_TITLE = "Delete Post";
require_once(FRAGMENT_HEADER);
?>

<section class="content__header--offset">
	<div class="row">
		<div class="column text-center">
			<h1>Delete Post</h1>
		</div>
	</div>
</section>

<section class="row align-center">
	<div class="column medium-10 large-8">
		<div class="callout warning">
			<div class="callout__header">
				Warning!
			</div>
			<div class="callout__body">
				Are you sure you want to delete this post?
			</div>
		</div>
		<hr class="hr--double" />
	</div>
</section>

<section class="row align-center">
	<div class="column medium-10 large-8">
		<?=$post->content ?>

		<form action="<?=URL_BLOG ?>/Delete" method="POST">
			<div class="row">
				<div class="column clearfix">
					<input type="hidden" name="id" value="<?=$post->id ?>" />
					<input type="submit" class="button alert float-right" name="deletePost" value="Confirm Delete" />
				</div>
			</div>
		</form>
	</div>
</section>

<?php
require_once(FRAGMENT_FOOTER);
?>
