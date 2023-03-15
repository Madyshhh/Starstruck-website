<?php

/**
 * processes user registration
 */

// if there is an existing session user, remove it
if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}


// gets the values from userdetails form 
if (isset($_POST['sign-up'])) { //this if checks if page accessed by pressing signup button
    $username = trim($_POST['username']);
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $phoneNum = trim($_POST['phoneNum']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $passwordRepeat = trim($_POST['repeat-password']);

    require_once 'database.php';
    require_once 'functions.php';

    // error handling empty fields
    if (emptyInputSignup(
        $username,
        $fname,
        $lname,
        $email,
        $phoneNum,
        $password,
        $passwordRepeat
    ) !== false) {
        header("location: signup.php?error=emptyinput");
        exit();
    }
    // error handling for wrongly entered username, email
    if (invalidUsername($username) !== false) {
        header("location: signup.php?error=invalidusername");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("location: signup.php?error=invalidemail");
        exit();
    }
    if (invalidName($fname) !== false) {
        header("location: signup.php?error=invalidfname");
        exit();
    }
    if (invalidLastname($lname) !== false) {
        header("location: signup.php?error=invalidlname");
        exit();
    }
    if (invalidPhone($phoneNum) !== false) {
        header("location: signup.php?error=invalidphone");
        exit();
    }

    // checking if password matches in both fields
    if (passwordMatch($password, $passwordRepeat) !== false) {
        header("location: signup.php?error=passwordnotmatch");
        exit();
    }

    // error if user already exists
    if (userExists($conn, $username, $email) !== false) {
        header("location: signup.php?error=userexists");
        exit();
    }

    // if no errors, create a new user
    createUser(
        $conn,
        $username,
        $fname,
        $lname,
        $email,
        $phoneNum,
        $password
    );

    $username = $_SESSION['username'];
}
// if page not accessed correct way, take user back to signup.php
else {
    header("location: signup.php");
    exit();
}

// EOF