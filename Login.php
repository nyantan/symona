<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
session_start();

//已登录用户自动跳转
if(isset($_SESSION['Username']))
{
	echo '
		<script language="javascript"> 
			window.location.href=\'Manager.php\';
		</script>
	';
}
?>

<!-- Written by Gh0u1L5-->
<!DOCTYPE html>
<script src="script/mootools-core-1.4.5-full-compat.js"></script>
<link rel="stylesheet" type="text/css" href="Common.css" />
<style type="text/css">
	.font {
	    font-family: 华文行楷;
	    font-size: 120%;
	}
	#LoginButton {
		-webkit-transform:scale(1.0);
		-moz-transform:scale(1.0);
		-o-transform:scale(1.0);
		float:left;
		margin-left:-50px;
		margin-right:-50px;
		margin-top:-10px;
		-webkit-transition-duration: 0.5s;
		-moz-transition-duration: 0.5s;
		-o-transition-duration: 0.5s;
	}
	#LoginButton:hover {
		-webkit-transform:scale(1.2);
		-webkit-box-shadow:0px 0px 30px #ccc;
		-moz-transform:scale(1.2);
		-moz-box-shadow:0px 0px 30px #ccc;
		-o-transform:scale(1.2);
		-o-box-shadow:0px 0px 30px #ccc;
	}
</style>
<html>
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<title>后台登陆</title>
		<!--link rel="stylesheet" href="Mine.css" type="text/css"-->

		<script src="script/jquery-2.0.3.js">
		</script>
		<script>
		function InputCheck(Login)
		{
			if(Login.Username.value == "")
			{
				alert("请输入用户名！");
				Login.Username.focus();
				return false;
			}
			else if(Login.Password.value == "")
			{
				alert("请输入密码！");
				Login.Password.focus();
				return false;
			}
			else
			{
				$("p#Label1").fadeOut(100);
				$("input#Username").fadeOut(100);
				$("p#Label2").fadeOut(100);
				$("input#Password").fadeOut(100);
				$("input#LoginButton").fadeOut(100);
				$("img#Window").animate({margin:'15px 0px', width:'600px', height:'500px'});
				return true;
			}
		}

		</script> 
	</head>

    <body>

    <!--[if IE]>
		<div id="wrap">
            <div class="container">

                <p class="font" style="margin: 13% 0px 0px 10%; width: 24%; height: 14px;">

				抱歉，IE浏览器版本又多又乱，而且无法支持该页面的大多数效果，我已经恨透它了，请使用Firefox或Chrome以正常显示页面。</p>

                <img src="image/Window.png" id="Window" alt="" />
                </div>

		</div>

	<img src="image/Background.png" id="Background" alt="" />
	<![endif]-->

	<![if !IE]>
		<div id="wrap">
            <div class="container">

        	    <form id="Login" name="Login" method="post" onSubmit="return InputCheck(this)" action="CheckAuth.php">

	                <p id="Label1" class="font" style="margin: 12% 0px 0px 10%; width: 64px; height: 14px;">
					用户名:<input name="Username" type="text" style="margin: 0px 60px; height: 20px;" /></p>
	                <p id="Label2" class="font" style="margin: 2% 0px 0px 10%; width: 64px; height: 14px;">
					密码:<input name="Password" type="password" style="margin: 0px 60px; height: 20px;" /></p>
	            	<input type="image" src="image/LoginButton.png" id="LoginButton" style="position: absolute; margin: 35px auto auto 340px; height: 24px; width: 60px;" />

            	</form>
                <img src="image/Window.png" id="Window" alt="" />
                </div>

		</div>
	<img src="image/Background.png" id="Background" alt="" />

	<![endif]>
	</body>

</html>
