<div class="row">
	<div class="col-12">
		<h5>Entities</h5>
		<hr>
		<ol>

			<?php foreach ($web->entities() as $entity): ?>
					<?php if (!empty($entity->info()['description'])): ?>
				<li>
					<h6><?php echo ucfirst($entity->info()['description']) ?></h6>

					 Confidence: <strong><?php echo number_format($entity->info()['score'] * 100, 2) ?>%</strong><br><br></li>
					<?php endif; ?>
			<?php endforeach ?>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<h5>Matched Images</h5>
		<hr>
		<ol>
			<?php if($web->matchingImages()):?>
				<?php foreach ($web->matchingImages() as $key => $matchImage): ?>
					<li>
						<a href="<?php echo ($matchImage->info()['url'])?>"><?= ($matchImage->info()['url']) ;?></a>
					</li>
				<?php endforeach ?>
			<?php endif;?>
		</ol>
		<br><hr><hr>
		<h5>Partially Matched Images</h5>
		<hr>
		<ol>
			<?php if($web->partialMatchingImages()):?>
				<?php foreach ($web->partialMatchingImages() as $key => $partialMatchingImage): ?>
					<li><a href="<?php echo ($partialMatchingImage->info()['url']) ?>"><?php echo ($partialMatchingImage->info()['url']) ?></a></li>
				<?php endforeach ?>
			<?php endif;?>
		</ol>
		<br><hr><hr>
		<h5>Pages</h5>
		<hr>
		<ol>
			<?php if($web->pages()):?>
				<?php foreach ($web->pages() as $key => $page): ?>
					<li><a href="<?= ($page->info()['url']) ?>"><?= ($page->info()['url']) ?></a></li>
				<?php endforeach ?>
			<?php endif;?>
		</ol>
	</div>
</div>