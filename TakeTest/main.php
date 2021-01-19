<?php
 $r=$_POST['rollno'];
 if(isset($_GET['testid'])){
 	$tid=$_GET['testid'];//echo $tid;
 }else{
   $tid=$_POST['testid'];//echo "heeloo";
 }
 $p=$_POST['password'];
 // echo $r;
  //echo $p;
  //echo $tid;
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
    		if($row1['Testpassword']==$p){
    			$flag=1;
    			$time=$row1['maxtime'];
    		}
    		else
    			$flag=0;
    		break;
    	}
    }
 
 if($flag==1)
 {
    $slctq1="select * from Ques;";
    $result1=mysqli_query($con,$slctq1);
    $num1=mysqli_num_rows($result1);
    $k=0;
     for($i=1;$i<=$num1;$i++)
     {
     	$row1=mysqli_fetch_array($result1);
     	if($row1['Testid']==$tid){
     	  $k++;
    	  $ques[$k]=$row1['questions'];
    	  $ans[$k]=$row1['ans'];
          $a[$k]=$row1['A'];
          $b[$k]=$row1['B'];
          $c[$k]=$row1['C'];
          $d[$k]=$row1['D'];
          $qn[$k]=$k; 
        }
      }
     // echo $k;
  }
?>
<!DOCTYPE html>
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
  <style type="text/css">
  	.demobutton {
  border-radius: 25px ;
  border: 1px solid black;
  height: 50px;
  width: 50px;
  margin: 5px;
  background-color: rgb(220,220,220);
  color: black;
}
button:focus{

 outline:none;
}
#main{

  overflow: scroll;
  height: 450px;
  width: 100%;
}
#palatte{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	
	height: 100%;
}
  </style>


</head>
<body oncontextmenu="return false">
	<?php 
	  if($flag==0)
         {
         	echo "PASSWORD INCORRECT";
         	echo "<!--";

         }
        
	?>

  <table border="0px" width="100%" height="610px">
 	<tr>
 <td width="22%" style="background-color: white;vertical-align: top;">
       <div id="palatte">      <br>  
	<h1 align="center" class="text-danger">TIME LEFT : </h1>
	<h1 align="center" class="text-danger" id="timer">00:00 </h1>
	<hr><br>
    <p align="center">Test Id: <b><?php echo $tid; ?></b></p>
	<br><br><br>
	<div class="container">
		<p id="btns"></p>
		<br><br>
		<p align="center">
        <button onclick="end()" style="background-color: orange;color:white; height:60px;width: 120px;margin-left: 00px">END TEST</button></p>
		
		
	</div>
	<br><br>
 	</div>		
 </td>
 <td style="vertical-align: top;">
 	
 	<h1 class="display-4" align="center">Code<b style="color: darkgreen;">CQ.</b></h1>
    <h3 align="center"><small><b>Roll Number : <?php echo $r?><b></small></h3>
    <hr>
    <p align="center" id="p1">
				 <button onclick="start(<?php echo $time; ?>)" id="b1" style="background-color: green;height:50px;width: 100px;color:white">START</button>
			    </p>
			    <font id="end" style="display: none;margin-left: 200px;" >TO SUBMITT YOUR TEST SUCCESSFULLY PLEASE CLICK ON END TEST</font>
			     <font id="mmm" style="display: none;">
    <h2 style="margin-left: 10px;"><small>Ques <font id="qno"></font>.)</small></h2>
    
   
	
           <h2 style="margin-left: 120px;margin-right: 20px"><small id="ques"></small></h2><br><br>

           <div id="da" onclick="a(this)" style="border: solid 1px ;margin-left: 15%;margin-right: 15%;padding-left:10px "><h2><small id="a"></small></h2></div><br>
           <div id="db" onclick="b(this)" style="border: solid 1px ;margin-left: 15%;margin-right: 15%;padding-left:10px "><h2><small id="b"></small></h2></div><br>
           <div id="dc" onclick="c(this)" style="border: solid 1px ;margin-left: 15%;margin-right: 15%;padding-left:10px "><h2><small id="c"></small></h2></div><br>
           <div id="dd" onclick="d(this)" style="border: solid 1px ;margin-left: 15%;margin-right: 15%;padding-left:10px "><h2><small id="d"></small></h2></div>
           <br><br>
           

           
           <table border="0px" style="margin-left:75%">
           	<tr> 
           		<td>
          <button onclick="next()" id="next" style="background-color: white;height:50px;width: 100px;">NEXT</button></td>
               <td width="10px"></td>
               <td>
          <button onclick="previous()" id="prev" style="background-color: white;height:50px;width: 100px;" >Return</button></td>
            </tr>
          </table>
          <br><br>
        
      </font>
     
         
    </td>
 	</tr>
 </table>
 <?php 
	  if($flag==0)
        echo "-->";
	?>

 <script type="text/javascript">
 	q=1;
 	count=0;
	var Q=<?php echo json_encode($ques); ?>;
	var ANS=<?php echo json_encode($ans); ?>;
	var A=<?php echo json_encode($a); ?>;
	var B=<?php echo json_encode($b); ?>;
	var C=<?php echo json_encode($c); ?>;
	var D=<?php echo json_encode($d); ?>;
	var QN=<?php echo json_encode($qn); ?>;
	var rows=<?php echo ceil($num1/3); ?>;
	var btns=<?php echo $k ?>;
	if(btns==q)
		document.getElementById("next").style.display="none";

	output="<table border='0px' align='center'>"
	k=0;
	for(i=1;i<=rows;i++){
		 output=output+"<tr align='center'>"
		for(j=1;j<=3;j++){
			k++;
			if(k<=btns){
		      output=output+"<td><button class='demobutton' id='"+k+"' onclick='particular("+k+")'>"+k+"</button></td>"
		    }
		}
		output=output+"</tr>"
	}
	output=output+"</table>"
	document.getElementById("btns").innerHTML=output;
