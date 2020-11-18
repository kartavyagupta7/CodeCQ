<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<style>
		.ip2 {
    border-radius: 25px;
    
    background-color:rgb(245,245,245);
    padding: 5px; 
    width: 300px;
    height: 35px;    
}
	</style>
</head>
<body >
	<div id="div1"  style="width:800px;height:450px;background-color:white; margin: 100px;margin-left:250px">
		<table border="0px">
			<tr height="400px">
				<td width="400">
					<img src="loginIcon.jpg" height="280" width="380">
				</td>
				<td width="400" align="center">
					<font size="40">Students Login</font><br><br><br>
				<form action="main.php?testid=<?php echo $_GET['id'];?>" method="post">

					<input type="text"  class="ip2" placeholder="Roll Number" name="rollno" ><br><br>
					<input type="password" class="ip2" placeholder="Test Password" name="password"/><br><br><br>
					<input type="submit" value="login" style="background-color: green;width:300px;height:35px;border-radius:20px;color:white" onmouseover="f1(this)" onmouseout="f2(this)"/><br>
					<font color="grey">Forgot <b>usename/Password?</b>	</font>
				</form>
					<br><br><br><br><br><a href="createAccount.html" style="text-decoration:none;color: grey">Create your account</a>
				</td>
			</tr>
		</table>
		<script>
 					function f1(x)
 					{
 						
 						x.style.backgroundColor="blue";
                        x.style.color="white";
 					}
 					function f2(x)
 					{
 						x.style.backgroundColor="green";
 					}
 				</script>

	</div>
   

</body>
</html>