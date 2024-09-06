<?php
$title="Landing Page";
$repRoot="../../";
require_once "../templates/_header.php";
?>

    <link rel="stylesheet" type="text/css" href="<?php echo css ?>landing.css">

<?php
require_once "../templates/_navbar.php";
?>
    <div class="container1">
        <img src="<?= images ?>lodge2.avif" alt="Lodge Image" class="full-width-img">
    </div>

    <div class="container2">
        <h2>About Us</h2>
        <p> The Moffat Bay Lodge is the  best place to stay to embark on adventures your family is sure to remember. Our staff is always on stand-by to provide best in class hospitality and help ensure your stay is one for the books.</p>
        <a href="<?php echo $home?>" class="btn">Book Today</a>
    </div>

    <div class="container3">
        <h2>Attractions</h2>
        <div class="card-container">

            <div class="card">
                <a href="<?php echo $pages['Test Page']?>">
                <div class="image-crop">
                    <img src="<?= images ?>icon.png" alt="Hiking">
                </div>
                <p>Hiking</p>
                </a>
            </div>

            <div class="card">
                <a href="<?php echo $pages['Test Page']?>">
                <div class="image-crop">
                    <img src="<?= images ?>icon.png" alt="Whale Watching">
                </div>
                <p>Whale Watching</p>
                </a>
            </div>
            <div class="card">
                <a href="<?php echo $pages['Test Page']?>">
                <div class="image-crop">
                    <img src="<?= images ?>icon.png" alt="Scuba Diving">
                </div>
                <p>Scuba Diving</p>
                </a>
            </div>
            <div class="card">
                <a href="<?php echo $pages['Test Page']?>">
                <div class="image-crop">
                    <img src="<?= images ?>icon.png" alt="Kayaking">
                </div>
                <p>Kayaking</p>
                </a>

            </div>
        </div>
    </div>
<?php
require_once "../templates/_footer.php";