<?php

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

header ("Location: login.php");

}

?><?
include ('db_conn.php');
$roll_no=$_POST['roll_no_hidden'];
$name=$_POST['name'];
$ph_no=$_POST['ph_no'];
$item=$_POST['items'];
$quantity=$_POST['quantity_issuing'];
$event_name=$_POST['event_name'];
$status=0;
try{
	$query="INSERT INTO entry VALUES ('$roll_no','$name','$ph_no','$item','$quantity','$event_name',now(),'issue')";
	$insert_new="INSERT INTO students_entry VALUES ('$roll_no','$name','$ph_no','$item','$quantity','$event_name','0','no')";
	$query4="SELECT issued FROM students_entry WHERE roll_no='$roll_no' AND item='$item' AND event_name='$event_name'";
	mysql_query($query);
	$execute=mysql_query($query4);
	$row=mysql_fetch_array($execute);
	if($row)
	{	
		$pre_quantity=$row['issued'];
		$new_quantity=$pre_quantity+$quantity;
		$update_query="UPDATE students_entry SET issued='$new_quantity',returned_all='no' WHERE roll_no='$roll_no' AND event_name='$event_name' AND item='$item'";
		mysql_query($update_query);
	}
	else
		mysql_query($insert_new);
	$item_query="SELECT * FROM items WHERE item_name='$item'";
	$execute_query=mysql_query($item_query);
	$row=mysql_fetch_array($execute_query);
	if($row)
	{
		$available=$row['available']-$quantity;
		$update_item="UPDATE items SET available='$available' WHERE item_name='$item'";
		mysql_query($update_item);
	}


}
catch(Exception $e){
	echo $e;
}

?>
<html>
    <link rel="icon" href="favi.png" type="image/png" sizes="16x16">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bootstrap/css/signin.css" rel="stylesheet">
    <head>
        <title>
            K!14
        </title>
         <style type="text/css">
               body 
               {
                background: url(images/bg.png);
               }
               .header-color
               {
                background: url(images/header.png);
                padding: 20px;
               }
               .content
               {
                background: #f5f5f5;
                min-height: 500px;
                max-height: 500px;
               }
               .padding
               {
                padding:20px;
               }
               .navbar .navbar-inner {
                    padding: 0;
                  }
                  .navbar .nav {
                    margin: 0;
                    display: table;
                    width: 100%;
                  }
                  .navbar .nav li {
                    display: table-cell;
                    width: 10%;
                    float: none;
                  }
                  .navbar .nav li a {
                    font-weight: bold;
                    text-align: center;
                    border-left: 1px solid rgba(255,255,255,.75);
                    border-right: 1px solid rgba(0,0,0,.1);
                  }
                  .navbar .nav li:first-child a {
                    border-left: 0;
                    border-radius: 3px 0 0 3px;
                  }
                  .navbar .nav li:last-child a {
                    border-right: 0;
                    border-radius: 0 3px 3px 0;
                  }
    
          </style>       
    </head>
    <body>
        <div class="container header-color ">
            <div class="row-fluid">
                <div class="col-md-4">
                    <img src="images/3.png" width="200" height="60">
                </div>
                <div class="col-md-4">
                    <img style="float:right" src="images/1.png" width="300" height="80">
                </div>
                <div class="col-md-4">
                    <img style="float:right" src="images/2.png" width="200" height="80">
                </div>
            </div>
        </div>
        <div class="container content ">
          <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="issue.php">Issue</a></li>
                <li><a href="return.php">Return</a></li>
                <li><a href="search.php">Search</a></li>
                <li><a href="add_item.php">Add Item</a></li>
                <li><a href="logout.php">LogOut</a></li>
              </ul>
            </div>
          </div>
        </div>
            <div class="row-fluid">
              <center>
              <label>Updated Successfully</label>
              </center> 

                  
            </div>
        </div>
    </body>
    </html>