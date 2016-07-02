<?php include ("includes/header.php");?>
<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
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
        $courseObj = new course();

        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $title = "Edit";
        } else {
            $id = "";
            $title = "Add";
        }
        $ras = $courseObj->getDetail("id", $id);?>
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $title;?> Course</h3>
         
        </div>
        <div class="box-body  table-responsive">
          <form role="form" action="" method="post" enctype="multipart/form-data" name="form" id="form">
            <div class="form-group">
              <label><strong>Title:</strong></label>
              <input name="title" type="text" class="form-control required"  value="<?php echo clean($ras['title']);?>" title="Please enter title" />
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
              <button type="submit" name="submit" class="btn btn-md btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <?php include ("includes/footer.php");?>
</div>
<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<?php include ("includes/scripts.php");?>
<script src="js/jquery.chained.js"></script> 
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> 
<script type="text/javascript">
$().ready(function() {
	$("#form").validate();
	 $("#subcategory_id").chained("#category_id");
	$(".textarea").wysihtml5();
});
</script>
<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<script>
var timepicker = new TimePicker('time', {
  lang: 'en',
  theme: 'dark'
});

var input = document.getElementById('time');

timepicker.on('change', function(evt) {
  
  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});
</script>
</body>
</html>