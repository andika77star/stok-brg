<?php
require_once "core/init.php";

isset($_SESSION['user']);
session_destroy();
    
header("Location: frontend/login.php");

?>