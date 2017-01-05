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
	<div class="column medium-10 large-8">
		<table>
			<thead>
				<th>Title</th>
				<th>Description</th>
			</thead>
			<tbody>
				<?php foreach($posts as $post) { ?>
				<tr>
					<td>
						<a href="<?=URL_BLOG?>/<?=$post->id ?>/<?=$post->title ?>"><?=$post->title ?></a>
					</td>
					<td><?=$post->description ?></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</section>

<?php
require_once(FRAGMENT_FOOTER);
?>
