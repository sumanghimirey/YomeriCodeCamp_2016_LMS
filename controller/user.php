<?php
class userController extends baseController {

    function index(){

    }


    function register() {
        $ado = new ado();
		$imgObj = new imager();
        if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
      
          $ado->table_name = "tbl_student";
            $ado->val = array("`firstname`" => $_POST['firstname'],
								"`phone`" => $_POST['phone'],
                                "`username`" => $_POST['username'],
                                "`password`" => $_POST['password'],
                                "`address`" => $_POST['address'],
                                "`dateofbirth`" => $_POST['dateofbirth'],
                                "`occupation`" => $_POST['occupation'],
                                "`status`" => '0',
                                "`description`" => $_POST['description']
                                );
            $id = $ado->insert();
			$filename = $_FILES['img_name']['name'];

            $ext = $imgObj->getExt($filename);
            if ($ext == "png" ||$ext == "bmp" || $ext == "gif" || $ext == "jpeg" || $ext == "jpg") {
                $uploadPath = "C:/xampp/htdocs/16/video/uploads/student/";
                $temp_name = $_FILES['img_name']['tmp_name'];
                $img_name = makeNiceName($_POST['firstname']) . "-" . $id . "." . $ext;
                $imgObj->UploadImage($temp_name, $ext, $img_name, $uploadPath);
                $ado->table_name = "tbl_student";
                $ado->val = array("img_name" => $img_name);
                $ado->cond = array("id" => $id);
                $ado->update();
            }
            $msg = "Data Added.";
            setMessage($msg);
            redirect("./?rt=student");
        }
        $this->registry->template->show('register', 'index');
    }

   
}

?>