﻿<!-- Written by Gh0u1L5-->
<!DOCTYPE html>
<script src="script/jQuery.js"></script>
<script src="script/jQuery.SHA.js"></script>
<script src="script/Mootools.js"></script>
<script language="javascript">
function SunnyMonkMouseover() {
	$("img#SunnyMonk").stop(true).animate({marginTop: '-9.5px'}, 200);
}

function SunnyMonkMouseout() {
	$("img#SunnyMonk").animate({marginTop: '-19.5px'}, 200);
}

function SunnyMonkClickDown() {
	$("img#SunnyMonk").attr("onmouseover", "return false;");
	$("img#SunnyMonk").attr("onmouseout", "return false;");
	$("img#SunnyMonk").attr("onclick", "SunnyMonkClickUp();");
	$("img#SunnyMonk").add("div#LoginArea").animate({marginTop: '+=200px'}, 500);
}

function SunnyMonkClickUp() {
	$("img#SunnyMonk").add("div#LoginArea").animate({marginTop: '-=200px'}, 500);
	$("img#SunnyMonk").attr("onmouseover", "SunnyMonkMouseover();");
	$("img#SunnyMonk").attr("onmouseout", "SunnyMonkMouseout();");
	$("img#SunnyMonk").attr("onclick", "SunnyMonkClickDown();");
}

function  LoginSubmit(Login) {
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
		Login.Password.value = $.encoding.digests.hexSha1Str(Login.Password.value);
		return true;
	}
}

$(document).ready(function() {
	$("#Previous").fadeOut(0);
	$("img.Shadow#TabPrevious").fadeOut(0);
	$("#History").fadeOut(0);
	$("img.Shadow#TabHistory").fadeOut(0);

	var CurrentDate = new Date();
	document.getElementById("Year").value = CurrentDate.getFullYear();
	document.getElementById("Month").options[CurrentDate.getMonth()].selected = true;

	$("img#QueryButton").click(function() {
		$("img#QueryButton").animate({width: '-200px'}, 500).queue(function(next) {
			$("input#QueryContent").animate({width: '360px'}, 500).queue(function(next) {
				$("input#ShortQueryButton").animate({width: '150px'}, 200);
			});
			next();
		});
	});

	$("img#TabCurrent").click(function() {
		if($("img#TabCurrent").attr("select") == "false") {
			$("[select]").attr("select", "false");
			$("img#TabCurrent").attr("select", "true");
			$(".Shadow").fadeOut(300);
			$("img.Shadow#" + $("img#TabCurrent").attr("id")).fadeIn(0);

			$("#Current").fadeOut(0);
			$("#Previous").fadeOut(0);
			$("#History").fadeOut(0);
			$("#Current").fadeIn(300);
		}
	});

	$("img#TabPrevious").click(function() {
		if($("img#TabPrevious").attr("select") == "false") {
			$("[select]").attr("select", "false");
			$("img#TabPrevious").attr("select", "true");
			$(".Shadow").fadeOut(300);
			$("img.Shadow#" + $("img#TabPrevious").attr("id")).fadeIn(0);

			$("#Current").fadeOut(0);
			$("#Previous").fadeOut(0);
			$("#History").fadeOut(0);
			$("#Previous").fadeIn(300);
		}
	});

	$("img#TabHistory").click(function() {
		if($(this).attr("select") == "false") {
			$("[select]").attr("select", "false");
			$("img#TabHistory").attr("select", "true");
			$(".Shadow").fadeOut(300);
			$("img.Shadow#" + $("img#TabHistory").attr("id")).fadeIn(0);

			$("#Current").fadeOut(0);
			$("#Previous").fadeOut(0);
			$("#History").fadeOut(0);
			$("#History").fadeIn(300);
		}
	});
});
</script> 
<link rel="stylesheet" type="text/css" href="Common.css" />
<style type="text/css">
.font {
	font-family: 华文行楷;
	font-size: 120%;
}
table {
	position: absolute;
	background-color: transparent;
}
</style>
<html>
<head>
	<script type="text/javascript" src="http://api.hitokoto.us/rand?encode=js&charset=utf-8"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>学生会量化系统公示</title>
</head>
<body>
<!--[if lt IE9]>
	<div id="wrap">
		<p style="margin: 130px -240px -250px 100px; width: 240px;">
			若你看到这个页面，请使用IE10、<a href="http://mzl.la/1cFIryq">Firefox</a>或<a href="http://bit.ly/1aGAhUQ">Chrome</a>以正常显示。</p>
		<img src="image/Window.png" id="Window" style="margin: 80px 0px 0px 60px; width: 310px; height: 240px;"/>
	</div>
<![endif]-->
<![if !IE]>
	<div id="wrap">
		<div class="container">
			<img src="image/SunnyMonk.png" id="SunnyMonk" onmouseover="SunnyMonkMouseover();" onmouseout="SunnyMonkMouseout();" onclick="SunnyMonkClickDown();" style="position: absolute; margin: -19.5px -91px -219px 1170px; height: 219px; width: 91px; z-index: 2;" />
			<div id="LoginArea"  style="position: absolute; margin: -235px -300px -200px 950px; height: 200px; width: 300px; ">
