
<div class = "Gallery">

	<div id = "prev" onclick = "previous(pictures)">
		<img src = "resources/arrow-left.png" alt = "Previous"/>
	</div>
	<div id = "active" onclick = "find()">
		<img id = "active-img" alt = ""/>
	</div>
	
	<div id = "pictureBar">
	
		<div id = "pScrollLeft" onclick = "scroll(this)">
			<img src = "resources/sLefttArrow.png" alt = "Slide" onclick = "" />
		</div>
		<div class = "visible">
			<div id = "thumbs">
				<?php
					$thumbcount = 0;
					for($i = 0; $i < 15; $i++){
						echo "\t"."\t".'<div class = "thumb">'."\n";
						echo "\t"."\t"."\t".'<img id = "thumb'.$i.'" src = "#" alt = "" onclick = "show(this)" onload = "_load(this,5)"/>'."\n";
						echo "\t"."\t".'</div>'."\n";
					}
				?>
			</div>
		</div>	
		<div id = "pScrollRight" onclick = "scroll(this)">
			<img src = "resources/sRightArrow.png" alt = "Slide" onclick = ""/>
		</div>
	
	</div>
	
	<div id = "next" onclick = "next(pictures)">
		<img src = "resources/arrow-righft.png" alt = "Next"/>
	</div>
	<script src = "scripts/loadthumbs.js" type = "text/javascript"></script>
</div>
