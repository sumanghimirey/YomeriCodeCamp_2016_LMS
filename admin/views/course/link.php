<ol class="breadcrumb">
  <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
   <?php
  if($rt == "course" && $subpath == "") {
  ?>
  <li class="active">Courses</li>
  <?php } else { ?>
  <li><a href="./?rt=course">Courses</a></li>
  <?php } ?>
  <?php
  if($rt == "course" && $subpath == "add_course") {
  ?>
  <li class="active">Add Course</li>
  <?php } else { ?>
  <li><a href="./?rt=course.add_course">Add Course</a></li>
  <?php } ?>


