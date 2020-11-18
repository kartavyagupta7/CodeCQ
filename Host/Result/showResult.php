<?php
$tid=$_GET['id'];
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
      $slctq1="select * from Score;";
      $result1=mysqli_query($con,$slctq1);
      $num1=mysqli_num_rows($result1);
      $k=0;
      //$score=[];
      for($i=1;$i<=$num1;$i++){
        $row1=mysqli_fetch_array($result1);
    	  if($row1['testid']==$tid){
    		  $score[$k]=$row1['score'];
    		  $rollno[$k]=$row1['Rollno'];
    		  $k++;
    	  }
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
</head>
<body>
	<p align="center"><font size="10" >Code<b style="color:darkgreen">CQ.</b></font></p>
<p align="center">Test Id: <b><?php echo $tid;?></b></p><br><br>
<h3 style="margin-left:24%; "><b>Result:</b></h3>
<div id="result" style="width:50%;margin-left:25%;" ></div>
<script type="text/javascript">
	var students=<?php echo $k; ?>;
	var score=<?php echo json_encode($score); ?>;
	var Rno=<?php echo json_encode($rollno); ?>;
	output="<table class='table table-striped' align='center' width='50%' border='1px'>"
	output +="<tr>"
		output +="<th>S.No.</th><th>Roll Number</th><th>Score</th>"
	output +="</tr>"
	for(i=0;i<students;i++){
      output +="<tr align=center>"
		output +="<td>"+(i+1)+"</td><td>"+Rno[i]+"</td><td>"+score[i]+"</td>"
      output +="</tr>"
	}
	output +="</table"
	document.getElementById("result").innerHTML=output;
</script>
</body>
</html>

