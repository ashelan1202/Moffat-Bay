<!--Ashley Landin, Samuel Segars, Rogelio Orozco, CSD460 Capstone in Software Development, 09-15-24-->
<?php
session_start();
session_destroy();
header('location: ../Views/MainPages/LoginRegis.php');