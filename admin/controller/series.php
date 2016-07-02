<?php

class seriesController extends baseController {

    function index() {
		$ado = new ado();
		if (isset($_GET['todo']) && $_GET['todo'] == "delete") {
			$id = $_GET['id'];
			$ado->exec("delete from tbl_series where id = '$id'");
			$msg = "Data deleted.";
            setMessage($msg);
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->registry->template->show('series', 'index');
    }
	
	function add_series() {
        $ado = new ado();
        if(isset($_POST['youtube']) && !empty($_POST['youtube'])) {
            $ado->table_name = "tbl_series";
			$youtube = youtube($_POST['youtube']);
		    $ado->val = array(
								"`youtube`" => $youtube,
								"`course_id`" => $_POST['course_id'],
								"`episode`" => $_POST['episode']
								);
			$id = $ado->insert();
            $msg = "Data Added.";
            setMessage($msg);
            redirect("./?rt=series");
        }
        $this->registry->template->show('series', 'add_series');
    }

	
	function edit_series() {
        $ado = new ado();
        if (isset($_POST['youtube']) && !empty($_POST['youtube'])) {
            $ado->table_name = "tbl_series";
			$youtube = youtube($_POST['youtube']);
            $id = $_GET['id'];
            $ado->val = array(
            					"`youtube`" => $youtube,
								"`course_id`" => $_POST['course_id'],
								"`episode`" => $_POST['episode']
								);
            $ado->cond = array("id" => $id);
            $ado->update();
            $msg = "data updated.";
            setMessage($msg);
            redirect("./?rt=series");
        }
        $this->registry->template->show('series', 'add_series');
    }
}

?>