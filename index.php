<!DOCTYPE html>
<html>
<head>
<title>Where... who, what am I ?</title>
<style>
body{color:white;background-color:black;color:lightgreen}
h1{text-align:center;color:red;max-width:100%;box-sizing:border-box;overflow-wrap:break-word;}
p{box-sizing:border-box;max-width:100%;overflow-wrap:break-word;}
ul{max-width:100%;box-sizing:border-box;overflow-wrap:break-word;}
li{max-width:100%;box-sizing:border-box;overflow-wrap:break-word;}
body{font-family:"Courier New";}
form{text-align:center;max-width:100%;box-sizing:border-box;overflow-wrap:break-word;}
input{background-color:red;max-width:100%;box-sizing:border-box;overflow-wrap:break-word;color:white}
input{transition:background-color 1s ease;}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1><i>What is this ?</i></h1>
<p>
Hello,dear friend.
	I am the admin of this simple website.
	Please don't provide any information here about your:
<ul>			<li>	sex</li>
			<li>	age</li>
			<li>	Physical condition (hair color,muscles or fat,etc)</li>
			<li>	Achievements in real or virtual life</li>
			<li>	Money you posses</li>
</ul>
	Because here we are nothing more than ideas.<br>
		We have no name,sex or age.
		We have no body and no soul.<br>We are nothing more that merely ideas in this vast cosmos of the web ...
		<br>We are ... globalChat !
</p>
<form action="" method="post">
<input type="submit" value="Become us" name="enter"/>
</form>
<?php
if(isset($_POST["enter"])){header("Location:afterIndex.php");}
?>
</body>
<script>
input=document.querySelectorAll("input")[0];
function changeInput(){
if(input.style.backgroundColor=="red"){input.style.backgroundColor="lightgreen";input.style.color="black";}
else if(input.style.backgroundColor=="lightgreen"){input.style.backgroundColor="blue";input.style.color="white";}
else{input.style.backgroundColor="red";}}
setInterval(changeInput,1000);
</script>
</html>