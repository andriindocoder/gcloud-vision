<div class="row">
	<div class="col-12">
		<ol>
			<?php foreach ($safeSearch->info() as $key => $value): ?>
				<li><h6><?php echo ucfirst($key) ?>: </h6><strong><?php echo $value ?></strong><br><br></li>
			<?php endforeach ?>
		</ol>
	</div>
</div>