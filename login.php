<html>
    <link rel="icon" href="favi.png" type="image/png" sizes="16x16">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bootstrap/css/signin.css" rel="stylesheet">
    <head>
        <title>
            K!14 | LOGIN
        </title>
        <script type="text/javascript">
        function safety()
    	{
      
   		if(document.erpadmin.username.value == "" )
   		{
     		alert( "Provide your username!" );
     		document.erpadmin.username.focus() ;
     		return false;
   		}
   		if(document.erpadmin.password.value == "" )
   		{
     		alert( "Provide your Password!" );
     		document.erpadmin.password.focus() ;
     		return false;
   		}
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
   </style>
    </head>
    <body>
        <div class="container header-color">
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
            <div class="row-fluid">
                <center>
    				<form name="erpadmin" class="form-signin" action="check.php" method="post" onsubmit="return(safety());" role="form">
                        <br>
                        <br>
                        <br>
                        <input type="text" class="form-control" name="username" placeholder="username"/ autofocus><br>
                        <input type="password" class="form-control" name="password" placeholder="Password"/>
                           
                        <br>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" value="Login" name="login">Sign in</button>
                     </form>
                </center>
    		</div>	
        </div>
    </body>
</head>
</html>