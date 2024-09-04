<?php
$title="Landing Page";
$repRoot="../../";
require_once "../templates/_header.php";
?>
    <style>

        /* Container 1 */
        .container1 .full-width-img {
            width: 100%;
            height: auto;
        }

        /* Container 2 */
        .container2 {
            background-color: #1A4D2E;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: -4px;
        }

        .container2 h2 {
            margin-bottom: 20px;
        }

        .container2 p {
            width: 50%;
            margin: 0 auto 20px auto;
            line-height: 1.6;

        }

        .container2 .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4F6F52;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        /* Container 3 */
        .container3 {
            background-color: white;
            color: #1A4D2E;
            text-align: center;
            clear: both;
            padding: 30px 0 150px;
        }

        .container3 h2 {
            margin-bottom: 30px;
        }

        .card-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .card {
            text-align: center;
            width: 20%;
        }

        .image-crop {
            width: 100%;
            padding-top: 75%; /* Aspect ratio */
            overflow: hidden;
            border-radius: 50%;
            position: relative;
        }

        .image-crop img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: auto;
        }

        .card p {
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
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
                <div class="image-crop">
                    <img src="<?= images ?>icon.png" alt="Hiking">
                </div>
                <p>Hiking</p>
            </div>
            <div class="card">
                <div class="image-crop">
                    <img src="<?= images ?>icon.png" alt="Whale Watching">
                </div>
                <p>Whale Watching</p>
            </div>
            <div class="card">
                <div class="image-crop">
                    <img src="<?= images ?>icon.png" alt="Scuba Diving">
                </div>
                <p>Scuba Diving</p>
            </div>
            <div class="card">
                <div class="image-crop">
                    <img src="<?= images ?>icon.png" alt="Kayaking">
                </div>
                <p>Kayaking</p>
            </div>
        </div>
    </div>
<?php
require_once "../templates/_footer.php";