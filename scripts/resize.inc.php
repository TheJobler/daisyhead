<?php
	function resize($image,$maxWidth,$maxHeight)
	{
		#get the size of the image you're resizing.
		$dimensions = getimagesize($image);
		$origWidth  = $dimensions[0];
		$origHeight = $dimensions[1];
		

		#check for longest side, we'll be setting that to the max value above
		if($origHeight > $origWidth) #if height is more than width
		{
			$newWidth = ($maxHeight * $origWidth) / $origHeight;
			$ret = array('width' => $newWidth, 'height' => $maxHeight);
		}
		else
		{
			$newHeight= ($maxWidth * $origHeight) / $origWidth;
			$ret = array('width' => $maxWidth, 'height' => $newHeight);
		}
		return $ret;
	}



	//when you add pictures to your website, you can runthe code following the
	//set_time_limit() command below and load your page to dynamically create thumbnails.
	//You could, of course, go through each image and resize it with image editing software
	//if you wish. The dimensions are currently set to Width:110; Height:100;
	//to run the code simply change the $makethumbs to true;
	
	set_time_limit(1000);
	$makethumbs = false;
	if($makethumbs){
		/* Opening the thumbnail directory and looping through all the thumbs: */
		$dir_handle = @opendir($image_directory); //Open Full image dirrectory
		if ($dir_handle > 1){ //Check to make sure the folder opened
		 
		$allowed_types=array('jpg','jpeg','gif','png');
		$file_parts=array();
		$ext='';
		$title='';
		$i=0;
		 
		while ($file = @readdir($dir_handle))
		{
			/* Skipping the system files: */
			if($file=='.' || $file == '..') continue;
		 
			$file_parts = explode('.',$file);    //This gets the file name of the images
			$ext = strtolower(array_pop($file_parts));
		 
			/* Using the file name (without the extension) as an image title: */
			$title = implode('.',$file_parts);
			$title = htmlspecialchars($title);
		 
			/* If the file extension is allowed: */
			if(in_array($ext,$allowed_types))
			{
		 
				/* If you would like to inpute images into a database,
				   do your mysql query here */
		 
				$nw = 110;
				$nh = 100;
				$source = "images/{$file}";
				$stype = explode(".", $source);
				$stype = $stype[count($stype)-1];
				$dest = "resources/thumbs/{$file}";
		 
				$size = getimagesize($source);
				$w = $size[0];
				$h = $size[1];
		 
				switch($stype) {
					case 'gif':
						$simg = imagecreatefromgif($source);
						break;
					case 'jpg':
						$simg = imagecreatefromjpeg($source);
						break;
					case 'png':
						$simg = imagecreatefrompng($source);
						break;
				}
		 
				$dimg = imagecreatetruecolor($nw, $nh);
				$wm = $w/$nw;
				$hm = $h/$nh;
				$h_height = $nh/2;
				$w_height = $nw/2;
		 
				if($w> $h) {
					$adjusted_width = $w / $hm;
					$half_width = $adjusted_width / 2;
					$int_width = $half_width - $w_height;
					imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
				} elseif(($w <$h) || ($w == $h)) {
					$adjusted_height = $h / $wm;
					$half_height = $adjusted_height / 2;
					$int_height = $half_height - $h_height;
		 
					imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
				} else {
					imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);
				}
					imagejpeg($dimg,$dest,100);
				}
		}
		 
		/* Closing the directory */
		@closedir($dir_handle);
		 
		}
	}
?>