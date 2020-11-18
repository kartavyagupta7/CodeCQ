<?php
$testid=$_GET['id'];
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
    	if($row1['Testid']==$testid){
    		$tespass=$row1['Testpassword'];
    		$adminpass=$row1['Adminpassword'];
    		$totaltime=$row1['maxtime'];
    	}
    }
     mysqli_close($con);
    
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


</head>
<body>
	<p align="center"><font size="10">Code<b style="color: darkgreen">CQ.</b></font></p>
	<p align="center"><b>Test Link:</b>https://kartavyademo.000webhostapp.com/CodeCQ/TakeTest/login.php?id=<?php echo $_GET['id']; ?></p>
	<table border="0px" style="width: 100%;">
		<tr>
			<td><b>Test Id: <?php echo $_GET['id']; ?></b></td>
		</tr>
		<tr >
			<td><b>Test Password: <?php echo $tespass;?></b></td>
			<td><b>Admin Password: <?php echo $adminpass;?></b></td>
			<td><b>Max Time: <?php echo $totaltime ?></b></td>
		</tr>
	</table>
	<hr>
	<iframe src="check.php" name="query" width="100%" height="25px" frameborder="1px"></iframe><br><br>
	 
	<form action="check.php?id=<?php echo $testid;?>" target="query" method="POST">
	<table border="0px" width="100%" height="300px">
		<tr align="center">
			<td align="right">QN</td>
			<td align="left"><input type="number" name="qn"></td>
			<td align="right">Ques</td>
			<td colspan="2" align="left"> <textarea rows="2" cols="100" name="ques"></textarea></td>
		</tr>
		<tr align="center">
				
			<td colspan="2">A.<input type="text" name="A"></td>
			<td rowspan="2" colspan="2">Ans<br><input type="text" name="ans"></td>
		</tr>
		<tr align="center">
		    
		    <td colspan="2">B.<input type="text" name="B"></td>
		</tr>
		<tr align="center">
		    
		    <td colspan="2">C.<input type="text" name="C"></td>
		    <td rowspan="2" colspan="2" align="center"><input type="submit" target="query" ></td>
		</tr>
		<tr align="center">
		    
		    <td colspan="2">D.<input type="text" name="D"></td>
		</tr>
	</table><br><br>
	<p align="right" padding="20px"><a href="deleteTable.php" >DELETE PRIVIOUS TEST</a></p>
</form>

</form>
</body>
</html>
