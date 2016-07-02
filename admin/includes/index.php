<?php
include 'application/' . 'controller_base.class.php';
include 'application/' . 'registry.class.php';
include 'application/' . 'router.class.php';
include 'application/' . 'template.class.php';
function __autoload($class_name) {
    $filename = $class_name . '.php';
    $file = '../classes/' . $filename;
    if (file_exists($file) == false) {
        return false;
    }
    include ($file);
}
$registry = new registry();
?>