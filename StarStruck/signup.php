<?php

// include the header
include 'header.php';

include 'functions.php';

// checks if user is logged in, if yes, then takes user to search page
if (isset($_SESSION["username"])) {
    header("location: search.php");
}

// import stylesheet for particular page
echo '<link rel="stylesheet" href="css/signup.css">';
echo '<script src="js/validateRegForm.js" type="text/javascript"></script>';
?>

<!-- menu -->
<ul class="nav-list">
    <li class="menu-button"><a href="login.php">Log in</a></li>
</ul>

</nav>

<!-- contains the form -->
<div class="form-container">

    <?php
    // displays error messages on the page
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyinput") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        Please fill in all fields!
                    </div>";
        } else if ($_GET['error'] == "invalidusername") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        Invalid username entered! User name should be from 4 to 50 characters long!
                    </div>";
        } else if ($_GET['error'] == "invalidfname") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        Invalid first name! Name should start with capital letter!
                    </div>";
        } else if ($_GET['error'] == "invalidlname") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        Invalid last name! Surname should start with capital letter!
                    </div>";
        } else if ($_GET['error'] == "invalidemail") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        Invalid email entered!
                    </div>";
        } else if ($_GET['error'] == "invalidphone") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        Invalid phone number! Phone number should be from 11 to 15 digits!
                    </div>";
        } else if ($_GET['error'] == "passwordnotmatch") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        Passwords don`t match!
                    </div>";
        } else if ($_GET['error'] == "userexists") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        User already exists!
                    </div>";
        } else if ($_GET['error'] == "statementfailed") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        Oops! Something went wrong! Please try again!
                    </div>";
        } else if ($_GET['error'] == "cantcreate") {
            echo "<div class=\"alert\">
                        <span class=\"closebtn\">&times;</span>  
                        Oops! Something went wrong! Please try again!
                    </div>";
        } 
    }
    ?>

    <!-- sign up with facebook, google, twitter -->
    <p class="main-heading">Sign up by entering your details</p>
    <div class="left-side">
        <button type="submit" disabled>Sign up with Facebook</button>
        <button type="submit" disabled>Sign up with Google</button>
        <button type="submit" disabled>Sign up with TikTok</button>
    </div>
    <!-- form for user details -->
    <div class="right-side">
        <form action="processReg.php" class="signup-form" method="POST">
            <input type="text" placeholder="Username" name="username">
            <input type="email" placeholder="Email" name="email">
            <input type="text" placeholder="Name" name="fname">
            <input type="text" placeholder="Surname" name="lname">
            <input type="text" placeholder="Phone number" name="phoneNum">
            <input type="password" placeholder="Password" name="password">
            <input type="password" placeholder="Repeat password" name="repeat-password">

    </div>
    <!-- link to the terms -->
    <p class="terms"><a href="#">By clicking Sign up you agree to our terms and conditions</a></p>

    <!-- form submit button -->
    <button type="submit" class="sign-up" name="sign-up">Sign up</button>
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

<footer>
    <!-- footer to create space at the bottom -->
</footer>

</html>