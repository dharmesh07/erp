<?php
include('db_conn.php');
try
{
	$u_name=$_POST["username"];
	$u_pass=$_POST["password"];
	$ques="SELECT * from login where username='$u_name' AND password='$u_pass'";
	$ans=mysql_query($ques);
	$qui=mysql_fetch_array($ans);
	if($qui)
		{
			session_start('login');
			$_SESSION['login']=md5("admin");
			header('Location:issue.php');
		}
	else
		{
			echo $ans;
		}
	
	
}
catch(Exception $e)
{
	echo $e;
}
?>