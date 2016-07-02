<?php
include 'includes/index.php';
include "configure/index.php";
include "functions/index.php";
$ado = new ado();
    $registry->router = new router($registry);
    $registry->router->setPath('controller');
    $registry->template = new template($registry);
    $registry->router->loader();

deleteMessage();
?>