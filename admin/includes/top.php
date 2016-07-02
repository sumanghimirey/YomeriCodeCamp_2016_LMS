<header class="main-header"> <a href="./" class="logo"> <span class="logo-mini"><b>A</b> ST</span> <span class="logo-lg"><b>Admin</b></span> </a>
  <nav class="navbar navbar-static-top" role="navigation"> <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <?php
		$adminObj = new admin();
		$ras_admin =$adminObj->getDetail("id", $_SESSION["admin_session_id"]);
		?>
        <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <?php
			if($ras_admin['img_name']) {
			?>
             <img src="../uploads/admin/<?php echo clean($ras_admin['img_name']);?>" class="user-image" alt="User Image">
             <?php } else { ?>
             <img src="images/no-photo-available-icon.jpg" class="user-image img-responsive" alt="User Image">
             <?php }?> <span class="hidden-xs"><?php echo clean($ras_admin['name']);?></span> </a>
          <ul class="dropdown-menu">
            <li class="user-header">
            <?php
			if($ras_admin['img_name']) {
			?>
             <img src="../uploads/admin/<?php echo clean($ras_admin['img_name']);?>" class="img-circle" alt="User Image" >
             <?php } else { ?>
             <img src="images/no-photo-available-icon.jpg" class="img-circle" alt="User Image">
             <?php }?>
              <p> <?php echo clean($ras_admin['name']);?> -
                <?php
			  echo ($ras_admin['user_type'] == "A") ? "Super Admin" : "Admin";
			  ?>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left"> <a href=".?rt=setting.account" class="btn btn-default btn-flat">Profile</a> </div>
              <div class="pull-right"> <a href="./?rt=setting.logout" class="btn btn-default btn-flat">Sign out</a> </div>
            </li>
          </ul>
        </li>
        <li> &nbsp;</li>
      </ul>
    </div>
  </nav>
</header>
