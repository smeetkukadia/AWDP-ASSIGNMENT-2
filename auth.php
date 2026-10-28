<?php
// auth.php
// Include this at the top of any admin-only page to require a login.

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}
?>
