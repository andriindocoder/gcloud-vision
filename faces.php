<div class="row">
	<div class="col-12">
		<ol>
			<?php if ($faces): ?>
				<?php foreach ($faces as $key => $face): ?>
					<?php
						//Assigning Colors
						$faceColorR = mt_rand(0,200); 
						$faceColorG = mt_rand(0,200); 
						$faceColorB = mt_rand(0,200); 
						$color = [$faceColorR, $faceColorG, $faceColorB];
						$_SESSION['faces'][$imagetoken][$key] = json_encode($face->info()['landmarks']);
						$_SESSION['faces']['colors'][$key] = $color;
					?>
					<br>
					<li>
						<strong style="color: rgb(<?php echo "$faceColorR, $faceColorG, $faceColorB" ?>);">Face <?php echo $key + 1 ?></strong>
						<hr>
						<div class="row">
							<div class="col-6">
								<strong>Joy</strong>
							</div>
							<div class="col-6">
								<strong><?php echo $face->info()['joyLikelihood'] ;?></strong>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<strong>Sorrow</strong>
							</div>
							<div class="col-6">
								<strong><?php echo $face->info()['sorrowLikelihood'] ;?></strong>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<strong>Angry</strong>
							</div>
							<div class="col-6">
								<strong><?php echo $face->info()['angerLikelihood'] ;?></strong>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<strong>Surprised</strong>
							</div>
							<div class="col-6">
								<strong><?php echo $face->info()['surpriseLikelihood'] ;?></strong>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<strong>Blurred</strong>
							</div>
							<div class="col-6">
								<strong><?php echo $face->info()['blurredLikelihood'] ;?></strong>
							</div>
						</div>
						<div class="row">
							<div class="col-6">
								<strong>Headwear</strong>
							</div>
							<div class="col-6">
								<strong><?php echo $face->info()['headwearLikelihood'] ;?></strong>
							</div>
						</div>
					</li>
				<?php endforeach ?>
			<?php endif ?>
		</ol>
	</div>
</div>