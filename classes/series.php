<?php
class series extends ado {

    function getDetail($field_name, $id) {
        $sql = "SELECT id, `course_id`, youtube,episode from `tbl_series` where $field_name = '$id' LIMIT 1";
        $res = $this->exec($sql);
        if ($this->count($res) > 0) {
            return ($this->fetch($res));
        }
        else
            return false;
    }
	
	 function getSeries() {
        $sql = "SELECT id, `course_id`, youtube, episode from `tbl_series`  		
				LIMIT 1";
        $res = $this->exec($sql);
        if ($this->count($res) > 0) {
            return ($this->fetch($res));
        }
        else
            return false;
    }
}

?>