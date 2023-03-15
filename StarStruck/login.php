<?php

include 'header.php';

include 'functions.php';

// checks if user is logged in, if yes, then takes user to search page
if (isset($_SESSION["username"])) {
    header("location: search.php");
}

// import stylesheet for particular page
echo '<link rel="stylesheet" href="css/login.css">';
?>
<!-- Navigation menu -->
<ul class="nav-list">
    <li class="menu-button"><a href="signup.php">Sign up</a></li>
</ul>

</nav>

<div class="form-container">
    <?php
    // displays error messages on the page
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyinput") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        Please fill in all fields!
                    </div>";
        } else if ($_GET['error'] == "invalidUsername") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        Invalid username entered! User name should be from 4 to 50 characters long!
                    </div>";
        } else if ($_GET['error'] == "wrongusername") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        User with this username doesn`t exist!
                    </div>";
        } else if ($_GET['error'] == "wrongpassword") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        Wrong password entered!
                    </div>";
        }
    }
    if (isset($_GET['alert'])) {
        if ($_GET['alert'] == "userRegistered") {
            echo "<div class=\"alert success\">
                        <span class=\"closebtn\">&times;</span>  
                        User created! Please log in!
                    </div>";
        }
    }
    ?>
    <!-- main heading -->
    <p class="main-heading">Log in to search for celebrity services or add your own!</p>

    <!-- log in form -->
    <form action="processLogin.php" class="login-form" method="POST">
        <input type="text" placeholder="Username" name="username">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" name="login">Log in</button>


        <p class="forgot-password"><a href="#">I forgot my password</a></p>

        <!-- button to sign up instead -->
        <p><a href="signup.php" class="signup-button">Sign up</a></p>
    </form>
</div>

<!-- javascript to close the error message if clicked on x -->
<script>
    var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function() {
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function() {
                div.style.display = "none";
            }, 600);
        }
    }
</script>
</body>

</html>