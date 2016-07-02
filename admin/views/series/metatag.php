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
	    $seoObj = new seo();
        $ras = $seoObj->getMetatagDetail();
        ?>
        <div class="box-header with-border">
          <h3 class="box-title">MetaTags</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body  table-responsive">
          <form role="form" action="" method="post" enctype="multipart/form-data" name="form" id="form">
           <div class="form-group">
              <label>Content language:</label>
              <input type="text" name="language" class="form-control" value="<?php echo clean($ras['language']);?>"  />
              (eg: en, en-gb, en-au) </div>
            <div class="form-group">
              <label>Robots:</label>
              <input type="text" name="robots" class="form-control" value="<?php echo clean($ras['robots']);?>"  />
              (eg: all, index, follow) </div>
            <div class="form-group">
              <label>Copyright:</label>
              <input type="text" name="copyright" class="form-control" value="<?php echo clean($ras['copyright']);?>"  />
            </div>
            <div class="form-group">
              <label>Revisit After:</label>
              <input type="text" name="revisit" class="form-control" value="<?php echo clean($ras['revisit']);?>" />
            </div>
            <div class="form-group">
              <label>Page Topic:</label>
              <input type="text" name="topic" class="form-control" value="<?php echo clean($ras['topic']);?>" />
            </div>
            <div class="form-group">
              <label>Audience:</label>
              <input type="text" name="audience" class="form-control" value="<?php echo clean($ras['audience']);?>" />
            </div>
            <div class="form-group">
              <label>Expires:</label>
              <input type="text" name="expires" class="form-control" value="<?php echo clean($ras['expires']);?>" />
            </div>
            <div class="form-group">
              <label>Geo Placename:</label>
              <input type="text" name="placename" class="form-control" value="<?php echo clean($ras['placename']);?>" />
              (eg: Sydney, New South Wales) </div>
            <div class="form-group">
              <label>Geo Region:</label>
              <input type="text" name="region" class="form-control" value="<?php echo clean($ras['region']);?>" />
              (eg: AU-NSW) </div>
            <div class="form-group">
              <label>Geo position:</label>
              <input type="text" name="position" class="form-control" value="<?php echo clean($ras['position']);?>" />
              (eg: 37.7750, -122.4183) </div>
            <div class="form-group">
              <label>Google Analytics:</label>
              <textarea name="google_analytics" class="form-control"><?php echo clean($ras['google_analytics']);?></textarea>
            </div>
            <div class="form-group">
              <label>Google site verification:</label>
              <input type="text" name="google_site_verification" class="form-control" value="<?php echo clean($ras['google_site_verification']);?>" />
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