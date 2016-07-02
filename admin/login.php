<?php
if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
	$adminObj->table_name = "tbl_admin";
	$adminObj->table_userName = "username";
	$adminObj->table_password = "password";  
	$adminObj->table_primaryId = "id";     
	$adminObj->username = $_POST['username'];
	$adminObj->password = $_POST['password'];
	if ($adminObj->checkLogin()) {
   $_SESSION["admin_session_password"] =MD5( $_POST['password']);
   
		redirect("./");
	} else {
		$msg = "Error: Invalid username and password.";
		setMessage($msg, '-1');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>
<?php include ("includes/header.php");?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <?php showMessage();?>
    <form class="login"  method="post" name="frm_login" id="frm_login"  ="">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control required" placeholder="User Name" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span> </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control required" placeholder="Password" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span> </div>
      <div class="row">
        <div class="col-xs-8"> <a href="password.php">Forgot Password ?</a> </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-warning btn-block btn-flat" id="login">login</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="bootstrap/js/bootstrap.min.js"></script> 
<script>
$(document).ready(function() {
	$("#frm_login").validate();
});
</script>
</body>
</html>