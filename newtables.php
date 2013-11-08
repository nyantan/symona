<!DOCTYPE HTML>
<!--~Written by nyantan~-->
<html>
<head>
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
	<tr><?php
			include 'php-script/hitokoto.php';
			htkt_write(htkt_parse());
		?></tr>
</table>

</body>
</html>