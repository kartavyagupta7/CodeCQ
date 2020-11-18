<?php
 $tid=$_GET['id'];
 $flag=0;
 if(isset($_POST['submit'])){
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
    $testpass=$_POST['testpassword'];
    $maxtime=$_POST['maxtime'];
    if($testpass=='' and $maxtime=='')
      $inq1='';
    if($testpass!='' and $maxtime!='')
      $inq1="update Test set Testpassword='$testpass', maxtime='$maxtime' where Testid=$tid;";
    else if($testpass!='')
      $inq1="update Test set Testpassword='$testpass' where Testid=$tid;";
    else
      $inq1="update Test set maxtime='$maxtime' where Testid=$tid;";
    $x=mysqli_query($con,$inq1);
    if($x && ($testpass!='' || $maxtime!=''))
    	echo "<script>alert('changes are updated');</script>";
    //else
    	//echo "errore";
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
  div{
    border: 1px solid black;
    width: 27%;
    margin-left:37%;
    border-radius:10px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
</style>
</head>
<body>
<p align="center"><font size="10">Code<b style="color: darkgreen">CQ.</b></font></p>
<br><br>
<div>
<h2 align="center"><b>Test ID: <?php echo $tid; ?></b></h2><br><br>
<form action="" method="post">
<table border=0px style="height:200px" align="center">
	<tr>	
		<td><input type="text" name="testpassword" style="height:40px;width:280px;margin:10px" placeholder="New Test Password"></td>
	</tr>
	<tr>
		<td><input type="text" name="maxtime" style="height:40px;width:280px;margin:10px" placeholder="Total Test Time"></td>
	</tr>
	<tr>
		<td align="right"><input type="submit" name="submit" value="Change"></td>
	</tr>
</table>
<br><br>
<p align="center"><a href="addQuestions.php?id=<?php echo $tid; ?>" target="_blank">Add Questions</a></p>
<br><br>
</form>
</div>
</body>
</html>