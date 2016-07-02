<ol class="breadcrumb">
  <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
  <?php
  if($rt == "student" && $subpath == "") {
  ?>
  <li class="active">Student</li>
  <?php } else { ?>
  <li><a href="./?rt=student">Student</a></li>
  <?php } ?>

  
</ol>
