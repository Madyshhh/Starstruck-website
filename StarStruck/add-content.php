<?php

include 'header.php';

// checks if user is logged in, if not, then takes user to the index page
if (!isset($_SESSION["username"])) {
    header("location: index.php");
}

// import stylesheet for particular page
echo '<link rel="stylesheet" href="css/addcontent.css">';
?>

<!-- Navigation menu -->
<ul class="nav-list">
    <li class="menu-button"><a href="search.php">Search</a></li>
    <li class="menu-button"><a href="editContent.php">Edit content</a></li>
</ul>

</nav>


<p class="main-heading">Enter your content details</p>


<?php

$username = strval($_SESSION['username']);

// Error handling
if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyinput") {
        echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        Please fill in all fields!
                    </div>";
    } else if ($_GET['error'] == "cantcreate") {
        echo "<div class=\"alert\">
                    <span class=\"closebtn\">&times;</span>  
                    Oops! Something went wrong! Please try again!
                </div>";
    } else if ($_GET['error'] == "invalidName") {
        echo "<div class=\"alert\">
                    <span class=\"closebtn\">&times;</span>  
                    Please enter a valid name for your product! It should be 5-50 characters.
                </div>";
    } else if ($_GET['error'] == "invalidType") {
        echo "<div class=\"alert\">
                    <span class=\"closebtn\">&times;</span>  
                    Please enter a valid type for your product! It should be 5-30 characters.
                </div>";
    } else if ($_GET['error'] == "invalidDescription") {
        echo "<div class=\"alert\">
                    <span class=\"closebtn\">&times;</span>  
                    Please enter a valid description for your product! It should be 5-100 characters.
                </div>";
    } else if ($_GET['error'] == "invalidPrice") {
        echo "<div class=\"alert\">
                    <span class=\"closebtn\">&times;</span>  
                    Please enter a valid price for your product!
                </div>";
    }
}

// success message for upload
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == "added") {
        echo "<div class=\"alert success\">
            <span class=\"closebtn\">&times;</span>  
            Content successfully added!
            </div>";
    }
}

?>

<!-- Content form desktop -->
<form action="processUpload.php?username=<?php echo $username ?>" method="POST" class="add-content-form-desktop" enctype="multipart/form-data">

    <label for="content-file">Upload a file:</label>

    <div class="file-choosing-wrapper">
        <button type="button" id="file-browse-button">Browse</button>
        <input type="file" id="content-file" name="content-file">
    </div>

    <label for="content-name">Product name:</label>
    <input type="text" id="content-name" name="content-name" placeholder="Enter product name">

    <label for="content-name">Product type:</label>
    <input type="text" id="content-name" name="content-type" placeholder="Enter product type">

    <label for="content-description">Product description:</label>
    <input type="text" id="content-description" name="description" placeholder="Enter product description">

    <label for="content-price">Product price:</label>
    <input type="text" id="content-price" name="price" placeholder="Enter product price">

    <button type="submit" id="submit-button" name="submitUpload">Submit</button>

</form>

<!-- Content form mobile -->
<form action="processUpload.php" class="add-content-form-mobile" enctype="multipart/form-data">

    <label for="content-name">Product name:</label>
    <input type="text" id="content-name" name="content-name" placeholder="Enter product name">

    <label for="content-file">Upload a file:</label>

    <div class="file-choosing-wrapper">
        <button type="button" id="file-browse-button">Browse</button>
        <input type="file" id="content-file" name="content-file">
    </div>

    <label for="content-description">Product description:</label>
    <input type="text" id="content-description" placeholder="Enter product description">

    <label for="content-price">Product price:</label>
    <input type="text" id="content-price" placeholder="Enter product price">

    <button type="submit" id="submit-button" name="submit-upload">Submit</button>

</form>

</body>

</html>