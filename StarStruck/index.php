<?php

include 'header.php';

include 'functions.php';

// checks if user is logged in, if yes, then takes user to search page
if (isset($_SESSION["username"])) {
    header("location: search.php");
}

// import stylesheet for particular page
echo '<link rel="stylesheet" href="css/indexpage.css">';
?>
<!-- Navigation menu -->
<ul class="nav-list">
    <li class="menu-text"><a href="login.php">Log in</a></li>
    <li class="menu-button"><a href="signup.php">Sign up</a></li>
</ul>

</nav>

<!-- Main heading  -->
<p class="main-heading">
    Search for celebrity services, such as video messages, signed cards, voice messages or live calls!
</p>

<!-- Bottom heading  -->
<p class="bottom-heading">
    Access thousands of celebrities and request a personalised video message for any occasion.
</p>

<!-- Sign up button -->
<p>
    <a href="signup.php" class="signup">
        Sign up
    </a>
</p>

<!-- Log in button -->
<p>
    <a href="login.php" class="login">
        Log in
    </a>
</p>

</body>

</html>