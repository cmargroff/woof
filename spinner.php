<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
#loading {
  position: fixed;
  background-color: #fff;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  opacity: 1;
}

/* line 261, ../sass/screen.scss */
#spinner {
  position: absolute;
  top: 50%;
  left: 50%;
}
</style>
<script type="text/javascript">
/*************************\
|* define easing methods *|
\*************************/
var animationMode = {
	easeout: new cubicBezier(0, 0, -0.4, 1),
	easein: new cubicBezier(0,0,1,-0.4),
	puff: new cubicBezier(0,0,0.4,2)
};

/*********************************\
|* add clearing method to canvas *|
\*********************************/
CanvasRenderingContext2D.prototype.clear = function(){
	this.clearRect(0, 0, this.canvas.width, this.canvas.height);
}
function cubicBezier(x1, y1, x2, y2){
    var p1 = [x1, y1], p2 = [x2, y2];
    this.calculate = function(t){
        /*return [
            0 * Math.pow(1-t, 3) + p1[0] * 3 * Math.pow(1-t, 2) * t + p2[0] * 3 * (1-t) * Math.pow(t, 2) + 1 * Math.pow(t, 3),
            0 * Math.pow(1-t, 3) + p1[1] * 3 * Math.pow(1-t, 2) * t + p2[1] * 3 * (1-t) * Math.pow(t, 2) + 1 * Math.pow(t, 3),
        ];*/
        return 0 * Math.pow(1-t, 3) + p1[1] * 3 * Math.pow(1-t, 2) * t + p2[1] * 3 * (1-t) * Math.pow(t, 2) + 1 * Math.pow(t, 3);
    };
}
document.addEventListener("DOMContentLoaded", function(){
	/******************************\
	|* set up sizing and contexts *|
	\******************************/
	var ww = window.innerWidth,
	wh = window.innerHeight||window.outerHeight;


	/***********************************************************\
	|* we are using a separate context here for the spinner    *|
	|* because the animation code was already finished as part *|
	|* of a proof of concept                                   *|
	\***********************************************************/
	var spinner = document.getElementById("spinner");
	var spinnerCtx = spinner.getContext('2d');
	var size = Math.min(ww,wh)*0.2;

	if (devicePixelRatio != 1) {
		spinner.width = size*devicePixelRatio;
		spinner.height = size*devicePixelRatio;
		spinner.style.width = size+"px";
		spinner.style.height = size+"px";
	}else{
		spinner.width = size;
		spinner.height = size;
	}

	var center = {x: spinner.width/2, y: spinner.height*0.412},
		outerR = spinner.width*0.2768,
		innerR = spinner.width*0.146,
		pinPoint = {x: spinner.width/2, y: spinner.height*0.8967},
		angle = 0,
		width = 0,
		start = null,
		angleOffset = 0.165;

	spinner.style.marginTop = "-"+(size/2)+"px";
	spinner.style.marginLeft = "-"+(size/2)+"px";

	spinnerCtx.strokeStyle = "#292B30";
	spinnerCtx.lineWidth = spinner.width*0.03;
	spinnerCtx.lineCap = "round";
	spinnerCtx.lineJoin = "round";


	/*****************************************\
	|* animation code for preloading spinner *|
	\*****************************************/
	function spin(timestamp){
		spinnerCtx.clear();
		spinnerCtx.beginPath();
		spinnerCtx.arc(center.x, center.y, outerR, (1-angleOffset)*Math.PI, (0+angleOffset)*Math.PI);
		spinnerCtx.lineTo(pinPoint.x, pinPoint.y);
		spinnerCtx.closePath();
        spinnerCtx.stroke();

        spinnerCtx.beginPath();
        if (!start) start = timestamp;
        var progress = timestamp - start;
        if (progress < 750) {
            angle = 0;
            width = 360*animationMode.easeout.calculate(progress/750);
        }else if (progress <1500) {
            angle = 360*animationMode.easeout.calculate((progress-750)/750);
            width = 360*(1-animationMode.easeout.calculate((progress-750)/750));
        }
        spinnerCtx.arc(center.x, center.y, innerR, angle*Math.PI/180, (angle+width)*Math.PI/180 );

        if (progress >= 1500) {
            start = timestamp;
        }
		spinnerCtx.stroke();
		window.requestAnimationFrame(spin);
	}

	//start spinner animation
	window.requestAnimationFrame(spin);
}, false);
</script>
</head>
<body>
<div id="loading">
	<canvas id="spinner"></canvas>
</div>
</body>
</html>