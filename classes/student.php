<?php

class student extends ado {

    function getDetail($field_title, $id) {
        $sql = "select id, `firstname`, `username`, `password`, `img_name`,`phone`, `address`,`occupation`,`description`,`status` from tbl_student where $field_title = '$id'";
        $res = $this->exec($sql);
        $ras = $this->fetch($res);
        return $ras;
    }
	
	function getstudent() {
        $sql = "select id, `firstname`, img_name  from tbl_student where status='1'";
        $res = $this->exec($sql);
        $data = array();
        if ($this->count($res) > 0) {
            while ($row = $this->fetch($res)) {
                $data[$row['id']] = $row;
            }
            return $data;
        }
        else
            return array();
    }
	
}

?>