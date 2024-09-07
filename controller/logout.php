<?php
session_start();
session_destroy();
header('location: ../Views/MainPages/LoginRegis.php');