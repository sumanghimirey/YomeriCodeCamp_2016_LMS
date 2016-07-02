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
        $generalObj = new general(); 
		$ras = $generalObj->getDetail(); 
        ?>
        <div class="box-header with-border">
          <h3 class="box-title">General Setting</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body  table-responsive">
          <form role="form" action="" method="post" enctype="multipart/form-data" name="form" id="form">
          <div class="form-group">
                  <label><strong>Email</strong></label>
                  <input name="email" type="text" class="form-control email"  value="<?php echo clean($ras['email']); ?>" title="Please enter email" />
                </div>
                <div class="form-group">
                  <label><strong>FaceBook</strong></label>
                   <input type="text" name="facebook" id="facebook" class="form-control" value="<?php echo clean($ras['facebook']);?>" title="Please enter facebook link." />
                </div>
                <div class="form-group">
                  <label><strong>Twitter</strong></label>
                  <input type="text" name="twitter" id="twitter" class="form-control" value="<?php echo clean($ras['twitter']);?>" title="Please enter twitter link." />
                </div>
                <div class="form-group">
                  <label><strong>Google+</strong></label>
                  <input type="text" name="google" id="google" class="form-control" value="<?php echo clean($ras['google']);?>" title="Please enter google link." />
                </div>
                <div class="form-group" style="display:none;">
                  <label><strong>Linkedin</strong></label>
                    <input type="text" name="linkedin" id="linkedin" class="form-control" value="<?php echo clean($ras['linkedin']);?>" title="Please enter google link." />
                </div>
                <div class="form-group" style="display:none;">
                  <label><strong>You Tube</strong></label>
                   <input type="text" name="youtube" id="youtube" class="form-control" value="<?php echo clean($ras['youtube']);?>" title="Please enter youtube link." />
                </div>
            <div class="form-group">
              <label>&nbsp;</label>
              <button type="submit" class="btn btn-md btn-success">Save</button>
            </div>
          </form>
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
});
</script>
</body>
</html>