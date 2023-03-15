<?php

include 'header.php';

// checks if user is logged in, if not, then takes user to the index page
if (!isset($_SESSION["username"])) {
    header("location: index.php");
}

// import stylesheet for particular page
echo '<link rel="stylesheet" href="css/editContent.css">';
?>

<!-- Navigation -->
<ul class="nav-list">
    <li class="menu-button"><a href="search.php">Search</a></li>
    <li class="menu-button"><a href="add-content.php">Add content</a></li>
</ul>

</nav>

<!-- Main heading -->
<p class="main-heading">Click on the content you want to edit</p>

<!-- div displaying content uploaded by user -->
<div class="content">
    <?php
    // success message
    if (isset($_GET['alert'])) {
        if ($_GET['alert'] == "contentUploaded") {
            echo "<div class=\"alert success\">
            <span class=\"closebtn\">&times;</span>  
            Content sucessfully edited!
            </div>";
        } else if ($_GET['alert'] == "contentDeleted") {
            echo "<div class=\"alert success\">
                <span class=\"closebtn\">&times;</span>  
                Content sucessfully deleted!
                </div>";
        }
    }

    include 'database.php';
    include 'displayFunctions.php';

    // assigns session variable to the variable
    $username = $_SESSION['username'];

    // Queries the database
    $sql = "SELECT type, name, id, photo, price, user_username FROM content WHERE user_username LIKE '$username'";
    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);

    if ($queryResult > 0) {
        // displays all content that match the search
        while ($row = mysqli_fetch_assoc($result)) {
            // prints the html in the function from displayFunctions.php
            displayContentBoxes(base64_encode($row['photo']), $row['name'], $row['type'], $row['price'], $row['id']);
        }
    } else {
        // Displays message if no results to show
        echo "</div> <div class=\"no-results\">You haven`t added any content!</div>";
    }
    ?>

</div>
</body>

</html>