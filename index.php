<!DOCTYPE html>

<html>
<?php
	#create a cookie on the users machine
	session_start();
	$page_directory  = "pages";
	$image_directory = "images";
	$thumb_directory = "resources/thumbs"; 
	$m_thumb_directory = "resources/m_thumbs";
	include("scripts/fileopen.inc.php");
	include("scripts/resize.inc.php");
	$usedPics = array();
	
	$images = scandir($image_directory,0);
	unset($images[0],$images[1]);

	$qoute_num = array_rand($qoutes,1);
?>
<head>
	<meta charset = "UTF-8"/>
	<meta name ="keywords" content = "Photography, Daisyhead, Wedding Pictures, Engagement Pictures, Maternity Pictures, Family Pictures, Newborn Pictures, Pictures, Lindsay Kreke, Kreke, Lafayette Indianna, Photographer, Chris, Northcutt"/>
	<meta http-equiv="Content-Type" content = "text/html; charset=utf-8"/>
	<meta http-equiv="content-script-type" content= "text/javascipt">
	<title>Daisyhead Photography</title>
	<!--link href = "stylesheets/keyframes.css" rel = "stylesheet" type = "text/css"-->
	<link rel="shortcut icon" type="image/ico" href="favicon.ico">
	<link href = "stylesheets/style.css" rel = "stylesheet" type = "text/css">
	<link href = "stylesheets/GalleryStyle.css" rel = "stylesheet" type = "text/css">
	
	<!-- styles needed by jScrollPane -->
	<link type="text/css" href="stylesheets/jquery.jscrollpane.css" rel="stylesheet" media="all" /></script>
	<!--jQueryApi-->
	<script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<!-- the mousewheel plugin - optional to provide mousewheel support -->
	<script type="text/javascript" src="scripts/jquery.mousewheel.js"></script>
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="scripts/jquery.jscrollpane.min.js"></script>
	<!--jQuery Easing plugin-->
	<script type = "text/javascript" src = "scripts/jquery.easing.1.3.js"></script>
	<script type = "text/javascript" src = "scripts/rollover.js"></script>
	<script type = "text/javascript" src = "scripts/test.js"></script>
	<?php
	//the following code will produce a javascript array filled with the images
	//inside of your image directory as well as their corresponding thumbnails.
	//This allows the addition of new images to the image directory without 
	//the need of editing the javascript or html to reflect the additions
	//To create the thumbnails: see resize.inc.php and the included comments
		$count = 0;
		echo '<script type = "text/javascript">'."\n\t";
		echo "\t".'var pictures = new Array();'."\n";
		foreach($images as $image){
			$dimensions = getimagesize($image_directory.'/'.$image);
			$t_dimensions = getimagesize($thumb_directory.'/'.$image);
			echo "\n\t\t".'pictures['.$count.'] = new Object();';
			echo "\n\t\t".'pictures['.$count.'].image = new Image();';
			echo "\n\t\t".'pictures['.$count.'].image.src = "'.$image_directory.'/'.$image.'"';
			echo "\n\t\t".'pictures['.$count.'].width = '.$dimensions[0].';';
			echo "\n\t\t".'pictures['.$count.'].height = '.$dimensions[1].";\n";
			echo "\n\t\t".'pictures['.$count.'].thumb = new Image();';
			echo "\n\t\t".'pictures['.$count.'].thumb.src = "'.$thumb_directory.'/'.$image.'"';
			echo "\n\t\t".'pictures['.$count.'].twidth = '.$t_dimensions[0].';';
			echo "\n\t\t".'pictures['.$count.'].theight = '.$t_dimensions[1].";\n";
			$count++;
		}
		echo "\n\t</script>\n";
	?>
	<script src = "scripts/CyclePics.js" type = "text/javascript"></script>
	<script src = "scripts/LoadEventQueue.js" type = "text/javascript"></script>
</head>
	
<body>
	<div id = "Container">
		<div id = "LeftBorder">
		</div>
		<div id = "Banner">
			<img id = "DaisyHead" src = "resources/DaisyHeadBanner.png" alt = "Daisyhead Photography"/>
		</div>
		<!--End Banner======================================================-->
		<div id = "NavBar">
			<!--============================================================-->		
			<div id = "HOME">
				<a class = "ROLL" href = "index.php">
				<img id = "home" src = "resources/links/home.png" alt = "Home"/>
				</a>
			</div>
			<!--============================================================-->			
			<div id = "PORTFOLIO">
				<a class = "ROLL" href = "index.php?p=portfolio">
				<img id = "portfolio" src = "resources/links/portfolio.png" alt = "Portfolio"/>
				</a>
			</div>
			<!--============================================================-->
			<div id = "CONTACT">
				<a class = "ROLL" href = "index.php?p=contact">
				<img id = "contact" src = "resources/links/contact.png" alt = "Contact"/>
				</a>
			</div>
			<div id = "PRICING">
				<a class = "ROLL" href = "index.php?p=pricing">
				<img id = "pricing" src = "resources/links/pricing.png" alt = "Pricing"/>
				</a>
			</div>
			<!--============================================================-->
			<div id = "ABOUT">
				<a class = "ROLL" href = "index.php?p=about">
				<img id = "about" src = "resources/links/about.png" alt = "about"/>
				</a>
			</div>
			<!--============================================================-->			
		</div>
		<!--End NavBar======================================================-->
	
		<div id ="Content">
			<?php
				if(!empty($_GET['p'])){
					$pages = scandir($page_directory,0);
					unset($pages[0],$pages[1]);
					$p = $_GET['p'];
					if(in_array($p.'.inc.php',$pages)){
						include($page_directory.'/'.$p.'.inc.php');
					}
					else echo "404 Page not found";
				}
				else{
					include($page_directory.'/home.inc.php');
				}
			?>
		</div>
		<!--End Content======================================================-->
		<div id = "RightBorder">
			<!--img src = "resources/BorderRightTall.png"/-->
		</div>
		
		
		<?php
			#feel free to do whatever you want with these. I do not know what type of social networking sites to include here
			#so you can simply add whichever sites you want to have a link to by adding the neccessary markup.
			#Remove anything you don't want as well.
		?>
		<div id = "Social-Icons">
			
			<a class = "ROLL" href = "http://www.facebook.com/pages/Daisyhead-Photography/83545428994" target = "about:blank">
			<img id = "facebook" src = "resources/social-icons/32-x-32px/facebook_dark.png" alt = "FaceBook"/>
			</a>
			<a class = "ROLL" href = "index.php">
			<img id = "google" src = "resources/social-icons/32-x-32px/google_dark.png" alt = "Google plus"/>
			</a>
			<a class = "ROLL" href = "index.php">
			<img id = "twitter" src = "resources/social-icons/32-x-32px/twitter_dark.png" alt = "Twitter"/>
			</a>
			<a class = "ROLL" href = "index.php">
			<img id = "myspace" src = "resources/social-icons/32-x-32px/myspace_dark.png" alt = "MySpace"/>
			</a>
		</div>
		
		<div id = "Footer">
			<p><?php echo $qoutes[$qoute_num];?></p>
			<p>Copyright 2008-<?php echo date('Y');?> Daisyhead Photography</p>
		</div>
		<!--End Footer======================================================-->
	</div>
	<!-- End Container======================================================-->
</body>

</html>