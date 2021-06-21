<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["AccountLevel"]);
header("location:login.php");
session_destroy();