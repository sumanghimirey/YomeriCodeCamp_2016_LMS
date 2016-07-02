<?php 
if (isset($_GET['rt']) && !empty($_GET['rt'])) {
    $menu_path = explode(".", $_GET['rt']);
    $rt = $menu_path[0];
    $subpath = (count($menu_path) > 1) ? $menu_path[1] : "";
} else {
    $rt = "";
    $subpath = "";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Dashboard</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="ionicons/css/ionic.min.css">
<link rel="stylesheet" href="dist/css/main.css">
<link rel="stylesheet" href="dist/css/error.css">
<link rel="stylesheet" href="dist/css/skins/all-skins.min.css">
<!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->
</head>
