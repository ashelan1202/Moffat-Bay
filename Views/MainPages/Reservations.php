<?php
$title="Lodge Reservations Page";
$repRoot="../../";
include $repRoot."models/CustomerInfo/Customer.php";
include $repRoot."models/Reservation/Reservation.php";
require_once "../templates/_header.php";
?>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
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
        <div id=datepicker>
            <script>
                $( function() {
            $( "#datepicker" ).datepicker();
            } );
            </script>
        </div>
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
            <h3>Start Date: <input type="date" name="startDate" required></h3>
            <h3>End Date: <input type="date" name="endDate" required></h3>
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
                foreach(Reservation::getPrices() as $prices){?>

                            <?php foreach($prices as $price){?>
                        <tr>
                            <td><input type="radio" id="room<?php echo $price["roomId"]?>" name="lodgeId" onclick="getPrice(<?php echo $price["price"]?>)" value="<?php echo $price["roomId"]?>"><?php echo $price["roomSize"]; ?></td>
                                <td><?php echo $price["price"]?></td>
                        </tr>
                            <?php }
                }
                ?>
            </table>
        </div>
    </div>
    </form>
<div class="flex" id="bottomhalf">
    <div id="logIn">
        <?php
        if (!isset($_SESSION["customer"])) {?>
        <h3>Login</h3>
        <h4>Login to finalize reservation</h4>
        <h4>Don't have an account with us? Click here to sign up!</h4>
        <p id="loginErrMsg"><?php if(isset($_SESSION["loginError"])){
                echo $_SESSION["loginError"];
                unset($_SESSION["loginError"]);
            }?></p>
        <form method="post" action="../../controller/login.php">
            <input type="email" id="email" name="email" placeholder="Email" required><br>
            <input type="password" id="password" name="password" placeholder="Password" required><br>
            <button type="submit" class="submit" name="submit" value="ressignin">Sign In</button><br>
        </form><?php }else{
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
        <h3 id="amountOwed">Amount Owed $<a id="price">155</a></h3>
        <?php if(isset($_SESSION["customer"])){?>
        <button form="ReservationForm" type="submit" class="submit" name="submit" value="confirmReservation">Confirm Reservation</button><br>
        <?php }else{?>
           <h1>Please Sign In First!</h1>
        <?php
        }?>
    </div>
<script>
    function getPrice(price) {
        document.getElementById("price").innerHTML = price;
    }
    $(document).ready (function() {
        let radiobtn = document.getElementById("room1");
        radiobtn.checked = true;
    })
</script>
<?php

require_once "../templates/_footer.php";

