<?php
session_start();
define("css", $repRoot . "/Views/Assets/css/");
define("js", $repRoot . "/Views/Assets/js/");
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo css ?>template.css">
    <script src="<?php echo js?>template.js"></script>
    <title><?php echo $title?></title>


