<?php
//Delete when All Pages are fully implemented
$repRoot = "../../";
$title = "NotImplemented";
require_once "../templates/_header.php";
?>
<style>
    body{text-align: center}
</style>
<?php

require_once "../templates/_navbar.php";

?>

<h1>This Page has not been implemented</h1>
<h2>Links</h2>
<?php
    foreach($pages as $key => $value){
    if($key != $title){
    echo "<a href=\"".$value."\"><p>".$key."</p></a>";
    }
    }
?>
<?php
require_once "../templates/_footer.php";
