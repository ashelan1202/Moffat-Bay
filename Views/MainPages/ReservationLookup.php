<!--Ashley Landin, Samuel Segars, Rogelio Orozco, CSD460 Capstone in Software Development, 09-15-24-->
<?php
$repRoot = "../../";
$title = "ReservationLookup";
require_once "../templates/_header.php";
?>
<link rel="stylesheet" href="../Assets/css/reservationLookup.css">
<?php
require_once "../templates/_navbar.php";
?>
<div id="resLookup" class="flex">
    <form method="post" action="../../controller/resLookup.php">
    <h1>Reservation Look up</h1>
    <h3>Enter your reservation information to view details</h3>
        <p style="color:red;">
            <?php if(isset($_SESSION["resLookupError"])){
            echo$_SESSION["resLookupError"];
            unset($_SESSION["resLookupError"]);}
            ?></p>
    <p><input type="number" name="resId" placeholder="Confirmation Number" required></p>
    <p><input type="email" name="email" placeholder="Email" required></p>
    <p><button type="submit" name="submit">Lookup</button></p>
    </form>


</div>

<?php
require_once "../templates/_footer.php";