<!--Notice! Input!-->
				<form id="Login" name="Login" method="post" onSubmit="return LoginSubmit(this)" action="Manager.php">
					<table style="margin: 70px -150px -48px 50px; border-spacing: 0px 10px; z-index: 2;">
					<tr>
						<td><img src="image/LoginUsername.png" /></td>
						<td><input id="Username" class="Text" type="text" style="margin: 0px 0px; height: 24px; width: 150px;" /></td>
					</tr>
					<tr>
						<td><img src="image/LoginPassword.png" style="margin: 0px 0px 0px -3px;" /></td>
						<td><input id="Password" class="Text" type="password" style="margin: 0px 0px; height: 24px; width: 150px;" /></td>
					</tr>
					</table>
					<input type="image" src="image/LoginButton.png" id="LoginButton" class="Button" style="position: absolute; margin:  180px -60px -24px 220px; height: 24px; width: 60px; z-index: 2;" />
					<img src="image/Window.png" id="LoginWindow" style="margin: 35px 23px; height: 200px; width: 300px;" />
				</form>
<!--Input End-->
			</div>
			<div id="IndexArea"  style="position: absolute; margin: 0px 0px 0px 0px; height: 100%; width: 100%;">
				<img src="image/QueryButton.png" id="QueryButton" class="Button" style="margin: 50px -200px -40px 100px; height: 40px; width: 200px;" />
<!--Notice! Input!-->
				<form id="Query" name="Query" method="get" action="Query.php">
					<table border="0" style="margin: 0px -360px -70px 100px">
						<tr>
						<td><input id="QueryContent" class="font Text" type="text" style="height: 35px; width: 0px;" /></td>
						<td><input type="image" src="image/ShortQueryButton.png" id="ShortQueryButton" class="Button" style="margin: 0px -35px 0px 0px; height: 40px; width: 0px" /></td>
						</tr>
					</table>
				</form>
<!--Input End-->
				<table style="margin: 90px -600px -40px 120px; height: 40px; width: 600px;">
					<tr>
						<td>
							<img src="image/TabCurrent.png" id="TabCurrent" select="true" style="position: absolute; margin: 0px -200px -40px 0px; height: 40px; width: 200px;" />
							<img src="image/Shadow.png" class="Shadow" id="TabCurrent" style="position: absolute; margin: 0px -200px -40px 0px; height: 40px; width: 200px;" />
						</td>
						<td>
							<img src="image/TabPrevious.png" id="TabPrevious" select="false" style="position: absolute; margin: 0px -200px -40px -20px; height: 40px; width: 200px;" />
							<img src="image/Shadow.png" class="Shadow" id="TabPrevious" style="position: absolute; margin: 0px -200px -40px -20px; height: 40px; width: 200px;" />
						</td>
						<td>
							<img src="image/TabHistory.png" id="TabHistory" select="false" style="position: absolute; margin: 0px -200px -40px -40px; height: 40px; width: 200px;" />
							<img src="image/Shadow.png" class="Shadow" id="TabHistory" style="position: absolute; margin: 0px -200px -40px -40px; height: 40px; width: 200px;" />
						</td>	
					</tr>
				</table>
				<table id="Current" border="1" style="margin: 170px 0px 0px 160px; width: 470px; border-collapse: collapse;">
					<!-- <tr><div id="hitokoto"><script>hitokoto()</script></div></tr> -->
					<tr><th>班级</th><th>学习</th><th>自律</th><th>生活</th><th>卫生</th><th>文艺</th><th>体育</th><th>宿管</th><th>总分</th></tr>
					<?php
<<<<<<< HEAD
						include "php-script/uco.php";
						// No need to establish mysqli link everytime method is called
						$globalconn = ulink();
						loadsettings($globalconn);			
						loaddepts($globalconn);
=======
						include "Uconn.php";
						loadsettings();			
						loaddepts();
>>>>>>> 975ccde36b95afcff628183ee38c1639234c3582
						printthiseval();
					?>
				</table>

				<table id="Previous" border="1" style="margin: 170px 0px 0px 160px; width: 470px; border-collapse: collapse;">
					<tr><th>班级</th><th>学习</th><th>自律</th><th>生活</th><th>卫生</th><th>文艺</th><th>体育</th><th>宿管</th><th>总分</th></tr>
					<!--Examples:-->
					<tr align="center"><td>高二二十一</td><td>110</td><td>110</td><td>110</td><td>110</td><td>110</td><td>110</td><td>110</td><td>250</td></tr>
					<!--Output End-->
				</table>
				
				<div id="History" style="position: absolute; margin: 170px 0px 0px 160px; height: 300px; width: 480px;">
					<iframe style="position: absolute; margin: 50px -470px 0px 0px; width: 480px; border-style: none;" src="ShowHistory.html">
						<p class="font" style="margin: 0px 0px 0px 0px; width: 470px;">
						哇塞，内联表格都无法正常显示，你的浏览器版本到底是要有多低？</p>
					</iframe>
					<table style="position: absolute; margin: 0px 0px 0px 225px">
						<tr>
						<td><p class="font">年份：</p></td>
						<td><input id="Year" class="Text" type="text" style="height: 22px; width: 70px;" /></td>
						<td><p class="font">月份：</p></td>
						<td>
						<select id="Month" style="height: 22px;">
							<option value="1">Jan</option>
							<option value="2">Feb</option>
							<option value="3">Mar</option>
							<option value="4">Apr</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">Aug</option>
							<option value="9">Sept</option>
							<option value="10">Oct</option>
							<option value="11">Nov</option>
							<option value="12">Dec</option>
						</select>
						</td>
						</tr>
					</table>
				</div>
				<img src="image/Window.png" id="SummaryWindow" style="margin: 70px 100px; width: 600px; height: 450px;" />
			</div>
		</div>
	</div>
<![endif]>
<img src="image/Background.jpg" id="Background" />
</body>
</html>
