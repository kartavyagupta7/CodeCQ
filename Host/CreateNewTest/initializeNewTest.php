<?php
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
  while(1){
   $id=rand(10000,100000);
    $inq1="insert into Test (Testid) values($id);";
    $x=mysqli_query($con,$inq1);
    if($x)
      break; 
    mysqli_close($con);
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
	.inputbox{
		height:40px;
		width:280px;
		margin:10px;
	}
	div{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		border: 1px solid black;
		width: 27%;
		margin-left:37%;
		border-radius:10px;
	}
</style>
</head>
<body>
	<br>
<p align="center"><font size="10">Code<b style="color: darkgreen">CQ.</b></font></p>
<form action="test.php?id=<?php echo $id; ?>" target="_blank" method="post" style="margin-top: 4%;">
	<div style="border: 1px solid black;width: 27%;margin-left:37%;" id="div">
	<h2 align="center"><b>Test ID: <?php echo $id; ?></b></h2>
	<table align="center" style="margin-top:70px;margin-bottom: 50px; ">
		<tr >
			<td><input type="password" name="testpassword" placeholder="Test Password: " class="inputbox"><br></td>
		</tr>
		<tr>
			
			<td><input type="password" name="adminpassword" placeholder="Admin Password: " class="inputbox"><br></td>
		</tr>
		<tr>
			
			<td><input type="number" name="totaltime" placeholder="Max Time: " class="inputbox"><br><br></td>
		</tr>
		<tr>
			
			<td align="right"><input type="submit" value="Next"></td>
		</tr>

	</table><br>
</form>
</div>
</table>
</body>
</html>