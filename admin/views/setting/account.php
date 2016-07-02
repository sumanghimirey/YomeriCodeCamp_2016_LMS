<?php include ("includes/header.php");?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include ("includes/top.php");?>
<?php include ("includes/nav.php");?>
<div class="content-wrapper">
    <section class="content-header">
      <div class="row">
        <div class="col-md-12">
          <?php include ("link.php");?>
        </div>
      </div>
    </section>
  <section class="content">
  <?php showMessage();?>
  <div class="box">
  <?php
        $adminObj = new admin();
        $ras = $adminObj->getDetail("id", $_SESSION["admin_session_id"]);
        ?>
    <div class="box-header with-border">
      <h3 class="box-title">Account Setting</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-lg-6">
          <form role="form" action="" method="post" enctype="multipart/form-data" name="form" id="form">
            <input type="hidden" name="todo" value="account">
           <div class="form-group">
                  <label><strong>Full Name </strong></label>
                  <input name="name" type="text" class="form-control required"  value="<?php echo clean($ras['name']); ?>" title="Please enter name" />
                </div>
                <div class="form-group">
                  <label><strong>Email</strong></label>
                  <input name="email" type="text" class="form-control email"  value="<?php echo clean($ras['email']); ?>" title="Please enter email" />
                </div>
                <div class="form-group" style="display:none;">
                  <label><strong>Phone</strong></label>
                  <input name="phone" type="text" class="form-control"  value="<?php echo clean($ras['phone']); ?>" title="Please enter phone" />
                </div>
            <div class="form-group">
              <label><strong>Image:</strong></label>
              <input name="img_name" type="file" />
              <input name="delete_image" type="hidden" value="<?php echo clean($ras['img_name']);?>" />
              <?php if ($ras['img_name'] != "") { ?>
              <div style="margin:5px 0 0 0;"><img src="../uploads/admin/<?php echo $ras['img_name'];?>" width="150" /></div>
              <div style="margin:5px 0 0 0;"><a href="./?rt=setting.account&todo=delete&id=<?php echo $ras['id'];?>&image=<?php echo $ras['img_name'];?>" onClick="return confirm('Do you want to delete this image?')">Delete Image</a></div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label>&nbsp;</label>
              <button type="submit" class="btn btn-md btn-success">Save</button>
            </div>
          </form>
        </div>
        <div class="col-lg-6">
          <form role="form" action="" method="post" enctype="multipart/form-data" name="frm_password" id="frm_password">
            <input type="hidden" name="todo" value="password">
            <div class="form-group">
              <label><strong>Old Password.</strong></label>
              <input type="password" name="oldpass" id="oldpass" class="form-control required" title="Please enter old password." />
            </div>
            <div class="form-group">
              <label><strong>New Password.</strong></label>
              <input type="password" name="newpass" id="newpass" class="form-control required" title="Please enter new password." />
            </div>
            <div class="form-group">
              <label><strong>Confirm Password.</strong></label>
              <input type="password" name="conpass" id="conpass" class="form-control" equalTo="#newpass" title="Please enter confirm password." />
            </div>
            <div class="form-group">
              <label>&nbsp;</label>
              <button type="submit" class="btn btn-md btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </section>
  </div>
  <?php include ("includes/footer.php");?>
</div>
<?php include ("includes/scripts.php");?>
<script type="text/javascript">
$().ready(function() {
	$("#form").validate();
	$("#frm_password").validate();
});
</script>
</body>
</html>