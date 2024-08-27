<?php
session_start();
if(!isset($_SESSION["up"])){
$_SESSION["up"]=10;
}
$currentUsername=$_SESSION["currentUsername"];
$conn=mysqli_connect($_SESSION["dbHost"],$_SESSION["dbUsername"],$_SESSION["dbPassword"],$_SESSION["dbName"]);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>g!l!o!...CHaT!!!</title>
<style>
.formContainer2{box-sizing:border-box;overflow-wrap:break-word;max-width:100%;}
.formContainer2 form{box-sizing:border-box;overflow-wrap:break-word;max-width:100%;}
.formContainer1{box-sizing:border-box;overflow-wrap:break-word;max-width:100%;}
.formContainer1 form{box-sizing:border-box;overflow-wrap:break-word;max-width:100%;}
.formContainer1 form input{box-sizing:border-box;overflow-wrap:break-word;max-width:100%;}
.formContainer2 form input{box-sizing:border-box;overflow-wrap:break-word;max-width:100%;}
body{background-color:black;color:white;}
.formContainer2 form input {margin-right:50px;}
.formContainer2{margin-bottom:20px;}
mess{color:lightgreen;padding:5px;border-radius:10px;box-sizing:border-box;max-width:100%;overflow-wrap:break-word;}
strong{color:lightblue;}
</style>
</head>
<body>
<div class="formContainer2">
<form action="" method="post">
<input type="submit" value="UP" name="up" style="background-color:blue;color:white"/><input type="submit" value="DOWN" name="down" style="background-color:red;color:black"/>
</form>

<?php
if(isset($_POST["message"])){
$currentMessage=$_POST["message"];
$query1="insert into globalChat (username,message) values(?,?);";
$configuredQuery1=mysqli_prepare($conn,$query1);
mysqli_stmt_bind_param($configuredQuery1,"ss",$currentUsername,$currentMessage);
mysqli_stmt_execute($configuredQuery1);
$_POST["message"]=NULL;
}
?>

<?php
$messages=array();
$usernames=array();
$query2="select * from globalChat where message!='';";
$configuredQuery2=mysqli_prepare($conn,$query2);
mysqli_stmt_execute($configuredQuery2);
$result=mysqli_stmt_get_result($configuredQuery2);
$len=0;
while($row=mysqli_fetch_assoc($result)){$usernames[$len]=$row["username"];$messages[$len]=$row["message"];$len++;}
?>

<?php
if(isset($_POST["up"])){$_SESSION["up"]+=1;$_POST["up"]=NULL;}
if(isset($_POST["down"])){if($_SESSION["up"]>0){$_SESSION["up"]-=1;}
$_POST["down"]=NULL;}
while($len-$_SESSION["up"]-10<0){$_SESSION["up"]-=1;}
?>

</div>
<div class="messagesContainer">
<?php
if($len<10){
for($i=0;$i<$len;$i++){echo "<strong><i>$usernames[$i]</i></strong> <i>says</i> <mess>$messages[$i]</mess><br><br>";}
}
else{
for($i=$len-$_SESSION["up"]-10;$i<$len-$_SESSION["up"];$i++){echo "<i><strong>$usernames[$i]</i></strong> <i>says</i> <mess>$messages[$i]</mess><br><br>";}}
?>
</div>
<hr>
<div class="formContainer1">
<form action="" method="post">
<input type="text" name="message"/><br><br><input type="submit" value="SEND"/>
</form>
</div>
<body>
</html>