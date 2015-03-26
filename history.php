<?php

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

header ("Location: login.php");

}

?><html>
  <link rel="icon" href="favi.png" type="image/png" sizes="16x16">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="bootstrap/css/signin.css" rel="stylesheet">
    <head>
        <title>
            K!14 | History
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
                  .box{
                    max-height: 390px;
                    overflow:auto;
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
              
              
                    
              
                   <?php
                          include('db_conn.php');
                            $item=$_POST['item1'];
                            $roll_no=$_POST['roll_no1'];
                            $event_name=$_POST['event_name1'];
                            $type=$_POST['type'];
                            $flag=1;

                            if($roll_no!="" && $item!="" && $event_name!="")
                              $sql = "SELECT * FROM entry WHERE item='$item' AND roll_no='$roll_no' AND event_name='$event_name'";
                            else if($roll_no!="" && $item!="")
                              $sql = "SELECT * FROM entry WHERE roll_no='$roll_no' AND item='$item'";
                            else if($roll_no!="" && $event_name!="")
                              $sql = "SELECT * FROM entry WHERE roll_no='$roll_no' AND event_name='$event_name'";
                            else if($item!="" && $event_name!="")
                              $sql = "SELECT * FROM entry WHERE item='$item' AND event_name='$event_name'";
                            else if($item!="")
                              $sql = "SELECT * FROM entry WHERE item='$item'";
                            else if($roll_no!="")
                              $sql = "SELECT * FROM entry WHERE roll_no='$roll_no'";
                            else if($event_name!="")
                              $sql = "SELECT * FROM entry WHERE event_name='$event_name'";
                            else
                              $flag=0;
                            
                            
                            if($flag==1)
                            {
                              $result = mysql_query($sql);
                              echo '<div class="table-responsive box" >';
                              echo '<table class="table table-bordered" cellpadding="10%"  style="height=300px;overflow:scroll">';
                              if($type=="all")
                              echo '<th>Roll_no</th><th>Name</th><th>Phone No</th><th>Event</th><th>Item</th><th>Quantity</th><th>Time</th><th>Issue/Return</th>';
                              else if($type=="issue")
                                echo '<th>Roll_no</th><th>Name</th><th>Phone No</th><th>Event</th><th>Item</th><th>Quantity</th><th>Time</th>';
                              else if($type=="return")
                                echo '<th>Roll_no</th><th>Name</th><th>Phone No</th><th>Event</th><th>Item</th><th>Quantity</th><th>Time</th>';

                             while ($row = mysql_fetch_array($result)) {
                              switch($type)
                              {
                                case "all":
                                            echo '<tr>';
                                            echo "<td>" . $row['roll_no'] ."</td>";
                                            echo "<td>" . $row['name'] ."</td>";
                                            echo "<td>" . $row['ph_no'] ."</td>";
                                            echo "<td>" . $row['event_name'] ."</td>";
                                            echo "<td>" . $row['item'] ."</td>";
                                            echo "<td>" . $row['quantity'] ."</td>";
                                            echo "<td>" . $row['time'] ."</td>";
                                            echo "<td>" . $row['type'] ."</td>";
                                            echo '</tr>';
                                            break;
                                case "issue": if($row['type']=="issue")
                                            {
                                              echo '<tr>';
                                            echo "<td>" . $row['roll_no'] ."</td>";
                                            echo "<td>" . $row['name'] ."</td>";
                                            echo "<td>" . $row['ph_no'] ."</td>";
                                            echo "<td>" . $row['event_name'] ."</td>";
                                            echo "<td>" . $row['item'] ."</td>";
                                            echo "<td>" . $row['quantity'] ."</td>";
                                            echo "<td>" . $row['time'] ."</td>";
                                            echo '</tr>';
                                            }
                                            break;
                                case "return": if($row['type']=="return")
                                            {
                                              echo '<tr>';
                                            echo "<td>" . $row['roll_no'] ."</td>";
                                            echo "<td>" . $row['name'] ."</td>";
                                            echo "<td>" . $row['ph_no'] ."</td>";
                                            echo "<td>" . $row['event_name'] ."</td>";
                                            echo "<td>" . $row['item'] ."</td>";
                                            echo "<td>" . $row['quantity'] ."</td>";
                                            echo "<td>" . $row['time'] ."</td>";
                                            echo '</tr>';
                                            }
                                            break;
                                }
                              }
                            echo '</table>';
                            echo '</div>';
                          }
                          else
                            echo '<h2><center>Select valid search criteria</center></h2>';
                          ?>
                            
              
             
                  
            </div>
        </div>
    </body>
    </html>