//	document.getElementById("btns").innerHTML=n;
    //alert(n);


	document.getElementById("qno").innerHTML=QN[1];
	document.getElementById("ques").innerHTML=Q[1];
	document.getElementById("a").innerHTML=A[1];
	document.getElementById("b").innerHTML=B[1];
	document.getElementById("c").innerHTML=C[1];
	document.getElementById("d").innerHTML=D[1];
	function start(x)
	{
		document.getElementById("b1").style.display = "none";
		document.getElementById("prev").style.display="none";
		document.getElementById("mmm").style.display = "inline";
		timer(x);
         
	}
	function timer(x)
	{
		//alert(x);
		 count=x;
		      function timeIt()
		      {
		      	
		      	
		      	var m=Math.floor(count/60);
		      	if(count!=-1)
		      	{
		     	  var timer=document.getElementById("timer");
		     	  timer.innerHTML=m+":"+count%60;
		     	}
		     	if(count==-1)
		      		{
		      			clearInterval(z);
		      			document.getElementById("mmm").style.display = "none";
		      			document.getElementById("end").style.display = "inline";
		      		}
		      		count--; 
		      }
		       var z=setInterval(timeIt,1000);	
     } 
	function next()
	{
		q++;
	if(q==	btns)
		document.getElementById("next").style.display="none";
	 else
		document.getElementById("next").style.display="inline";

	document.getElementById("prev").style.display="inline";

	document.getElementById("qno").innerHTML=QN[q];
	document.getElementById("ques").innerHTML=Q[q];
	document.getElementById("a").innerHTML=A[q];
	document.getElementById("b").innerHTML=B[q];
	document.getElementById("c").innerHTML=C[q];
	document.getElementById("d").innerHTML=D[q];
	highlight(); 

	

	}
	function previous()
	{
		q--;
	if(q==1)
	   document.getElementById("prev").style.display="none";
	else
	   document.getElementById("prev").style.display="inline";

	document.getElementById("next").style.display="inline";

	document.getElementById("qno").innerHTML=QN[q];
	document.getElementById("ques").innerHTML=Q[q];
	document.getElementById("a").innerHTML=A[q];
	document.getElementById("b").innerHTML=B[q];
	document.getElementById("c").innerHTML=C[q];
	document.getElementById("d").innerHTML=D[q];
	highlight(); 
	}
	function particular(x)
	{
       q=x;
       document.getElementById("qno").innerHTML=QN[q];
	document.getElementById("ques").innerHTML=Q[q];
	document.getElementById("a").innerHTML=A[q];
	document.getElementById("b").innerHTML=B[q];
	document.getElementById("c").innerHTML=C[q];
	document.getElementById("d").innerHTML=D[q];
	if(q==btns)
		document.getElementById("next").style.display="none";
	else
		document.getElementById("next").style.display="inline";
	if(q==1)
		document.getElementById("prev").style.display="none";
	else
		document.getElementById("prev").style.display="inline";

	highlight(); 

	}
	var arr=[];
	function a(x)
	{
      arr[q]='A';
      document.getElementById(q).style.backgroundColor="orange";
      document.getElementById(q).style.color="white";
      highlight();
	}
	function b(x)
	{
        arr[q]='B';
        document.getElementById(q).style.backgroundColor="orange";
        document.getElementById(q).style.color="white";
        highlight();
	}
	function c(x)
	{
        arr[q]='C';
        document.getElementById(q).style.backgroundColor="orange";
        document.getElementById(q).style.color="white";
        highlight();
	}
	function d(x)
	{
        arr[q]='D';
        document.getElementById(q).style.backgroundColor="orange";
        document.getElementById(q).style.color="white";
        highlight();
	}
	function end()
	{
		//document.getElementById("end").innerHTML=arr[1];
		  score=0;
		  //count=0;
		  for(i=1;i<=btns;i++)
		  {
			//document.getElementById("end").innerHTML=ANS[2];
			if(arr[i]==ANS[i])
				score++;

		  }
			var src="insertScore.php?rollno="+<?php echo $r ?>;
			src+="&score="+score+"&testid="+<?php echo $tid ?>;
		  src=encodeURI(src);
		  window.location.href= src;
		
	
	}
	function highlight()
	{

		if(arr[q]=='A')
	    {
			 	document.getElementById("da").style.backgroundColor="yellow";
			 	document.getElementById("db").style.backgroundColor="white";
			 	document.getElementById("dc").style.backgroundColor="white";
			 	document.getElementById("dd").style.backgroundColor="white";
		}
		else if(arr[q]=='B')
		{
                document.getElementById("db").style.backgroundColor="yellow";
			 	document.getElementById("da").style.backgroundColor="white";
			 	document.getElementById("dc").style.backgroundColor="white";
			 	document.getElementById("dd").style.backgroundColor="white";
		}
		else if(arr[q]=='C')
		{
			   document.getElementById("dc").style.backgroundColor="yellow";
			 	document.getElementById("db").style.backgroundColor="white";
			 	document.getElementById("da").style.backgroundColor="white";
			 	document.getElementById("dd").style.backgroundColor="white";
		}
		else if(arr[q]=='D')
		{
			   document.getElementById("dd").style.backgroundColor="yellow";
			 	document.getElementById("db").style.backgroundColor="white";
			 	document.getElementById("da").style.backgroundColor="white";
			 	document.getElementById("dc").style.backgroundColor="white";
		}
		else
		{ 
		    	document.getElementById("dd").style.backgroundColor="white";
			 	document.getElementById("db").style.backgroundColor="white";
			 	document.getElementById("da").style.backgroundColor="white";
			 	document.getElementById("dc").style.backgroundColor="white";
		
		}

		
	}
 </script>
</body>
</html>