<?php

class general extends ado {

    function getDetail() {
        $sql = "select id, facebook, twitter, linkedin, youtube, google, email from tbl_general";
        $res = $this->exec($sql);
        if ($this->count($res) > 0) {
            return ($this->fetch($res));
        }
        else
            return false;
    }
}

?>