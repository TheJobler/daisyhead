

//function rand_index(array){
//	var index = Math.floor((Math.random()*array.length));
//	return index;
//}

var activePic = 0;
// var picthumbs = new Array(activePic-2,activePic-1,activePic,activePic+1,activePic+2);
var inport = false;


function set(){
	var element = document.getElementById("active-img");
	element.src = pictures[activePic].image.src;
	var dimensions = resize(pictures[activePic],780,500);
	element.width = dimensions[0];
	element.height = dimensions[1];
	var pre = document.getElementById('prev');
	var nxt = document.getElementById('next');
	find();
	$('#active-img').fadeIn(3000);
	return false;
}

//increment the index of the pictures array and changes the pictures source accordingly
function next(){
	$('#active-img').stop(false,true);
	$('#active-img').hide();
	var element = document.getElementById("active-img");
	
	if(activePic == pictures.length-1){
		activePic = -1;
	}
	activePic++;
	element.src = pictures[activePic].image.src;
	var dimensions = resize(pictures[activePic],780,500);
	element.width = dimensions[0];
	element.height = dimensions[1];
	$('#active-img').fadeIn(3000);
	return false;
}

//Same as next but decrements the index for the new source
function previous(){
	$('#active-img').stop(false,true);
	$('#active-img').hide();
	var element = document.getElementById("active-img");
	
	if(activePic == 0){
		activePic = pictures.length;
	}
	activePic--;
	element.src = pictures[activePic].image.src;
	var dimensions = resize(pictures[activePic],780,500);
	element.width = dimensions[0];
	element.height = dimensions[1];
	$('#active-img').fadeIn(3000);
	return false;
}


function resize(image,maxWidth,maxHeight)
{
	origWidth  = image.width;
	origHeight = image.height;	
	var ret;
	if(origHeight > origWidth)
	{
		newWidth = (maxHeight * origWidth) / origHeight;
		ret = Array(newWidth, maxHeight);
	}
	else
	{
		newHeight= (maxWidth * origHeight) / origWidth;
		ret = Array(maxWidth, newHeight);
	}
	return ret;
}


function displaythumbs(){
	//alert("function call success");
	var thumbs = jQuery('.thumb');
	for(var i = 0; i < thumbs.length; i++){
		_displaythumb("thumb"+i.toString(),i);
	}
}

function _displaythumb(id,picNum){
	element = document.getElementById(id);
	element.src = pictures[picNum].thumb.src;
	//var dimensions = resize(pictures[picNum],136,92);
	element.width = pictures[picNum].twidth;//dimensions[0];
	element.height = pictures[picNum].theight;//dimensions[1];
}

function show(element){
	$('#active-img').stop(false,true);
	$('#active-img').hide();
	var id = element.id;
	id = id.substring(5);
	var pic = parseInt(id);
	//alert(pic);
	activePic = pic;
	//shows picture from scrolbar when clicked;
	set();
	return false;
}

$.easing.def = "easeOutElastic";

function scroll(arrow){
	var id = arrow.id;
	if(id == "pScrollRight"){
		$(".thumb:first").animate(
			{"left": "-=318px"},
			{
				duration:700,
				easing:"easeOutElastic",
				step: function(now,fx){
					$(".thumb:gt(0)").css("left",now);
				}
			});
	}
	if(id == "pScrollLeft"){
		$(".thumb:first").animate(
			{"left": "+=318px"},
			{
				duration:700,
				easing:"easeOutElastic",
				step: function(now,fx){
					$(".thumb:gt(0)").css("left",now);
				}
			});
	}
}

function find(){
	var thumb = ".thumb:gt("+activePic+")";
	var offset = $(thumb).offset();
	//alert(offset.left);
	var deltaOffset = offset.left-1022.5;
	var Duration;
	if(deltaOffset < 0)
		Duration = -deltaOffset*4;
	else
		Duration = deltaOffset*4;
	if(Duration > 2000)
		Duration = 2000;
	//alert(deltaOffset);
	$(".thumb:first").animate(
		{"left": "-="+deltaOffset+"px"},
		{
			duration: Duration,
			easing:"easeOutElastic",
			step: function(now,fx){
				$(".thumb:gt(0)").css("left",now);
			}
		});
}


function _load(picture, sub){
	$('#active-img').stop(false,true);
	var divId = parseInt(picture.id.substring(sub));
	if(sub === 3){
		$('#section-'+divId).fadeIn(3000);
	}
	else
		$('#thumb'+divId).fadeIn(3000);
	$('#active-img').fadeIn(3000);
}