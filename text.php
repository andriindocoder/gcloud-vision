<div class="row">
	<div class="col-12">
		<ol>
			<?php if ($text): ?>
				<?php
					$sentence = $text[0]->info()['description']; 
					echo $sentence;

					$ICnumber = '';
					$string = $sentence;
					$word = "ISLAM";
					echo "<hr>";

					preg_match_all("/\sBIN\s/", $string, $matches);
					if($matches[0]) {
						foreach($matches[0] as $bin) {
							if($bin) {
								$stringify = trim(preg_replace('/\s+/', ' ', $string));
								$pieces = explode(" ", $stringify);
								$ind = '';
								foreach($pieces as $key => $value) {
									if(strtolower($value) == 'bin'){
										$ind = $key;
										break;
									}
								}
								$maleName = $pieces[$key-1] . " " .$pieces[$key]. " ". $pieces[$key+1];
								echo "Name : " . $maleName;
							}
						}
					} else {
						echo "<p style='color:red'> Name can not be recognized.</p>";
					}
					
					preg_match_all("/\d{6}-\d{2}-\d{4}/", $string, $matches);
					foreach($matches[0] as $value) {
						$ICnumber = $value;
					}
					if($matches[0]) {
						if($ICnumber){
							echo "<p style='color:green'> IC Number: " . $ICnumber . "</p>";
						} 
					} else {
						echo "<p style='color:red'> IC Number can not be recognized.</p>";
					}
					if(strpos(strtolower($string), strtolower($word)) !== false){
					    echo "ISLAM? YES";
					} else{
					    echo "ISLAM? NO";
					}
				?>
			<?php endif;?>
		</ol>
	</div>
</div>