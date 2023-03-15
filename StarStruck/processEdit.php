<?php

/**
 * Gets the data entered by user from the log in form
 * Handles an error if the fields are empty and calls a function to log in user
 */

// gets the data from log in form
if (isset($_POST['submitEdit'])) {
    //$selected = getimagesize($_FILES["content-file"]["tmp_name"]);
    $name = trim($_POST['new-content-name']);
    $description = trim($_POST['new-description']);
    $price = trim($_POST['new-price']);
    $type = trim($_POST['new-content-type']);
    //Get the contents of the image
    //$file = file_get_contents($_FILES['content-file']['tmp_name']);
    //$photo = base64_encode($file);
    $contentId = trim($_GET['id']);

    require_once 'database.php';
    require_once 'functions.php';


    // error handling empty fields
    if (emptyInputUpload($name, $description, $price, $type) !== false) {
        header("location: editContent.php?error=emptyinput");
        exit();
    } else if (invalidContentName($name)) {
        header("location: editContent.php?error=invalidName");
        exit();
    }

    // calls a function from the functions.php
    editContent($conn, $name, $description, $price, $type, $contentId);

    header("location: editContent.php?error=uploadsuccessfull");
    exit();
} else {
    header("location: editContent.php");
    exit();
}
