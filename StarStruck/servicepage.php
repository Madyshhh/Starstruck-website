<?php

include 'header.php';
include 'displayFunctions.php';
include 'database.php';

include 'functions.php';

// checks if user is logged in, if not, then takes user to the index page
if (!isset($_SESSION["username"])) {
    header("location: index.php");
}

// import stylesheet for particular page
echo '<link rel="stylesheet" href="css/servicePage.css">';
?>

<!-- navigation -->
<ul class="nav-list">
    <li class="menu-text"><a href="processLogout.php">Log out</a></li>
    <li class="menu-button"><a href="search.php">Search</a></li>
    <li class="shopping-basket"><a href="#"><img src="images/noun-basket-4428284.png" alt="Image of shopping basket" width="30"></a></li>
</ul>

</nav>

<!-- contains the content -->
<div class="content-box">
    <?php

    if ($resultCheck > 0) {
        // gets product code from link when clicked view product
        $username = $_GET['username'];

        // selects the product with the product code from database
        $sql = "SELECT type, c.name, description, photo, price, user_username, active, u.fname, u.surname, u.username FROM content c LEFT JOIN user u ON c.user_username = u.username WHERE u.username = '$username';";
        $product = mysqli_query($conn, $sql); //performs query

        //creates an array of rows returned from the query
        $row = $product->fetch_array(MYSQLI_ASSOC);

        // displays the function from products.php with the fields for the row
        echo displayContent(base64_encode($row['photo']), $row['fname'], $row['surname'], $row['type'], $row['description'], $row['price'], $row['name']);
    } else {
        echo "</div> <div class=\"no-results\">There are no results matching your search!</div>";
    }

    ?>

    <!-- Embedded video from youtube -->
    <p class="sample-video">Sample video:</p>
    <iframe width="90%" height="240px" src="https://www.youtube.com/embed/QcyPRFpkYak" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="video"></iframe>

    <!-- Video inserted -->
    <video width="90%" height="240px" class="birthday-video" controls>
        <source src="video/birthday.mp4" type="video/mp4">
    </video>

    <!-- Audio inserted -->
    <p class="sample-audio">Sample audio:</p>
    <audio controls class="audio">
        <source src="audio/happybirthday.mp4" type="audio/mp4">
        Your browser does not support the audio element.
    </audio>

</div>
</body>

<!-- internal style sheet to style the videos and audio -->
<style>
    .sample-video {
        font-weight: 300;
        font-size: 1vw;
        grid-row-start: 5;
        grid-row-end: 6;
    }

    .sample-audio {
        font-weight: 300;
        font-size: 1vw;
        grid-row-start: 7;
        grid-row-end: 8;
    }

    .video {
        grid-row-start: 6;
        grid-column-start: 1;
        grid-column-end: 2;
        margin: 0 auto;
        border-radius: 10px;
    }

    .birthday-video {
        grid-column-start: 2;
        grid-column-end: 3;
        grid-row-start: 6;
        margin: 0 auto;
    }

    .audio {
        width: 80%;
        margin: auto auto;
        grid-column-start: 1;
        grid-column-end: 3;
    }
</style>

<footer>

    <!-- This is the footer which gives space under the content -->

</footer>

</html>