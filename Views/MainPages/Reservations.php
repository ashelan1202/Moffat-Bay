<!--Ashley Landin, Samuel Segars, Rogelio Orozco, CSD460 Capstone in Software Development, 09-15-24-->

<?php
$title="Lodge Reservations Page";
$repRoot="../../";
include $repRoot."models/CustomerInfo/Customer.php";
include $repRoot."models/Reservation/Reservation.php";
$rooms = Reservation::getPrices();
require_once "../templates/_header.php";
?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="../Assets/css/ReservationsStylesheet.css">
<?php
require_once "../templates/_navbar.php";
if (isset($_SESSION["regError"])) {
    regCheck();
}
?>
<h2>Book a Reservation with Us!</h2>

    <form id="ReservationForm" method="POST" action="../../controller/createReservation.php">
<div class="flex">
    <div id="avail-calendar">
        <h4>Select a date to view availability</h4>
        <input id="calendar-selectrange" hidden="hidden">
        <script>
            let fp = flatpickr('#calendar-selectrange',{
                "mode": "range",
                "inline": true,
                onValueUpdate: [function(date, dateStr){
                    let startDate = dateStr;
                    startDate = startDate.slice(0,10);
                    let endDate = dateStr.slice(14,25);
                    document.getElementById("startDate").value = startDate;
                    document.getElementById("endDate").value = endDate;
                    getPrice();

                }]
            });


        </script>
            <div class="guests-dropdown">
                <label for="numofGuests">Number of Guests:</label>
                <select name="guests" id="numofGuests" required>

                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
    </div>
    <div id="dates-selected">
        <div id="middle">
            <h3>Start Date: <input id="startDate" type="date" name="startDate" readonly required></h3>
            <h3>End Date: <input type="date" id="endDate" name="endDate" readonly required></h3>
        </div>
    </div>
    <div id="avail-list">
        <div id="right">
            <table class="availabilities" id="availabilities">
                <thead>
                    <tr>
                        <th>Lodge</th>
                        <th>Cost</th>
                    </tr>
                </thead>
                <tbody id="avail-rooms"></tbody>
                <?php
                foreach($rooms as $prices){?>

                            <?php foreach($prices as $price){?>
                        <tr>
                            <td class="inputName"><input type="radio" id="room<?php echo $price["roomId"]?>" name="lodgeId" onclick="getPrice()"  value="<?php echo $price["roomId"]?>" required><label><?php echo $price["roomSize"]; ?></label></td>
                                <td><?php echo $price["price"]?></td>
                        </tr>
                            <?php }
                }
                ?>
            </table>
        </div>
    </div>
    </form>
</div>
<div class="flex" id="bottomhalf">
    <div id="logIn">
        <?php
        if (!isset($_SESSION["customer"])) {?>
        <h3>Login</h3>
        <h4>Login to finalize reservation</h4>

        <p id="loginErrMsg"><?php if(isset($_SESSION["loginError"])){
                echo $_SESSION["loginError"];
                unset($_SESSION["loginError"]);
            }?></p>
        <form method="post" action="../../controller/login.php">
            <input type="email" id="email" name="email" placeholder="Email" required><br>
            <input type="password" id="password" name="password" placeholder="Password" required><br>
            <button type="submit" class="submit" name="submit" value="ressignin">Sign In</button><br>
        </form>
            <h4><a href="registration.php" style="color: black; text-decoration: none">Don't have an account with us? Click here to sign up!</a></h4>
        <?php }else{
        ?>
            <h3>You are currently logged in!</h3>
            <p> User: <?php echo $_SESSION["customer"]->getName();?></p>
            <?php
        }?>
    </div>

    <div id="payment-info">
        <h3>Payment Details</h3>
        <div id="payment" class="flex">
        <div id="cardinfo">
        <input type="text" id="name" name="name" placeholder="Name of Cardholder" disabled><br>
        <input type="text" id="cardNo" name="cardNo" placeholder="Card Number" disabled><br>
        <input type="text" id="expDate" name="expDate" placeholder="Expiration Date" disabled><br>
        <input type="text" id="cvv" name="cvv" placeholder="CVV" disabled><br>
        <input type="text" id="zip" name="zip" placeholder="ZIP Code" disabled><br>
        </div>
        <div id="quickPay">
        <button type="button" name="paypal" value="paypal">PayPal </button><br>
        <button type="button" name="venmo" value="venmo">Venmo</button><br>
        <button type="button" name="google" value="google">Google Pay</button><br>
        <button type="button" name="apple" value="apple">Apple Pay</button><br>
        </div>
        </div>
    </div>

</div>
    <div class="amount">
        <h3 id="amountOwed">Please Select A Room Size and Dates</h3>
        <?php if(isset($_SESSION["customer"])){?>
        <button form="ReservationForm" type="submit" class="submit" name="submit" value="confirmReservation">Confirm Reservation</button><br>
        <?php }else{?>
           <h1 style="margin-bottom: 0;">Please Sign In First!</h1>
        <?php
        }?>
    </div>
<script>
    function getPrice() {
        let startDate = document.getElementById("startDate");
        let endDate = document.getElementById("endDate");
        let radio = document.querySelector('input[type="radio"]:checked');
        if(startDate.value !== "" && endDate.value !== "" && radio !== null) {
            let roomPrices = new Map([<?php foreach ($rooms[0] as $prices){echo '["'. $prices["roomId"].'","'. $prices["price"].'"],';}?>]);
            let price = roomPrices.get(radio.value);
            console.log(price);
           price = (dateDiffInDays(new Date(startDate.value), new Date(endDate.value))) * price;

            document.getElementById("amountOwed").innerHTML = "Amount Owed $" + price;
        }
        }

        //Function Provided by Shyam Habarakada and Edited by João Pimentel Ferreira on Stack Overflow
    function dateDiffInDays(a, b) {
        const _MS_PER_DAY = 1000 * 60 * 60 * 24;

        const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
        const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

        return Math.floor((utc2 - utc1) / _MS_PER_DAY);
    }
</script>
<?php

require_once "../templates/_footer.php";

