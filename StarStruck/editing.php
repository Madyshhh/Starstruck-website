<?php

include 'header.php';

// checks if user is logged in, if not, then takes user to the index page
if (!isset($_SESSION["username"])) {
    header("location: index.php");
}

// import stylesheet for particular page
echo '<link rel="stylesheet" href="css/editing.css">';
?>

<!-- Navigation -->
<ul class="nav-list">
    <li class="menu-button"><a href="search.php">Search</a></li>
    <li class="menu-button"><a href="search.php">Edit content</a></li>
</ul>

</nav>

<!-- Main heading -->
<p class="main-heading">Enter the new details for your content</p>

<?php
// success message
if (isset($_GET['alert'])) {
    if ($_GET['alert'] == "contentDeleted") {
        echo "<div class=\"alert success\">
            <span class=\"closebtn\">&times;</span>  
            Content sucessfully deleted!
            </div>";
    }
}

$contentId = trim($_GET['id']);
?>

<!-- Form to change the details for the content -->
<form action="processEdit.php?id=<?php echo $contentId ?>" method="POST" class="add-content-form-desktop" enctype="multipart/form-data">

    <label for="content-file">Upload a file:</label>

    <div class="file-choosing-wrapper">
        <button type="button" id="file-browse-button">Browse</button>
        <input type="file" id="content-file" name="new-content-file">
    </div>

    <label for="content-name">Product name:</label>
    <input type="text" id="content-name" name="new-content-name" placeholder="Enter new product name">

    <label for="content-name">Product type:</label>
    <input type="text" id="content-name" name="new-content-type" placeholder="Enter new product type">

    <label for="content-description">Product description:</label>
    <input type="text" id="content-description" name="new-description" placeholder="Enter new product description">

    <label for="content-price">Product price:</label>
    <input type="text" id="content-price" name="new-price" placeholder="Enter new product price">

    <button type="submit" id="submit-button" name="submitEdit">Submit</button>

</form>

<!-- Button to process deletion of the content -->
<form action="processDelete.php?id=<?php echo $contentId ?>" method="POST">
    <button type="submit" id="submit-button" name="delete">Delete record</button>
</form>

</body>

<footer>

    <!-- Footer to have the gap at the button -->

</footer>

</html>