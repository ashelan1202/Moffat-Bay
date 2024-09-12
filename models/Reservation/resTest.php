<?php
$repRoot = "../../";
include "ReservationQuery.php";
require_once "{$repRoot}Views/templates/_header.php";
$resQuery = new ReservationQuery();
require_once "{$repRoot}Views/templates/_navbar.php";

$results = $resQuery ->resLookup(1,"test@test.com")[1];

foreach ($results[0] as $value){
    echo "$value<br>";
}
?>
<br>
<hr>
<form method="post">
<input type="date" name="startDate">
<input type="date" name="endDate">
<input type="submit" name="submit">
</form>

<?php
if(isset($_POST["submit"])) {
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];
    $results = $resQuery->resInsert(1, 5, 1, $startDate, $endDate);
    echo $results[1];
    unset($_POST["startDate"], $_POST["endDate"], $_POST["submit"]);
    //header('Location: ' . $pages["Landing Page"] );
}
?>
<input type="date" min="<?php date('Y/m/d')?>"  required>
<?php
require_once "{$repRoot}Views/templates/_footer.php";