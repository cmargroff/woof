<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/stylesheets/canvasScreen.css">
	<script type="text/javascript" src="js/cubicBezier.class.js"></script>
	<script type="text/javascript" src="js/tween.class.js"></script>
	<script type="text/javascript" src="js/timeline.class.js"></script>
	<script type="text/javascript" src="js/drawable.class.js"></script>
	<script type="text/javascript" src="js/layer.class.js"></script>
	<script type="text/javascript" src="js/shape.class.js"></script>
	<script type="text/javascript" src="js/sprite.class.js"></script>
	<script type="text/javascript" src="js/init.js"></script>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
</head>
<body>
<div id="stage">
	<canvas id="viewport"></canvas>
</div>
<div class="fixed">
	<div class="textarea active">
		Share content from<br>
		your location for your<br>
		community to discover
	</div>
	<div class="textarea">
		“Like” what you discover<br>
		to rebroadcast that content<br>
		from your location
	</div>
	<div class="textarea">
		<br>Watch Content Spread
	</div>
	<div class="textarea">
		<button id="getStarted">Get Started Now</button>
	</div>	
</div>
<div class="dots">
	<div class="dot active" data-id="1"></div>
	<div class="dot" data-id="2"></div>
	<div class="dot" data-id="3"></div>
</div>
<div id="loading">
	<canvas id="spinner"></canvas>
</div>
</body>
</html>