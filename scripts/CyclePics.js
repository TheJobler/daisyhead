

function rand_index(array){
	var index = Math.floor((Math.random()*array.length));
	return index;
}

var activePic;
// var picthumbs = new Array(activePic-2,activePic-1,activePic,activePic+1,activePic+2);
var inport = false;

function setInitialPos(){
	if(!inport){
		activePic = 3;//rand_index(pictures);
		var element = document.getElementById("active-img");//.src = pictures[activePic].image.src;
		element.src = pictures[activePic].image.src;
		var dimensions = resize(pictures[activePic],780,500);
		element.width = dimensions[0];
		element.height = dimensions[1];
		inport = !inport;
	}
}

function set(){
	var element = document.getElementById("active-img");
	element.src = pictures[activePic].image.src;
	var dimensions = resize(pictures[activePic],780,500);
	element.width = dimensions[0];
	element.height = dimensions[1];
	var pre = document.getElementById('prev');
	var nxt = document.getElementById('next');
	$('#active-img').fadeIn(3000);
	return false;
}

//increment the index of the pictures array and changes the pictures source accordingly
function next(){
	//$(".thumb:first").stop(true,false);
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
	$('#active-img').fadeIn(9000);
	return false;
}

//Same as next but decrements the index for the new source
function previous(){
	//$(".thumb:first").stop(true,false);
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
	$('#active-img').fadeIn(9000);
	
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
	var thumbs = $('.thumb');
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
	$(".thumb:first").stop(false,true);
	var id = arrow.id;
	if(id == "pScrollRight"){
		$(".thumb:first").animate(
			{"left": "-=318px"},
			{
				duration:2000,
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
				duration:2000,
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
	if(Duration > 3000)
		Duration = 3000;
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
		$('#section-'+divId).delay((Math.floor(Math.random()*500))+(Math.floor(Math.random()*500))).fadeIn(3000);
	}
	else
		$('#thumb'+divId).fadeIn(3000);
	$('#active-img').fadeIn(3000);
}

//function mthumbs(){
//	var elements = $('lbox_pic');
//	for(var i = 0; i < elements.length; i++){
//		_mthumb('pic'+(i+1),images,i,((i==0)?true:false));
//	}
//}
//
//var used = new Array();
//
//function _mthumb(id,image_array,j,reset){
//	var pic;
//	
//	if(reset){
//		used.length = 0;
//	}
//	pic = Math.floor((Math.random()*image_array.length));
//	while($.inArray(pic,used)){
//		pic = Math.floor((Math.random()*image_array.length));
//	}
//	used[j] = pic;
//	thumbs[j].src = image_array[pic].m_thumb.src;
//	if($.data('data-width')=='true'){
//		thumbs[j].width = 160;
//		thumbs[j].height = 107;
//	}
//	else{
//		thumbs[j].width = 107;
//		thumbs[j].height = 160;
//	}
//}







