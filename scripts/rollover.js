//rollover

//window.onload = InitRoll;


function InitRoll(){
	for(var i = 0; i < document.images.length; ++i){
		if(document.images[i].parentNode.className == "ROLL"){
			_roll(document.images[i]);
		}
	}
}

function _roll(image){
	image.firstImg = new Image();
	image.firstImg.src = image.src;
	image.onmouseout = function(){
		this.src = image.firstImg.src;
	}
	image.secondImg = new Image();
	image.secondImg.src = "resources/active/"+image.id+"_active.png";
	image.onmouseover = function(){
		this.src = image.secondImg.src;
	}
}

function setRandImages(){
	for(var i = 0; i < document.images.length; ++i){
		if(document.images[i].id == "random_pic"){
			document.images[i].src = _randomImage();
		}
	}
}

function _randomImage(){
	var random = Math.floor(Math.random()*pictures.length);
	var src = pictures[random].image.src;
	var width = "\"width = "+pictures[random].width+"\" ";
	var height = "\"width = "+pictures[random].height+"\" ";
	var ret = src+width+height;
	return ret;
}



