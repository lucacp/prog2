<?php 
  session_start();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap Login Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
    <script type="text/javascript">
      $(document).ready(function(){
          $('.close').click(function(){

            $('body').load('t3.php');
          });
      });
    </script>
  </head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Entrar</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="post" action="t3.php?envio=1">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Usuario" name="login" required />
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Senha" name="pass" required />
            </div>
            <div class="form-group">
              <input class="btn btn-primary btn-lg btn-block" id="logi" value="Sign In" type="submit" />
              <span class="pull-right"><a href="t3/signup.php">Register</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="close" data-dismiss="modal" aria-hidden="true">Cancel</button>
		      </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>