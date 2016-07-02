<?php

class ado {

    function exec($sql) {
        $result = mysql_query($sql);
        if ($result) {
            return $result;
        } else {
            echo "<br>Error in Query!!!<br>" . mysql_error();
            //exit();
        }
    }

    function fetch($result) {
        return mysql_fetch_array($result);
    }

    function free($result) {
        return mysql_free_result($result);
    }

    function count($result) {
        return mysql_num_rows($result);
    }

    function insert() {
        $sql = "insert into $this->table_name set ";
        foreach ($this->val as $key => $value) {
            $val_arr[] = "$key='" . addslashes(htmlentities(trim($value))) . "'";
        }
        $sql .= implode(", ", $val_arr);
        //echo $sql."<br>";
        //exit;
        $this->exec($sql);
        return $this->id();
    }

    function update() {
        $sql = "update $this->table_name set ";
        foreach ($this->val as $key => $value) {
            $val_arr[] = "$key='" . addslashes(htmlentities(trim($value))) . "'";
        }
        $sql .= implode(", ", $val_arr);

        foreach ($this->cond as $key => $value) {
            $cond_arr[] = "$key='" . addslashes($value) . "'";
        }
        $sql .= " where " . implode(" and ", $cond_arr);
        //echo $sql."<br>";
        //exit;
        $this->exec($sql);
    }

    function id() {
        return mysql_insert_id();
    }

}

?>