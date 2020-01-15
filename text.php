<div class="row">
	<div class="col-12">
		<ol>
			<?php if ($text): ?>
				<?php foreach ($text as $key => $word): ?>
					<li><h6><?php echo ucfirst($word->info()['description']) ?></h6>
				<?php endforeach ?>
			<?php endif;?>
		</ol>
	</div>
</div>