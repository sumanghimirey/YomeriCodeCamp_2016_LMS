<?php
unset($_SESSION["admin_session_id"]);
unset($_SESSION["admin_session_password"]);
unset($_SESSION["login_site"]);
session_destroy();
redirect("./");
?>