<!DOCTYPE HTML>
<!--~Written by nyantan~-->
<html>
<head>
  <script type="text/javascript" src="http://api.hitokoto.us/rand?encode=js&charset=utf-8"></script>
  <meta charset="UTF-8">
  <title>Better tables</title>
</head>
<body>
<!--[if lt IE9]>
  	<div id="wrap">
		<p style="margin: 130px -240px -250px 100px; width: 240px;">
	  	It seems that you are using IE 5.5 - 8, and this is not good!</p>
		<img src="image/Window.png" id="Window" style="margin: 80px 0px 0px 60px; width: 310px; height: 240px;"/>
  	</div>
<![endif]-->

<table>
	<tr><div id="hitokoto"><script>hitokoto()</script></div></tr>
	<tr><?php
			echo file_get_contents('http://api.hitokoto.us/rand?&charset=utf-8');
		?></tr>
	<tr><?php
			include 'hitokoto.php';
			htkt_parse();
		?></tr>
</table>

</body>
</html>