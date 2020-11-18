<?php
  $roll=$_GET['rollno'];
  $score=$_GET['score'];
  $tid=$_GET['testid'];
    //echo $tid;
    //echo "//";
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
$inq1="INSERT INTO Score(Rollno, score,testid) VALUES ('$roll','$score','$tid');";
$x=mysqli_query($con,$inq1);
if(!$x)
  echo "Errore(Test NotSubmitted)";
mysqli_close($con);
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </head>
<body>
    <?php if(!$x){echo "<!--";}?>
    <h1 align="center" style="margin-top:90px;">Successfully Submitted</h1>
    <p align="center"><font size="10">Code<b style="color: darkgreen">CQ.</b></font></p>
    <p align="center">Correct Answers:<?php echo $score;?></p>
    
</body>
</html>





