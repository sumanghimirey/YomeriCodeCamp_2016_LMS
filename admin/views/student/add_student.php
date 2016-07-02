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
        <?php $bannerObj = new student();
	if(isset($_GET['id']) && !empty($_GET['id'])) {
		$id = $_GET['id'];
		$title = "Edit";
	}
	else {
		$id = "";
		$title = "Add";
	}
	$ras = $bannerObj->getDetail("id",$id); 
	?>
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $title;?> Students</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body  table-responsive">
          <form role="form" action="" method="post" enctype="multipart/form-data" name="form" id="form">
            <div class="form-group">
         
              <label><strong>Fullname:</strong></label>
              <input name="firstname" type="text" class="form-control required"  value="<?php echo $ras['firstname']; ?>" title="h" />
            </div>
            <div class="form-group">
              <label><strong>Username:</strong></label>
              <input name="username" type="text" class="form-control required"  value="<?php echo clean($ras['username']);?>" title="Please enter title" />
            </div>

   <div class="form-group">
              <label><strong>Password:</strong></label>
              <input name="password" type="text" class="form-control required"  value="<?php echo clean($ras['password']);?>" title="Please enter title" />
            </div>
         
            <div class="form-group">
              <label><strong>Description:</strong></label>
              <textarea class="textarea form-control" name="description"  ><?php echo clean($ras['description']);?></textarea>
            </div>
           
           <div class="form-group">
              <label><strong>Image:</strong></label>
              <input name="delete_image" type="hidden" value="<?php echo clean($ras['img_name']);?>"  />
              <?php if ($ras['img_name'] != "") { ?>
              <div style="margin:5px 0 0 0;"><img src="../uploads/student/<?php echo $ras['img_name'];?>" width="150" /></div>
              <div style="margin:5px 0 0 0;"><a href="./?rt=student.edit_student&todo=delete&id=<?php echo $ras['id'];?>&image=<?php echo $ras['img_name'];?>" onClick="return confirm('Do you want to delete this image?')">Delete Image</a></div>
              <?php } ?>
            </div>

            <div class="form-group">
              <label><strong>Status:</strong></label>
              <br />
              <input type="radio" name="status" value="1"  <?php if($ras['status'] == "" || $ras['status'] == "1") echo "checked"?> />
              Show &nbsp;&nbsp;&nbsp;
              <input name="status" type="radio" value="0" <?php if($ras['status'] == "0") echo "checked"?> />
              Hide </div>
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