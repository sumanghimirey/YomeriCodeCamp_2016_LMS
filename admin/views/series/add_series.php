
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
	    $seriesObj = new series();
      $courseObj = new course();

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $title = "Edit";
        } else {
            $id = "";
            $title = "Add";
        }
        $ras = $seriesObj->getDetail("id", $id);
        ?>
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $title;?> Page</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body  table-responsive">
          <form role="form" action="" method="post" enctype="multipart/form-data" name="form" id="form">
           

            <div class="form-group">
              <label><strong>Category:</strong></label>
               <select class="form-control" name="course_id" id="id">
                <?php  $course = $courseObj->getCourses();
                foreach ($course as $key) {
                ?>
              <option value="<?php echo $key['id']?>"  <?php if ($ras['course_id'] == $key) echo "selected" ?> ><?php echo clean($key['title']);?></option>
              <?php } ?>
             </select>
            </div>
            
                <div class="form-group">
                  <label><strong>Youtube:</label>
                <?php $youtube = ($ras['youtube']) ? "http://youtu.be/".$ras['youtube'] : "";?>
                  <input name="youtube" type="text" class="form-control required"  value="<?php echo $youtube; ?>" title="Please enter Link" />
                </div>
                <div class="form-group">
                  <label><strong>Episode:</label>
                  <input name="episode" type="text" class="form-control required number"  value="<?php echo clean($ras['episode']); ?>" title="Please enter Episode Number" />
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