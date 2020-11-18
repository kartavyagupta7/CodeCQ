<?php

if(isset($_POST['ques'])){
 //$qn=$_POST['qn'];
 $ques=$_POST['ques'];
 $a=$_POST['A'];
 $b=$_POST['B'];
 $c=$_POST['C'];
 $d=$_POST['D'];
 $ans= $_POST['ans'];
 $id=$testid=$_GET['id'];
 //echo $ques;
 //echo $a;
 //echo $b;
 //echo $c;
 //echo $d;
 //echo $ans;
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
//$inq1="insert into questions values(0,'$ques','$a','$b','$c','$d','$ans','$qn');";
$inq1="insert into Ques values(null,$id,'$ques','$a','$b','$c','$d','$ans');";
if($ques=='' || $ans=='' || $a=='' || $b=='' || $c=='' || $d=='')
  $x=false;
else
  $x=mysqli_query($con,$inq1);

if($x)
   echo "<div style='color:green;border:2px solid green;'>Inserted</div><script>alert('inserted');</script>";
else
	echo "<div style='color:red;border:2px solid red;'>Eroreeee</div>"; 
mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</script>
</head>
<body style="margin-top: 0px">
</body>
</html>