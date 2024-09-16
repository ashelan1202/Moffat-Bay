<!--Ashley Landin, Samuel Segars, Rogelio Orozco, CSD460 Capstone in Software Development, 09-15-24-->
<?php
$title="About Us";
$repRoot="../../";
require_once "../templates/_header.php";
?>

<link rel="stylesheet" type="text/css" href="<?php echo css ?>about.css">

<?php
require_once "../templates/_navbar.php";
?>
<!-- First Section -->
<div class="about-container">
    <div class="about-text">

        <h2 class="dark-grey">About Moffat Bay Lodge</h2>
        <p class="light-grey">
            Moffat Bay Lodge has hosted guests for 20 years. With a wide variety of activities available at the lodge,
            you can easily find yourself at home here. We offer activities such as hiking, swimming, camping, kayaking,
            stargazing and more! For specific questions about our facilities, please contact us at (XXX) XXX-XXXX.
        </p>
    </div>
    <div class="img-div">
        <img src="<?= images ?>lodge2.avif" alt="Moffat Bay Lodge" class="about-img">
    </div>

</div>

<!-- Divider -->
<div class="divider"></div>

<!-- Second Section -->
<div class="visit-section">
    <div class="visit-content">
        <h2 class="dark-grey">Visit Us</h2>
        <p class="light-grey">
            Moffat Bay Lodge is conveniently accessible via ferry from the mainland or by private boat.
            Our team is happy to assist with travel arrangements and answer any questions you may have about getting to Joviedsa Island.
            <br><br>
            We look forward to welcoming you to Moffat Bay Lodge, where unforgettable memories await!
            <br><br>
            123 Island View Rd<br>Joviedsa Island, WA 98000<br>
            (555) 555-5555
        </p>
    </div>
</div>

<?php
require_once "../templates/_footer.php";