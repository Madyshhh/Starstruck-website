<?php
include 'functions.php';
/**
 * Gets the data entered by user from the log in form
 * Handles an error if the fields are empty and calls a function to log in user
 */

// gets the data from log in form
if (isset($_POST['submitUpload'])) {
    $photo = $_FILES;
    $name = trim($_POST['content-name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $type = trim($_POST['content-type']);
    $username = trim($_GET['username']);

    require_once 'database.php';
    require_once 'functions.php';


    // error handling empty fields
    if (emptyInputUpload($name, $description, $price, $type, $photo) !== false) {
        header("location: add-content.php?error=emptyinput");
        exit();
    } else if (invalidContentName($name)) {
        header("location: add-content.php?error=invalidName");
        exit();
    } else if (invalidContentType($type)) {
        header("location: add-content.php?error=invalidType");
        exit();
    } else if (invalidContentDescription($description)) {
        header("location: add-content.php?error=invalidDescription");
        exit();
    } else if (invalidContentPrice($price)) {
        header("location: add-content.php?error=invalidPrice");
        exit();
    }

    // calls a function from the functions.php
    addContent($conn, $name, $description, $price, $type, $username);

    header("location: add-content.php?error=uploadsuccessfull");
    exit();
} else {
    header("location: search.php");
    exit();
}

// EOF