<?php

include 'header.php';
include 'functions.php';

// checks if user is logged in, if not, then takes user to the index page
if (!isset($_SESSION["username"])) {
    header("location: index.php");
}

// import stylesheet for particular page
echo '<link rel="stylesheet" href="css/search.css">';
?>
<!-- Navigation menu -->
<ul class="nav-list">
    <li class="menu-text"><a href="processLogout.php">Log out</a></li>
    <li class="menu-button"><a href="add-content.php">Add content</a></li>
    <li class="menu-button"><a href="editContent.php">Edit content</a></li>
</ul>

</nav>

<!-- Main heading -->
<p class="main-heading">
    <?php echo $_SESSION['username']; ?>, Search for celebrities or content type
</p>

<!-- Bottom heading -->
<p class="bottom-heading">
    Enter celebrity`s name or surname to see the content they offer! Or, enter type of content you want to buy from
    any celebrity!
</p>

<!-- Search form -->
<form action="services.php" class="search-form" method="POST">
    <input type="text" placeholder="Search.." name="search">
    <button type="submit" name="submit-search">
        Submit
    </button>
</form>

</body>

</html>