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
$startDate = strtotime("05-10-2026");
print("<br>".$startDate."<br>");
$startDate = date("Y-m-d", $startDate);
echo "<br>".$startDate."<br>";
$endDate = strtotime("05-11-2026");
$endDate = date("Y-m-d", $endDate);
$results = $resQuery ->resInsert(1,5,1,$startDate,$endDate);
echo $results[1];
?>
<input type="date" min="<?php date('Y/m/d')?>"  required>
<?php
require_once "{$repRoot}Views/templates/_footer.php";