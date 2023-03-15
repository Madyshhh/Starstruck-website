<?php

/**
 * Gets the data entered by user from the log in form
 * Handles an error if the fields are empty and calls a function to log in user
 */

// gets the data from log in form
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    require_once 'database.php';
    require_once 'functions.php';

    // error handling empty fields
    if (emptyInputLogin($username, $password) !== false) {
        header("location: login.php?error=emptyinput");
        exit();
    }
    if (invalidUsername($username) !== false) {
        header("location: login.php?error=invalidUsername");
        exit();
    }

    // calls a function from the functions.php
    loginUser($conn, $username, $email, $password);
} else {
    header("location: login.php?error=loginfailed");
    exit();
}


// EOF