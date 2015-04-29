<?php
	
	function createImage($directory, $images,$wider)
	{
		global$usedPics;
		$randNum = array_rand($images,1);
		if($wider){
			$dimensions = resize($directory.'/'.$images[$randNum],160,160);
			while($dimensions['width'] < $dimensions['height']){
				$randNum = array_rand($images,1);
				while(in_array($randNum, $usedPics)){
					$randNum = array_rand($images,1);
				}
				$dimensions = resize($directory.'/'.$images[$randNum],160,160);
			}
			array_push($usedPics,$randNum);
		}
		else{
			$dimensions = resize($directory.'/'.$images[$randNum],160,160);
			while($dimensions['height'] < $dimensions['width']){
				$randNum = array_rand($images,1);
				while(in_array($randNum, $usedPics)){
					$randNum = array_rand($images,1);
				}
				$dimensions = resize($directory.'/'.$images[$randNum],160,160);
			}
			array_push($usedPics,$randNum);
		}
		echo '"'.$directory.'/'.$images[$randNum].'" ';
		echo 'width = "'.$dimensions['width'].'" height = "'.$dimensions['height'].'"';
	}
?>

<div id = "pictures">
	<div class = "PicturePile">
		<div id = "section-1">
			<img class = "lbox_pic" id = "pic1" data-picnum = "" src = 
				<?php
					createImage($m_thumb_directory, $images, false);
				?> onload = "_load(this,3)"/>
		</div>
		
		<div id = "section-2">
			<img class = "lbox_pic" id = "pic2" data-picnum = "" src = 
				<?php
					createImage($m_thumb_directory, $images, true);
				?> onload = "_load(this,3)"/>
		</div>
		
		<div id = "section-3">
			<img class = "lbox_pic" id = "pic3" data-picnum = "" src = 
				<?php
					createImage($m_thumb_directory, $images, false);
				?> onload = "_load(this,3)"/>
		</div>
		
		<div id = "section-4">	
			<img class = "lbox_pic" id = "pic4" data-picnum = "" src = 
				<?php
					createImage($m_thumb_directory, $images, true);
				?> onload = "_load(this,3)"/>
		</div>
		
		<div id = "section-5">	
			<img class = "lbox_pic" id = "pic5" data-picnum = "" src = 
				<?php
					createImage($m_thumb_directory, $images, false);
				?> onload = "_load(this,3)"/>
		</div>
		
		<div id = "section-6">	
			<img class = "lbox_pic" id = "pic6" data-picnum = "" src = 
				<?php
					createImage($m_thumb_directory, $images, true);
				?> onload = "_load(this,3)"/>
		</div>
		
		<div id = "section-7">	
			<img class = "lbox_pic" id = "pic7" data-picnum = "" src = 
				<?php
					createImage($m_thumb_directory, $images, true);
				?> onload = "_load(this,3)"/>
		</div>
		
		<div id = "section-8">	
			<img class = "lbox_pic" id = "pic8" data-picnum = "" src = 
				<?php
					createImage($m_thumb_directory, $images, false);
				?> onload = "_load(this,3)"/>
		</div>
		
		<div id = "section-9">	
			<img class = "lbox_pic" id = "pic9" data-picnum = "" src = 
				<?php
					createImage($m_thumb_directory, $images, false);
				?> onload = "_load(this,3)"/>
		</div>
		
		<div id = "section-10">	
			<img class = "lbox_pic"id = "pic10" data-picnum = "" src = 
				<?php
					createImage($m_thumb_directory, $images, true);
				?> onload = "_load(this,3)"/>
		</div>
		
		<div id = "section-11">	
			<img class = "lbox_pic"id = "pic11" data-picnum = "" src = 
				<?php
					createImage($m_thumb_directory, $images, true);
				?> onload = "_load(this,3)"/>
		</div>
		
		<div id = "section-12">	
			<img class = "lbox_pic"id = "pic12" data-picnum = "" src = 
				<?php
					createImage($m_thumb_directory, $images, true);
				?> onload = "_load(this,3)"/>
		</div>

		<div class = "square" id = "s1">
		</div>
		<div class = "square" id = "s2">
		</div>
		<div class = "square" id = "s3">
		</div>
		<div class = "square" id = "s4">
		</div>
		<div class = "square" id = "s5">
		</div>
		<div class = "square" id = "s6">
		</div>
		
	</div>
</div>
<!--End Polaroids--->