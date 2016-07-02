<?php
class course extends ado
    {
    function getDetail($field_name, $id) {
        $sql = "SELECT id, `title`, `status`
				FROM tbl_coursemenu where $field_name = '$id'";
        $res = $this->exec($sql);
        $ras = $this->fetch($res);
        return $ras;
    }
	
	
  

    function getCourses()
    {
        $sql = "SELECT `id`,title,status  FROM tbl_coursemenu  WHERE status='1'";
         $res = $this->exec($sql);
        if ($this->count($res) > 0) {
            while ($row = $this->fetch($res)){
                $data[$row['id']] = $row;
            }return $data;
        }else
            return array();
    }

}
?>