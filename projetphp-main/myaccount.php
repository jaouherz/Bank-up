<?php
session_start();

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    if ($role == 'admin') {
echo "admin" ;  } else {
        // Redirect to an error page or handle unauthorized access
        header('Location: error.php');
        exit;
    }
} else {
    // Session variable not set, redirect to login page
    header('Location: login.php');
    exit;
}