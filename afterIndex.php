<?php
$dbHost="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="globalChat";
$conn=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName);
session_start();
$_SESSION["dbHost"]=$dbHost;
$_SESSION["dbUsername"]=$dbUsername;
$_SESSION["dbPassword"]=$dbPassword;
$_SESSION["dbName"]=$dbName;
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome ,your Anonimosity!</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body{background-color:lightblue;}
.bigFormContainer{display:flex;align-items:center;justify-content:center;height:100vh;width:100vw;background-color:blue;}
.bigFormContainer{max-width:100%;box-sizing:border-box;overflow-wrap:break-word;}
.formContainer{background-color:lightblue;padding-top:20px;padding-bottom:20px;padding-right:30px;padding-left:30px;border:3px solid white;}
.formContainer{max-width:100%;box-sizing:border-box;overflow-wrap:break-word;}
.formContainer form #go{background-color:pink;}
.formContainer form{max-width:100%;box-sizing:border-box;overflow-wrap:break-word;}
.formContainer form input{max-width:100%;border-sizing:border-box;overflow-wrap:break-word;}
</style>
</head>
<body>
<div class="bigFormContainer">
<div class="formContainer">
<form action="" method="post">
<input name="currentUsername" type="text" placeholder="Choose a username">
<br><br>
<input type="submit" id="go" value="Let's go">
</form>
<?php
if(isset($_POST["currentUsername"])){
$potentialUsername=$_POST["currentUsername"];
$query="select * from globalChat where username=?;";
$configuredQuery=mysqli_prepare($conn,$query);
mysqli_stmt_bind_param($configuredQuery,"s",$potentialUsername);
mysqli_stmt_execute($configuredQuery);
$result=mysqli_stmt_get_result($configuredQuery);
$len=0;
while($row=mysqli_fetch_assoc($result)){$len++;}
if($len>0){
echo "<br><strong style='color:red'>This username is not available !</strong>";
}
else{
$_SESSION["currentUsername"]=$potentialUsername;
$query2="insert into globalChat (username) values (?);";
$configuredQuery2=mysqli_prepare($conn,$query2);
mysqli_stmt_bind_param($configuredQuery2,"s",$_SESSION["currentUsername"]);
mysqli_stmt_execute($configuredQuery2);
header("Location:globalChat.php");
}
}
?>
</div>
</div>

</body>
</html>