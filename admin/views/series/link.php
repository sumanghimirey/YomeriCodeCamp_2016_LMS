<ol class="breadcrumb">
  <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
  <?php
  if($rt == "series" && $subpath == "") {
  ?>
  <li class="active">Series</li>
  <?php } else { ?>
  <li><a href="./?rt=series">Series</a></li>
  <?php } ?>
  <?php
  if($rt == "series" && $subpath == "add_serie") {
  ?>
  <li class="active">Add Series</li>
  <?php } else { ?>
  <li><a href="./?rt=series.add_series">Add Series</a></li>
  <?php } ?>
  

</ol>
