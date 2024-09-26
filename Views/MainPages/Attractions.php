<?php
$title="Attractions";
$repRoot="../../";
require_once "../templates/_header.php";
?>

    <link rel="stylesheet" type="text/css" href="<?php echo css ?>Attractions.css">

<?php
require_once "../templates/_navbar.php";
?>
<div id="page">

    <div class="green flex section">
        <div class="section-img">
            <img src="<?= images ?>mofat_killers.jpg" alt="Killer whales, lighthouse on coastline" width="100%" >
        </div>
        <div class="section-text">
            <h1>Attractions</h1>
            <h2>Moffat Bay Lodge invites guests to explore a variety of local attractions.</h2>

            <h2>From exciting whale-watching tours and serene kayaking trips, to guided hikes through untouched wilderness and captivating scuba diving excursions.</h2>

            <h2>Whether seeking adventure or tranquility, visitors will find countless ways to connect with the natural beauty and wonder of Moffat Bay. </h2>
        </div>
    </div>

    <div class="tan flex section">
        <div class="section-img">
            <img src="<?= images ?>mofat_scuba.jpg" alt="Scuba diver above coral structure" width="100%" >
        </div>
        <div class="section-text">
            <h1>Scuba Diving</h1>
            <h2>Explore the underwater world with scuba diving! Plunge into crystal-clear waters, navigate coral reefs, and meet the resident marine life for an adventure like no other.</h2>
            <h2>Our guided tours offer a journey through the bay's hidden wonders, making it a must-try experience for anyone who loves the ocean. </h2>
            <h2>Beginner divers welcome!</h2>
        </div>
    </div>

    <div class="green flex section">
        <div class="section-img">
            <img src="<?= images ?>mofat_whale.jpg" alt="Whale tail fin breaks water by small boat" width="100%" >

        </div>
        <div class="section-text">
            <h1>Whale Watching</h1>
            <h2>Embark on an unforgettable whale watching voyage at the nearby Moffat Bay Marina.</h2>
            <h2>Witness majestic whales as they glide through our pristine waters, offering a front-row seat to one of nature's most awe-inspiring spectacles. </h2>

        </div>
    </div>

    <div class="tan flex section">
        <div class="section-img">
            <img src="<?= images ?>mofat_kayak.jpg" alt="Women on 2-person kayak in front of coastline, sunny day" width="100%" >
        </div>
        <div class="section-text">
            <h1>Kayaking</h1>
            <h2>Paddle through the calm waters to explore Moffat Bay's secluded coves, lush shoreline and diverse marine life. Kayaking at Moffat Bay offers the perfect blend of peaceful escape and exploration.</h2>
            <h2>Book your kayak adventure today and immerse yourself in the natural wonders that surround our lodge.  </h2>
        </div>
    </div>

    <div class="green flex section">
        <div class="section-img">
            <img src="<?= images ?>mofat_hiking1.jpg" alt="Hikers on overlook - cloudtopped mountains, rivulet valley, sprawling forest" width="100%" >

        </div>
        <div class="section-text">
            <h1>Hiking</h1>
            <h2>Encounter the untamed beauty of Joviedsa Island with our guided hiking adventure at Moffat Bay Lodge.</h2>
            <h2>Traverse trails that wind through ancient forests, along rugged coastline, and up to breathtaking viewpoints overlooking the Bay. </h2>
            <h2>Each step reveals the island's rich natural landscape, from towering trees and vibrant wildflowers, to chance encounters with local wildlife.</h2>
        </div>
    </div>

</div>
<?php
require_once "../templates/_footer.php";
