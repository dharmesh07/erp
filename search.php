<?php
include('db_conn.php');
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
            K!14 | Search
        </title>
        <script>
    function submitForm(action)
    {
        document.getElementById('form1').action = action;
        document.getElementById('form1').submit();
    }
</script>          
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
              { alert("function");
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
                  ajaxRequest.open("GET", "ajax/events_name.php?event_type="+type, true);
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
              <form name="search" action="search_process.php" id="form1" method="post" class="form-signin" role="form" >
              <input type="text" class="form-control" name="roll_no" placeholder="Enter Roll No" value="" onchange="roll_no_change()"/>
              <select name='item' class='form-control' onchange="itemchange()" autofocus>
                      <option value="">Select item</option>
                        <?php
                            $sql = "SELECT item_name FROM items";
                            $result = mysql_query($sql);
                            
                            while ($row = mysql_fetch_array($result)) {
                            echo "<option value='" . $row['item_name'] ."'>" . $row['item_name'] ."</option>";
                            }
                          ?>
                   </select>
              <select class="form-control" name="event_type" onchange="select()" id="event_type">
                          <option value="" selected="selected">Select event type</option>
                          <option value="workshop" >Workshops</option>
                          <option value="event ">Events</option>
                          <option value="others">Others</option>
                    </select>
                    <div id="events_name">
                     <? $sql = "SELECT name FROM event";
                            $result = mysql_query($sql);
                            echo '<select id="event_name" name="event_name" class="form-control" >';
                          echo '<option value="">select event</option>';
                            while ($row = mysql_fetch_array($result)) {
                            echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>";
                            echo "</select>";
                          }
                     ?>
                    </div>
                    <br>
              <div class="col-md-6">
              <button class="btn btn-lg btn-primary btn-block" onclick="submitForm('search_process.php')" type="submit" value="Login" name="Submit">Search</button>
            </div>
            <div class="col-md-6">
              <button class="btn btn-lg btn-primary btn-block" onclick="submitForm('search_process1.php')" type="submit" value="Login" name="Submit">History</button>
            </div>
            </form>
            </center> 

                
            </div>
        </div>
    </body>
    </html>