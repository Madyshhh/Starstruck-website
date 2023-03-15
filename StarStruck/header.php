<?php
ini_set('session.use_strict_mode', 1);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metatags -->
    <meta charset="UTF-8">
    <meta name="description" content="Starstruck">
    <meta name="keywords" content="star, struck, celebrity, content, video, celebrity video">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Maddy">

    <title>Starstruck</title>

    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="images/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">


</head>

<body>
    <!-- Navigation to make it the same in each page -->
    <nav>
        <?php
        if (isset($_SESSION['username'])) {
            echo "<a href=\"search.php\"><img src=\"images/logotransparent.png\" alt=\"StarStruck logo\" class=\"logo\"></a>";
        } else {
            echo "<a href=\"index.php\"><img src=\"images/logotransparent.png\" alt=\"StarStruck logo\" class=\"logo\"></a>";
        }
        ?>