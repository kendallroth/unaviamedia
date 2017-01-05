<?php
$PAGE_TITLE = "Blog | <?=$post->title ?>";
require_once(FRAGMENT_HEADER);
?>

<section class="page__wrapper">
	<div class="row">
		<div class="column text-center">
			<h1><?=$post->title ?></h1>
		</div>
	</div>
</section>

<section class="row align-center">
	<div class="column medium-10 large-8">
		<?=$post->content ?>
	</div>
</section>

<?php
require_once(FRAGMENT_FOOTER);
?>
