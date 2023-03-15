<?php
// functions for error handling, for user input

// checks if strings not empty
function emptyInputSignup(
    $username,
    $fname,
    $lname,
    $email,
    $phoneNum,
    $password,
    $passwordRepeat
) {
    $result = false;

    if (
        empty($username) || empty($fname) || empty($lname) || empty($email) || empty($phoneNum) || empty($password) || empty($passwordRepeat)
    ) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// checks if the username contains only letters
function invalidUsername($username)
{
    $result = false;


    if (!preg_match("/^[a-zA-Z0-9]{4,50}$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}


// checks if the name contains only letters
function invalidName($fname)
{
    $result = false;


    if (!preg_match("/^([A-Z]{1}[a-z]+\s*){1,3}$/", $fname)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// checks if the last name contains only letters
function invalidLastname($lname)
{
    $result = false;


    if (!preg_match("/^([A-Z]{1}[a-z]+\s*){1,3}$/", $lname)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// validates the email
function invalidEmail($email)
{
    $result = false;


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// validates phone number - 11 numbers
function invalidPhone($phoneNum)
{
    $result = false;


    if (!preg_match("/^[0-9]{11,15}$/", $phoneNum)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}



// checks if passwords doesn`t match
function passwordMatch($password, $passwordRepeat)
{
    $result = false;


    if ($password !== $passwordRepeat) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// checks if user exists in a safe way
function userExists($conn, $username, $email)
{
    $sql = "SELECT * FROM user WHERE username = ? OR email = ?;";
    $statement = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: signup.php?error=statementfailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "ss", $username, $email);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);
    if ($row = mysqli_fetch_assoc($resultData)) { //returns user details, to be used later on
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($statement);
}


// creates a user if user doesn`t exist, in a safe way
function createUser(
    $conn,
    $username,
    $fname,
    $lname,
    $email,
    $phoneNum,
    $password
) {
    // query to insert user data into database
    $sql = "INSERT INTO user (username, email, fname, surname, phone_num, pwd) VALUES (?, ?, ?, ?, ?, ?);";
    $statement = mysqli_stmt_init($conn);

    // shows error if data cannot be inserted
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: signup.php?error=cantcreate");
        exit();
    }

    // password hash
    $pwHash = password_hash($password, PASSWORD_BCRYPT);

    // passes in the data
    mysqli_stmt_bind_param($statement, "ssssss", $username, $email, $fname, $lname, $phoneNum, $pwHash);
    mysqli_stmt_execute($statement);

    mysqli_stmt_close($statement);

    // after successful creation of user, takes to next page
    header("location: login.php?alert=userRegistered");
    $_SESSION['username'] = $username;

    exit();
}

// checks if the fields are not empty when logging in
function emptyInputLogin($email, $password)
{
    $result = false;

    // if one of the fields are empty, show error message
    if (empty($email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// function to log user into the website
function loginUser($conn, $username, $email, $password)
{
    $user = userExists($conn, $username, $email);

    // checks if the email exists
    if ($user == false) {
        header("location: login.php?error=wrongusername");
        exit();
    }

    // gets the hashed password from database
    $passwordHashed = $user['pwd'];

    // compares the password from database to the password entered
    $checkPassword = password_verify($password, $passwordHashed);

    // if password is incorrect, shows an error message
    if ($checkPassword == false) {
        header("location: login.php?error=wrongpassword");
        exit();
    }
    // if password correct, creates a user session
    else if ($checkPassword == true) {
        userSession($user);
    }
}

// function to create a user session when user logs in
function userSession($user)
{
    // creates user session
    ini_set('session.use_strict_mode', 1);
    session_start();

    // allows to use the session data when needed
    $_SESSION['username'] = $user['username'];


    header('Location: search.php');
    exit();
}

// checks for empty input on upload 
function emptyInputUpload($name, $description, $price, $type)
{
    $result = false;

    if (
        empty($name) || empty($description) || empty($price) || empty($type)
    ) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// Function to validate content name add-content.php
function invalidContentName($contentName)
{
    $result = false;


    if (!preg_match("/^.{5,50}$/", $contentName)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// Function to validate content type in add-content.php
function invalidContentType($contentType)
{
    $result = false;


    if (!preg_match("/^.{5,30}$/", $contentType)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// Function to validate content description in add-content.php
function invalidContentDescription($contentDescription){
    $result = false;


    if (!preg_match("/^.{5,100}$/", $contentDescription)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// Function to validate content price in add-content.php
function invalidContentPrice($contentPrice){
    $result = false;


    if (!preg_match("/^[0-9]{1,3}\.[0-9]{2}$/", $contentPrice)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

// Function to add content to database
function addContent($conn, $name, $description, $price, $type, $username)
{
    // query to insert user data into database
    $sql = "INSERT INTO content (name, description, price, type, user_username) VALUES (?, ?, ?, ?, ?);";
    $statement = mysqli_stmt_init($conn);

    // shows error if data cannot be inserted
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: add-content.php?error=cantcreate");
        exit();
    }

    // passes in the data
    mysqli_stmt_bind_param($statement, "sssss", $name, $description, $price, $type, $username);

    // Show error message if the query cannot be executed
    mysqli_stmt_execute($statement);

    // Close the statement
    mysqli_stmt_close($statement);

    // Take user back to add-content.php page when upload completed
    header("location: add-content.php?alert=added");
    exit();
}

// function to edit the content in the database
function editContent($conn, $name, $description, $price, $type, $contentId)
{
    // query to insert user data into database
    $sql = "UPDATE content SET name=?, description=?, price=?, type=? WHERE id=?;";
    $statement = mysqli_stmt_init($conn);

    // shows error if data cannot be inserted
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: editContent.php?error=cantcreate");
        exit();
    }

    // passes in the data
    mysqli_stmt_bind_param($statement, "ssssi", $name, $description, $price, $type, $contentId);

    // Show error message if the query cannot be executed
    if (!mysqli_stmt_execute($statement)) {
        header("location: editContent.php?error=notUploaded");
        exit();
    }

    // Close the statement
    mysqli_stmt_close($statement);

    // Take user back to add-content.php page when upload completed
    header("location: editContent.php?alert=contentUploaded");
    exit();
}

// function to delete the content in the database
function deleteContent($conn, $contentId)
{
    // query to insert user data into database
    $sql = "DELETE FROM content WHERE id = '$contentId';";
    $statement = mysqli_stmt_init($conn);

    // shows error if data cannot be inserted
    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: editing.php?error=cantcreate");
        exit();
    }

    // Show error message if the query cannot be executed
    if (!mysqli_stmt_execute($statement)) {
        header("location: editing.php?error=notDeleted");
        exit();
    }

    // Close the statement
    mysqli_stmt_close($statement);

    // Take user back to add-content.php page when upload completed
    header("location: editContent.php?alert=contentDeleted");
    exit();
}

//EOF