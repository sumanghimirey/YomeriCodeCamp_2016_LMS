<?php
include 'admin/application/' . 'controller_base.class.php';
include 'admin/application/' . 'registry.class.php';
include 'admin/application/' . 'router.class.php';
include 'admin/application/' . 'template.class.php';

function __autoload($class_name) {
    $filename = $class_name . '.php';
    $file = 'classes/' . $filename;
    if (file_exists($file) == false) {
        return false;
    }
    include ($file);
}
$registry = new registry();
?>