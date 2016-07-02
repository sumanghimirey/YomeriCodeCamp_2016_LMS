<?php
@session_start();
include 'includes/index.php';
include "../configure/index.php";
include "../functions/index.php";
$adminObj = new admin();
$ado = new ado();
if (isset($_POST['email']) && !empty($_POST['email'])) {
	$ras = $adminObj->getDetail("email", $_POST['email']);
	if($ras) {
		$mail = new phpmailer();
		$sub = "Password recovery from ". ucwords($_SERVER['HTTP_HOST']). ".";
		$message = "Hello ".clean($ras['name']).",<br />
		Please find your password below:<br />
		Username : " . clean($ras['username']) . "<br />
		Password : " . clean($ras['show_password']) . "</br />";
		$name = $_SERVER['HTTP_HOST']." Support";
		$emailAddr = "no-replay@".$_SERVER['HTTP_HOST'];
		$mail->setFrom($emailAddr, $name);
		$mail->addReplyTo($emailAddr, $name);
		$mail->addAddress($_POST['email'],  $ras['name']);
		$mail->Subject = "Forgot Password";
		$mail->msgHTML($message);
		if ($mail->send()) {
			$msg = "Check the e-mail inbox / spam / junk mail folder, please find the password.";
			setMessage($msg);
		} else {
			$msg = "Mailer Error: " . $mail->ErrorInfo;
			setMessage($msg, '-1');
			redirect($_SERVER['HTTP_REFERER']);
		}
	} else {
		$msg = "Sorry, e-mail that you provide is not found.";
		setMessage($msg, '-1');
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>
<?php include ("includes/header.php");?>
<body class="login-page">
<div class="login-box">
  <div class="login-box-body">
    <?php showMessage();?>
    <form class="login"  method="post" name="frm_login" id="frm_login" action="">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span> </div>
      <div class="row">
        <div class="col-xs-8"> <a href="./">Login</a> </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-warning btn-block btn-flat">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="js/jquery.validate.js"></script> 
<script src="bootstrap/js/bootstrap.min.js"></script> 
<script>
$(document).ready(function() {
	$("#frm_login").validate();
});
</script>
<?php deleteMessage();?>
</body>
</html>