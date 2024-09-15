<?php
$title="Lodge Reservations Page";
$repRoot="../../";

require_once "../templates/_header.php";
?>

    <link rel="stylesheet" href="../Assets/css/ReservationsStylesheet.css">
<?php
require_once "../templates/_navbar.php";
if (isset($_SESSION["regError"])) {
    regCheck();
}
?>
<h2>Book a Reservation with Us!</h2>
<h4>Select a date to view availability</h4>
<div id="flex">
    <div id="avail-calendar">
        <div id="left">
            <h3 id="monthYear"></h3>
            <div  class="calendar-buttons">
                <button id="previous" onclick="prevMonth()"> < </button>
                <button id="next" onclick="nextMonth()"> > </button>
            </div>
            <table class="calendar" id="calendar">
                <thead id="month"></thead>
                <tbody id="calendar-body"></tbody>
            </table>
            <div class="guests-dropdown">
                <label for="guests">Number of Guests:</label>
                <select name="guests" id="numofGuests">
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
    </div>
    <div id="dates-selected">
        <div id="middle">
            <h3>Start Date:</h3>
            <h3>End Date:</h3>
        </div>
    </div>
    <div id="avail-list">
        <div id="right">
            <table class="availabilities" id="availabilities">
                <thead>
                    <tr>
                        <th>Lodge</th>
                        <th>Beds</th>
                        <th>Bath</th>
                        <th>Cost</th>
                    </tr>
                </thead>
                <tbody id="avail-rooms"></tbody>
            </table>
        </div>
    </div>
</div>
<div id="flex-bottomhalf">
    <div class="logIn">
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
            <button type="submit" class="submit" name="submit" value="signin">Sign In</button><br>
        </form>
    </div>
    <div class="payment-info">
        <h3>Payment Details</h3>
        <input type="text" id="name" name="name" placeholder="Name of Cardholder" required><br>
        <input type="text" id="cardNo" name="cardNo" placeholder="Card Number" required><br>
        <input type="text" id="expDate" name="expDate" placeholder="Expiration Date" required><br>
        <input type="text" id="cvv" name="cvv" placeholder="CVV" required><br>
        <input type="text" id="zip" name="zip" placeholder="ZIP Code" required><br>
        <button type="button" name="paypal" value="paypal">PayPal</button><br>
        <button type="button" name="venmo" value="venmo">Venmo</button><br>
        <button type="button" name="google" value="google">Google Pay</button><br>
        <button type="button" name="apple" value="apple">Apple Pay</button><br>
    </div>
    <div class="amount">
        <h3>Amount Owed</h3>
        <button type="submit" class="submit" name="submit" value="confirmReservation">Confirm Reservation</button><br>
    </div>
</div>

<?php

require_once "../templates/_footer.php";
if (isset($_SESSION["submit"])) {
    $res = new Reservation();
    $res ->newRes($_POST["guests"],$_POST["startDate"],$_POST["endDate"],$_POST["roomId"],$_SESSION["customer"]->getCustomerId());
    header("location: ReserveSummary.php");
}
