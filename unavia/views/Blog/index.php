<?php
$PAGE_TITLE = "Blog";
require_once(FRAGMENT_HEADER);
?>

<section class="page__wrapper">
	<div class="row">
		<div class="column text-center">
			<h1>Blog</h1>
		</div>
	</div>
</section>

<section class="row align-center">
	<div class="column small-12 medium-9 large-8">
		<?php foreach($posts as $post) { ?>
			<div class="post__card">
				<div class="card__header">
					<span class="card__title">
						<a href="<?=URL_BLOG?>/<?=$post->id ?>/<?=$post->title ?>"><?=$post->title ?></a>
					</span>
					<span class="card__info clearfix">
						<?=$post->author ?> | <?=date_format(date_create($post->dateCreated), "Y-M-d") ?>
					</span>
				</div>
				<div class="card__body">
					<?=$post->description ?>
				</div>
			</div>
		<?php } ?>
	</div>
	<!-- TODO: Create blog archive tool -->
	<div class="column small-12 medium-2 large-3">
		<table>
			<thead>
				<th>Title</th>
			</thead>
			<tbody>
				<?php foreach($posts as $post) { ?>
				<tr>
					<td>
						<a href="<?=URL_BLOG?>/<?=$post->id ?>/<?=$post->title ?>"><?=$post->title ?></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</section>

<?php
require_once(FRAGMENT_FOOTER);
?>
