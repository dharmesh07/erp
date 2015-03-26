<?php

session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {

header ("Location: login.php");

}

?><html>
  <link rel="icon" href="favi.png" type="image/png" sizes="16x16">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bootstrap/css/signin.css" rel="stylesheet">
    <head>
        <title>
            K!14 | Add Item
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
            document.getElementById("id").innerHTML = ajaxRequest.responseText;
          }
          }
        var str=document.getElementById('old_new').value;
        ajaxRequest.open("GET", "ajax/old_new.php?str="+str, true);
       ajaxRequest.send(null);
       
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
                  <form name="add_item" class="form-signin" action="item_process.php" method="post" role="form">
                    <select class="form-control" name="old_new" id="old_new" onchange="select()">
                      <option value="">Select New or Old</option>
                      <option value="old">Old</option>
                      <option value="new">New</option>
                    </select>
                    <div id="id">
                    </div>
                    
                    <input type="number" class="form-control" name="quantity" placeholder="Quantity" required/>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" value="Login" name="Submit">Entry</button>
                </form>
            </div>
        </div>
    </body>
    </html>