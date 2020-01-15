<div class="row">
	<div class="col-6">
				<?php $malayID = false; ?>
				<?php $isID = false; ?>
		<ol>

			<?php foreach ($web->entities() as $entity): ?>
					<?php if (!empty($entity->info()['description'])): ?>
						<?php
							$description = $entity->info()['description'];

							if (strpos(strtolower($description), 'identity') !== false) {
							    $isID = 1;
							}

							if (strpos(strtolower($description), 'malaysia') !== false) {
							    $malayID = 1;
							}
						?>
				<li>
					<h6><?php echo ucfirst($entity->info()['description']) ?></h6>

					 Confidence: <strong><?php echo number_format($entity->info()['score'] * 100, 2) ?>%</strong><br><br></li>
					<?php endif; ?>
			<?php endforeach ?>
		</ol>
	</div>
	<div class="col-lg-6">
		<div>
			<?php if($isID == 1):?>
			<h4>IS ID CARD ? </h4><h4 style="color: green;">YES</h4>
			<?php else:?>
			<h4>IS ID CARD ? </h4><h4 style="color: red;">NO</h4>
			<?php endif;?>
			<?php if($malayID == 1):?>
			<h4>IS MALAYSIAN ID CARD ? </h4><h4 style="color: green;">YES</h4>
			<?php else:?>
			<h4>IS MALAYSIAN ID CARD ? </h4><h4 style="color: red;">NO</h4>
			<?php endif;?>
		</div>
	</div>
	<hr>
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