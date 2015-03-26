<?php

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

header ("Location: login.php");

}

?><?
include('db_conn.php');?>
<html>
  <link rel="icon" href="favi.png" type="image/png" sizes="16x16">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bootstrap/css/signin.css" rel="stylesheet">
    <head>
        <title>
            K!14 | Issue
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
  <script type="text/javascript">
    
    function loadcontent()
    {
        var ajaxRequest;  
        try{
            ajaxRequest = new XMLHttpRequest();
          } catch (e){
                     try{
                         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                         } catch (e) {
                                     try{
                                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                                        } catch (e){
                                                    alert("Your browser broke!");
                                                   return false;
                                                    }
                                     }
                    }
  
        ajaxRequest.onreadystatechange = function(){
        if(ajaxRequest.readyState == 4){
            document.getElementById("user_details").innerHTML = ajaxRequest.responseText;
          }
          }
        var roll=document.getElementById('roll_no').value;
        document.getElementById('roll_no_hidden').value=roll;
        ajaxRequest.open("GET", "ajax/user_check.php?roll_no="+roll, true);
       ajaxRequest.send(null);
    }
    function select()
    {
        var ajaxRequest;  
        try{
            ajaxRequest = new XMLHttpRequest();
          } catch (e){
                     try{
                         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                         } catch (e) {
                                     try{
                                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                                        } catch (e){
                                                    alert("Your browser broke!");
                                                   return false;
                                                    }
                                     }
                    }
  
        ajaxRequest.onreadystatechange = function(){
        if(ajaxRequest.readyState == 4){
            document.getElementById("events_name").innerHTML = ajaxRequest.responseText;
          }
          }
        var type=document.getElementById('event_type').value;
        document.getElementById('event_type_hidden').value="1";
        ajaxRequest.open("GET", "ajax/events_name.php?event_type="+type, true);
       ajaxRequest.send(null);
    }
    function quantity_check()
    {
        var ajaxRequest;  
        try{
            ajaxRequest = new XMLHttpRequest();
          } catch (e){
                     try{
                         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                         } catch (e) {
                                     try{
                                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                                        } catch (e){
                                                    alert("Your browser broke!");
                                                   return false;
                                                    }
                                     }
                    }
  
        ajaxRequest.onreadystatechange = function(){
        if(ajaxRequest.readyState == 4){
            document.getElementById("quantity").innerHTML = ajaxRequest.responseText;
          }
          }
        var item=document.getElementById('items').value;
        ajaxRequest.open("GET", "ajax/check_quantity1.php?item="+item, true);
       ajaxRequest.send(null);
    }

    function check()
    {
      if(document.getElementById('event_type_hidden').value=="0")
      {
        alert("select event");
        return false;
      }
      if (document.getElementById('quantity_issuing').value<0)
      {

        alert("Invalid quantity selection");
        return false;
      }
      else if(document.getElementById('quantity_issuing').value>document.getElementById('prev_quantity').value)
        {alert("Requested Quantity Not available");
        return false;
      }

                
    }
  </script>
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
                 <form name="entry" class="form-signin" action="issue_process.php" onsubmit="return(check());" method="post" role="form">
                    <input type="text" class="form-control" onchange="loadcontent()" name="roll_no" id="roll_no"  placeholder="Roll No"/ autofocus required>
                    <input type="hidden" id="roll_no_hidden" name="roll_no_hidden" value="">
                    <div id="user_details">
                      <input type="text" class="form-control" name="name" placeholder="Name" / required>
                      <input type="text" class="form-control" name="ph_no"  placeholder="Phone Number"/ required>
                    
                    <select class="form-control" name="event_type" onchange="select()" id="event_type">
                          <option value="" selected="selected">Select event type</option>
                          <option value="workshop" >Workshops</option>
                          <option value="event ">Events</option>
                          <option value="others">Others</option>
                    </select>
                  </div>
                    <div id="events_name">
                    </div>
                        
                        
                    <select name='items' id='items' class='form-control' onchange="quantity_check()">
                      <option value="">Select item</option>
                        <?php
                            $sql = "SELECT item_name FROM items";
                            $result = mysql_query($sql);
                            
                            while ($row = mysql_fetch_array($result)) {
                            echo "<option value='" . $row['item_name'] ."'>" . $row['item_name'] ."</option>";
                            }
                          ?>
                   </select>
                   <br>
                   <div id="quantity">
                    <?echo '<div class="col-md-7">';
                              echo '<input type="number" class="span2 form-control"  min="1"  name="quantity_returned" id="quantity_issuing" placeholder="Quantity"/  required>';
                              echo '</div>';
                              echo '<div class="col-md-5">';
                              echo '<input type="number" id="prev_quantity" name="quantity" class="span3 form-control" value="" readonly/><br>';
                              echo '</div>';
                            ?>
                   </div>
                   
                        
                        <input type="hidden" id="event_type_hidden" value="0">
                        <br>
                        <button class="btn btn-lg btn-primary btn-block"  type="submit" value="Login" name="Submit">Entry</button>
                     </form>
                </center>
        </div>  
        </div>

      </center>
    <body>