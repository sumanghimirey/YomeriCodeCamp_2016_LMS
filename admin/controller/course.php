<?php

class courseController extends baseController {

    function index() {
        $ado = new ado();
        if (isset($_GET['todo']) && $_GET['todo'] == "delete") {
            $id = $_GET['id'];
            $ado->exec("delete from tbl_coursemenu where id = '$id'");
            $msg = "Data deleted.";
            setMessage($msg);
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->registry->template->show('course', 'index');
    }
    
    function add_course() {
        $ado = new ado();
        if (isset($_POST['title']) && !empty($_POST['title'])) {
            $ado->table_name = " tbl_coursemenu";
            $ado->val = array("`title`" => $_POST['title'],
                                "`status`" => $_POST['status'],
                                );
            $ado->insert();
            $msg = "Data Added.";
            setMessage($msg);
            redirect("./?rt=course");
        }
        $this->registry->template->show('course', 'add_course');
    }


//edit menu

    function edit_course() {
        $ado = new ado();
        if (isset($_POST['title']) && !empty($_POST['title'])) {
            $id = $_GET['id'];
            $ado->table_name = " tbl_coursemenu";
            $ado->val = array("`title`" => $_POST['title'],
                                "`status`" => $_POST['status'],
                                );
            $ado->cond = array("id" => $id);
            $ado->update();
            $msg = "Data Updated.";
            setMessage($msg);
            redirect("./?rt=course");
            }
        $this->registry->template->show('course', 'add_course');
    }   
}

?>