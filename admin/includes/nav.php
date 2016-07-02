  <aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php
			if($ras_admin['img_name']) {
			?>
        <img src="../uploads/admin/<?php echo clean($ras_admin['img_name']);?>" class="img-circle" alt="User Image">
        <?php } else { ?>
        <img src="images/no-photo-available-icon.jpg" class="img-circle" alt="User Image">
        <?php }?>
      </div>
      <div class="pull-left info">
        <p><?php echo clean($ras_admin['name']);?></p>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="<?php echo ($rt == "" || $rt == "setting") ? " active" : "";?>"><a href="./"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a> </li>
       <li class="treeview<?php echo ($rt == "setting") ? " active" : "";?>"> <a href="#"> <i class="fa fa-cog"></i> <span>Setting</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li class="<?php echo ($rt == "setting" && $subpath == "") ? " active" : "";?>"><a href="./?rt=setting"><i class="fa fa-circle-o"></i> General Setting</a></li>
          <li class="<?php echo ($rt == "setting" && $subpath == "account") ? " active" : "";?>"><a href="./?rt=setting.account"><i class="fa fa-circle-o"></i> Account Setting</a></li>
        </ul>
      </li>

      <li class="treeview<?php echo ($rt == "course") ? " active" : "";?>"> <a href="#"> <i class="fa fa-user"></i> <span>Course</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li class="<?php echo ($rt == "course" && $subpath == "") ? " active" : "";?>"><a href="./?rt=course"><i class="fa fa-circle-o"></i> List Course</a></li>
          <li class="<?php echo ($rt == "course" && $subpath == "add_course") ? " active" : "";?>"><a href="./?rt=course.add_course"><i class="fa fa-circle-o"></i> Add Course</a></li>
        </ul>
      </li>
       <li class="treeview<?php echo ($rt == "student") ? " active" : "";?>"> <a href="#"> <i class="fa fa-user"></i> <span>student</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li class="<?php echo ($rt == "student" && $subpath == "") ? " active" : "";?>"><a href="./?rt=student"><i class="fa fa-circle-o"></i> List Student</a></li>
        </ul>
      </li>





      <li class="treeview<?php echo ($rt == "series") ? " active" : "";?>"> <a href="#"> <i class="fa fa-user"></i> <span>Series</span> <i class="fa fa-angle-left pull-right"></i> </a>
        <ul class="treeview-menu">
          <li class="<?php echo ($rt == "series" && $subpath == "") ? " active" : "";?>"><a href="./?rt=series"><i class="fa fa-circle-o"></i> List Series</a></li>
          <li class="<?php echo ($rt == "series" && $subpath == "add_series") ? " active" : "";?>"><a href="./?rt=series.add_series"><i class="fa fa-circle-o"></i> Add Series</a></li>
        </ul>
      </li>



    </ul>
  </section>
</aside>
