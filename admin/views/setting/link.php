<ol class="breadcrumb">
  <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
  <?php
  if($rt == "setting" && $subpath == "") {
  ?>
  <li class="active">General Setting</li>
  <?php } else { ?>
  <li><a href="./?rt=setting">General Setting</a></li>
  <?php } ?>
  <?php
  if($rt == "setting" && $subpath == "account") {
  ?>
  <li class="active">Account Setting</li>
  <?php } else { ?>
  <li><a href="./?rt=setting.account">Account Setting</a></li>
  <?php } ?>
</ol>
