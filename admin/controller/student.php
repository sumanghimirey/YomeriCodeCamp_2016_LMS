<?php
class studentController extends baseController {

    function index() {
        $ado = new ado();
		if (isset($_GET['todo']) && $_GET['todo'] == "delete") {
			$id = $_GET['id'];
			$uploadPath = "../uploads/student/";
			@unlink($uploadPath . $_GET['image']);
			$ado->exec("delete from tbl_student where id = '$id'");
			$msg = "Data deleted.";
            setMessage($msg);
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->registry->template->show('student', 'index');
    }

    function edit_student() {
        $ado = new ado();
		$imgObj = new imager();
        if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
            $id = $_GET['id'];
            $ado->table_name = "tbl_student";
            $ado->val = array("`firstname`" => $_POST['firstname'],
                                "`username`" => $_POST['username'],
                                "`password`" => $_POST['password'],
                                "`status`" => $_POST['status'],
                                "`description`" => $_POST['description']
                                );

            $ado->cond = array("id" => $id);
            $ado->update();
			
			$ext = "";
			$filename = $_FILES['img_name']['name'];
            $ext = $imgObj->getExt($filename);
            if ($ext == "png" || $ext == "gif" || $ext == "jpeg" || $ext == "jpg") {
                $uploadPath = "../uploads/student/";
                @unlink($uploadPath . $_POST['delete_image']);
                $temp_name = $_FILES['img_name']['tmp_name'];
                $img_name = makeNiceName($_POST['firstname']) . "-" . $id . "." . $ext;
                $imgObj->UploadImage($temp_name, $ext, $img_name, $uploadPath);
                $ado->table_name = "tbl_student";
                $ado->val = array("img_name" => $img_name);
                $ado->cond = array("id" => $id);
                $ado->update();
            }
            $msg = "Data Updated.";
            setMessage($msg);
            redirect("./?rt=student");
        }
		else if (isset($_GET['todo']) && $_GET['todo']=='delete') {
			$ado->table_name = "tbl_student";
			$id = $_GET['id'];
			$ado->val = array("`img_name`" => '');
			$ado->cond = array("id" => $id);
			$ado->update();
			$uploadPath = "../uploads/student/";
			@unlink($uploadPath . $_GET['image']);
			
			$msg = "Image Deleted.";
			setMessage($msg);
			redirect($_SERVER['HTTP_REFERER']);
		}
        $this->registry->template->show('student', 'add_student');
    }
}

?>