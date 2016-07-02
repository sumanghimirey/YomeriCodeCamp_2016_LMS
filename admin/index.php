<?php
@session_start();
include 'includes/index.php';
include "../configure/index.php";
include "../functions/index.php";
$adminObj = new admin();
$ado = new ado();
if ($adminObj->isLogin()) {
    $registry->router = new router($registry);
    $registry->router->setPath('controller');
    $registry->template = new template($registry);
    $registry->router->loader();
} else {
    include("login.php");
}
deleteMessage();
?>