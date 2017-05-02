<?php
include("library/connection.php");
// Inialize session
session_start();

// Delete certain session
unset($_SESSION['username']);
// Jump to login page
header('Location: login.php');
?>
