<?php

include 'header.php';
include 'displayFunctions.php';

include 'functions.php';

// checks if user is logged in, if not, then takes user to the index page
if (!isset($_SESSION["username"])) {
    header("location: index.php");
}

// import stylesheet for particular page
echo '<link rel="stylesheet" href="css/services.css">';
?>

<!-- Navigation -->
<ul class="nav-list">
    <li class="menu-button"><a href="search.php">Search</a></li>
    <li class="shopping-basket"><a href="#"><img src="images/noun-basket-4428284.png" alt="Image of shopping basket" width="30"></a></li>
</ul>

</nav>

<p class="main-heading">Celebrities</p>

<div class="content-grid">
    <!-- Displays content after searching for content type or celebrity -->
    <?php
    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        // Queries the database
        $sql = "SELECT fname, surname, profile_image, category, username FROM user WHERE fname LIKE '%$search%' OR category LIKE '%$search%' OR surname LIKE '%$search%' OR username LIKE '%$search%' OR category LIKE '%$search%';";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0) {
            // displays all products that match the search
            while ($row = mysqli_fetch_assoc($result)) {
                // prints the html in the function from products.php, with the fields from db
                echo displayUser($row['fname'], $row['surname'], base64_encode($row['profile_image']), $row['category'], $row['username']);
            }
        } else {
            // Displays message if no results to show
            echo "</div> <div class=\"no-results\">There are no results matching your search!</div>";
        }
    }
    ?>
</div>

</body>

</html>