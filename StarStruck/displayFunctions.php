<?php

require 'database.php';

// queries the database to get all the information about content
$sql = "SELECT type, c.name, description, photo, price, user_username, active, u.fname, u.surname, u.username FROM content c LEFT JOIN user u ON c.user_username = u.username;";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

// displays users after searching in services.php page
function displayUser($fname, $lname, $image, $category, $username)
{
    echo "<div class=\"content\">
            <a href=\"servicepage.php?username=$username\">
                <img src=\"data:image/jpg;charset=utf8;base64,$image\">
                <p class=\"name\">$fname $lname ($username)</p>
                <p class=\"category\">$category</p>
            </a>
        </div>";
}

// displays content information in servicePage.php
function displayContent($photo, $fname, $surname, $type, $description, $price, $contentName)
{
    echo "<img src=\"data:image/jpg;charset=utf8;base64,$photo\" alt=\"Picture\" class=\"content-picture\">
    <div class=\"wrapper\">
        <p class=\"name\">$contentName</p>
        <p class=\"content\">$fname $surname</p>
        <p class=\"type\">$type</p>
    </div>
    <p class=\"description\">$description</p>

    <div class=\"price-wrapper\">
        <p class=\"price\">£$price</p>

        <button>Book now</button>
    </div>";
}

// displays the content boxes in editContent.php
function displayContentBoxes($photo, $name, $type, $price, $id)
{
    echo "
    <div class=\"content-box\">
    <a href=\"editing.php?id=$id\"><img src=\"data:image/jpg;charset=utf8;base64,$photo\" alt=\"Content image\" class=\"content-image\"></a>
    <p class=\"content-name\"><a href=\"editing.php?id=$id\">$name</a></p>
    <p class=\"content-type\">$type</p>
    <p class=\"content-price\">£$price</p>
    </div>";
}

// EOF