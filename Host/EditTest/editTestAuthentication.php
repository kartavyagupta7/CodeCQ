<?php
  if(isset($_POST['submit'])){
     //echo $_POST['adminpassword'];
  	$tid=$_POST['testid'];
	$p= $_POST['adminpassword'];
	$flag=0;
//
   $host = "localhost";
   $user = "root";
   $password =  "";
   $db = "onlinedb";
   $con = mysqli_connect($host,$user,$password,$db);
   if(!$con)
	echo("failed");
  	mysqli_select_db($con,'onlinedb');
  	//
    $slctq1="select * from Test;";
    $result1=mysqli_query($con,$slctq1);
    $num1=mysqli_num_rows($result1);
    for($i=1;$i<=$num1;$i++){
    	$row1=mysqli_fetch_array($result1);
    	if($row1['Testid']==$tid){
    		if($row1['Adminpassword']==$p){
    			$flag=1;
    			break;
    		}
    	}
    }
    if($flag==1)
       header("Location:editTest.php?id=$tid");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
<style type="text/css">
	#incorrect{
       color: red;
       display:none;
       margin-left: 40%;
	}
	div{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
</style>
</head>
<body onclick="retain()">
	<br>
<p align="center"><font size="10">Code<b style="color: darkgreen">CQ.</b></font></p>
<form action="" method="post" style="margin-top: 5%;">
	<div style="border: 1px solid black;width: 27%;margin-left:37%;border-radius:10px" id="div">
	<h2 align="center"><b>Test Authentication</b></h2>
	<table align="center" style="height:200px;margin-top:20%;" border="0px">
		<tr>
			<td><input type="text" name="testid" style="height:40px;width:280px;margin:10px" placeholder="Test Id"></td>
		</tr>
		<tr>
			<td><input type="password" name="adminpassword" style="height:40px;width:280px;margin:10px" placeholder="Admin Password: "></td>
		</tr>
		<tr>
		
			<td align="right"><input type="submit" value="Next" name="submit"></td>
		</tr>

	</table><br>
	<p id="incorrect" >Wrong Password</p><br><br>
	<script type="text/javascript">
		var flag=<?php echo $flag; ?>;
		if(flag==0){
			document.getElementById("incorrect").style.display="inline";
			document.getElementById("div").style.border="2px solid red";
		}
		function retain(){
			document.getElementById("div").style.border="1px solid black";
		}
	</script>
</form>
<br>
</div><br>
</body>
</html>