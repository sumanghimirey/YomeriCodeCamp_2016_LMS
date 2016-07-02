<?php include ("includes/header.php");?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include ("includes/top.php");?>
  <?php include ("includes/nav.php");?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="row">
        <div class="col-md-8">
          <?php include ("link.php");?>
        </div>
        <div class="col-md-4">
          <form action="" method="post" enctype="multipart/form-data" name="form" id="form">
            <div class="input-group">
              <input type="text" name="search_key" class="form-control input-md pull-right search_input" placeholder="Search" value="<?php echo @$_REQUEST['search_key'];?>">
              <div class="input-group-btn">
                <button class="btn btn-md btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <section class="content">
      <?php showMessage();?>
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">student</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body  table-responsive">
          <?php
            $ado = new ado();
            $paging = new paging();
            $perpage = !empty($_GET['per']) ? $_GET['per'] : 50;
            $p = !empty($_GET['p']) ? $_GET['p'] : 1;
			$sql = "SELECT  id, `firstname`, `img_name`,`username`,`address`,`phone`,`dateofbirth`,`occupation`,`description`,
					if(`status`='1', 'Show', 'Hide') as `status`
					FROM tbl_student where 1";
			$url = "./?rt=student";
            if (isset($_REQUEST['search_key']) && !empty($_REQUEST['search_key'])) {
				$search_key = addslashes(htmlentities(trim($_REQUEST['search_key'])));
				$sql .= " and (`firstname` like '%$search_key%')";
                $url .= "&search_key=" . $_REQUEST['search_key'];
            }
            $sql .= " order by id desc";
            $res = $paging->Page($url, $perpage, $sql, $p);
            if (isset($_GET['p']) && !empty($_GET['p']) && $_GET['p'] != 1) {
                $count = $_GET['per'] * $_GET['p'] - $_GET['per'] + 1;
            } else {
                $count = 1;
            }
            if (!empty($res)) {
                ?>
          <table width="100%" class="table table-striped table-advance table-hover table-bordered">
            <tbody>
              <tr>
                <th width="2%"><i class="fa fa-list-ol"></i></th>
                <th width="10%"><strong>Image</strong></th>
                 <th width="10%"><strong>Id</strong></th>
                <th width="20%"><strong>Full Name</strong></th>
                <th width="20%"><strong>Username</strong></th>
                <th width="20%"><strong>Address</strong></th>
                 <th width="20%"><strong>Phone Number</strong></th>
                 <th width="20%"><strong>Occupation</strong></th>
                <th width="20%"><strong>Description</strong></th>
                 <th width="10%"><strong>Status</strong></th>

                <th width="11%"><i class="fa fa-cogs"></i> Action</th>
              </tr>
              <?php
				while ($ras = $ado->fetch($res[0])) {
					?>
              <tr>
                <td><?php echo $count;?>.</td>
                <td><img src="../uploads/student/<?php echo clean($ras['img_name']);?>" width="50" height="50" /></td>
                <td><?php echo clean($ras['id']);?></td> 
                <td><?php echo clean($ras['firstname']);?></td>               
                <td><?php echo clean($ras['username']);?></td>
                <td><?php echo clean($ras['address']);?></td>
                 <td><?php echo clean($ras['phone']);?></td> 
                 <td><?php echo clean($ras['occupation']);?></td> 
                 <td><?php echo clean($ras['description']);?></td> 
                <td><?php echo clean($ras['status']);?></td>
                <td><a href="./?rt=student.edit_student&id=<?php echo clean($ras['id']);?>" class="btn btn-success"><i class="fa fa-pencil"></i></a> &nbsp;<a href="./?rt=student&todo=delete&id=<?php echo $ras['id'];?>&image=<?php echo $ras['img_name'];?>"  onClick="return confirm('Do you want to delete this?')" class="btn btn-danger btn-sm" title="Delete" data-toggle="tooltip"><i class="fa fa-trash-o fa-lg"></i></a></td>
              </tr>
              <?php $count++; } ?>
            </tbody>
          </table>
          <?php if(count($res[1])>1 ) { ?>
          <div class="clearfix"></div>
          <center>
            <ul class="pagination">
              <?php echo " " . implode(" ", $res[1]) . " ";?>
            </ul>
          </center>
          <?php } ?>
          <?php
			}
			else {
				echo "<div class='notification n-information'>No data to display.</div><div class='clearfix'></div>";
			}
			?>
        </div>
      </div>
    </section>
  </div>
  <?php include ("includes/footer.php");?>
</div>
<?php include ("includes/scripts.php");?>
</body>
</html>