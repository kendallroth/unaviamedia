<?php
$PAGE_TITLE = "Blog";
require_once(FRAGMENT_HEADER);
?>

<section class="content__header--offset">
	<div class="row">
		<div class="column text-center">
			<h1>Blog</h1>
		</div>
	</div>
</section>

<section class="row align-center">
	<div class="column medium-10 large-8">
		<?php $this->displayMessage(); ?>
	</div>
</section>

<section class="row align-center">
	<!-- Blog listing -->
	<div class="column small-12 medium-9 large-8">
		<?php foreach($posts as $post) { ?>
			<div class="post-card">
				<div class="post-card__header">
					<span class="post-card__title">
						<a href="<?=URL_BLOG ?>/<?=$post->id ?>/<?=$post->title ?>"><?=$post->title ?></a>
					</span>
					<span class="post-card__info clearfix">
						<span class="post-card__actions">
							<a href="<?=URL_BLOG ?>/Edit/<?=$post->id ?>/<?=$post->title ?>" class="post-card__actions--edit" >
								<i class="fi-pencil"></i>
							</a>
							<a href="<?=URL_BLOG ?>/Delete/<?=$post->id ?>/<?=$post->title ?>" class="post-card__actions--delete" >
								<i class="fi-trash"></i>
							</a>
						</span>
						<?=$post->author ?> | <?=date_format(date_create($post->dateCreated), "Y-M-d") ?>
					</span>
				</div>
				<div class="post-card__body">
					<?=$post->description ?>
				</div>
			</div>
		<?php } ?>
	</div>
	<!-- Blog archive and controls -->
	<div class="column small-12 medium-2 large-3">
		<div class="row">
			<div class="column">
				<div class="blog__control">
					<div class="control__header">
						<span>Blog Control</span>
					</div>
					<div class="control__content">
						<a href="<?=URL_BLOG ?>/Create" class="button expanded">Create Post</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="column">
				<table class="blog__control">
					<thead>
						<th>Title</th>
					</thead>
					<tbody>
						<?php foreach($posts as $post) { ?>
						<tr>
							<td>
								<a href="<?=URL_BLOG?>/<?=$post->id ?>/<?=$post->title ?>">
									<?=$post->title ?>
								</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<?php
require_once(FRAGMENT_FOOTER);
?>
