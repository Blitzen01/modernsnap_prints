<?php
session_start();
// Destroy the session and logout the user
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['permission']);
header("Location: ../../admin/index.php"); // Redirect to the login page after logout
exit;
