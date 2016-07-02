<?php

class settingController extends baseController {
	
	function index() {
		if (isset($_POST) && !empty($_POST)) {
			$ado =  new ado();
			$ado->exec("truncate table `tbl_general`");
			$ado->table_name = "tbl_general";
			$ado->val = array("email" => $_POST['email'],
								"facebook" => $_POST['facebook'],
								"twitter" => $_POST['twitter'],
								"linkedin" => $_POST['linkedin'],
								"youtube" => $_POST['youtube'],
								"google" => $_POST['google']);			
			$ado->insert();
			$msg = "Data Updated.";
			setMessage($msg);
			redirect($_SERVER['HTTP_REFERER']);
		}
		$this->registry->template->show('setting', 'index');
    }
	
	function account() {
		$ado = new ado();
		$imgObj = new imager();
		$adminObj = new admin();
		if (isset($_POST['todo']) && $_POST['todo']=='account') {
			$id = $_SESSION["admin_session_id"];
			$ado->table_name = "tbl_admin";
			$ado->val = array("`name`" => $_POST['name'],
								"`phone`" => $_POST['phone'],
								"`email`" => $_POST['email']);
			$ado->cond = array("id" => $id);
			$ado->update();
			$filename = $_FILES['img_name']['name'];
			$ext = $imgObj->getExt($filename);
			if ($ext == "png" || $ext == "gif" || $ext == "jpeg" || $ext == "jpg") {
				$uploadPath = "../uploads/admin/";
                @unlink($uploadPath . $_POST['delete_image']);
				$temp_name = $_FILES['img_name']['tmp_name'];
				$img_name = makeNiceName($_POST['name']) . "-" . $id . "." . $ext;
				$imgObj->UploadImage($temp_name, $ext, $img_name, $uploadPath);
				$ado->table_name = "tbl_admin";
				$ado->val = array("img_name" => $img_name);
				$ado->cond = array("id" => $id);
				$ado->update();
			}
			$_SESSION["admin_session_name"] = $_POST['name'];
			$msg = "Data Updated.";
			setMessage($msg);
			redirect($_SERVER['HTTP_REFERER']);
		} else if (isset($_POST['todo']) && $_POST['todo']=='password') {
            $LOGIN_TABLE_NAME = "tbl_admin";    //set tablename
            $DB_PASSWORD = "password";         //set password
            $DB_PRIMARYID = "id";             //set primary id
            $adminObj->table_name = $LOGIN_TABLE_NAME;
            $adminObj->table_password = $DB_PASSWORD;
            $adminObj->table_primaryId = $DB_PRIMARYID;
            $adminObj->oldpassword = $_POST['oldpass'];
            $adminObj->newpassword = $_POST['newpass'];
            if ($adminObj->changePassword()) {
                $msg = "Password is changed successfully.";
                $_SESSION["admin_session_password"]=MD5($_POST['newpass']);
                setMessage($msg);
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                $msg = "Old password does not match.";
                setMessage($msg, "-1");
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else if (isset($_GET['todo']) && ($_GET['todo']=='delete')) {
			$ado->table_name = "tbl_admin";
			$id = $_GET['id'];
			$ado->val = array("`img_name`" => '');
			$ado->cond = array("id" => $id);
			$ado->update();
			$uploadPath = "../uploads/admin/";
			@unlink($uploadPath . $_GET['image']);
			$msg = "Image Deleted.";
			setMessage($msg);
			redirect($_SERVER['HTTP_REFERER']);
		}
		$this->registry->template->show('setting', 'account');
    }
	
    function logout() {
        $this->registry->template->show('setting', 'logout');
    }

}

?>