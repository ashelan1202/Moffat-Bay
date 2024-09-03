<?php
const links = "../Assets/links/";
const images = "/Moffat-Bay/Views/Assets/images/";
const views = "/Moffat-Bay/Views/";
const models = "/Moffat-Bay/models/";

if(isset($_SESSION["test"]) and $_SESSION["test"]) {
    require links."TestPageLinks.php";
} else{
    require links."links.php";
}
?>
</head>
<body>
<div id="topnav">
    <a id="home" href="<?php echo $home?>"><img src="<?php echo images?>home.png"></a>
    <a id="brand"><img src="<?php echo images?>icon.png"><h2>Moffat Bay Lodge</h2></a>
    <a id="sidebarButton"><img  src="<?php echo images?>hamburger.png" onclick="openNav()"></a>
</div>
<div id="sidebar">
    <div id="sidebarTop">
        <a class="hidden"></a>
        <a id="sidebarBrand"><img src="<?php echo images?>icon.png"><h4>Moffat Bay Lodge</h4></a>
        <a id="closeButton"><img src="<?php echo images?>close.png" onclick="closeNav()"> </a>
    </div>
    <div class="links">
        <?php
        foreach($pages as $key => $value){
            if($key != $title){
                echo "<a class=\"link\" href=\"".$value."\"><h2>".$key."</h2></a><br>";
            }
        }
        if(isset($_SESSION['customer'])){
            ?>
            <a class="link" href="<?php echo models?>logout.php"><h2>Logout</h2></a>
            <?php
        }
        ?>
    </div>
</div>
