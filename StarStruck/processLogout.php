<?php

/**
 * Destroys the user session when log out button is clicked
 */

// starts a new session
session_start();

// unsets the session
session_unset();

// destroys the session
session_destroy();

// send user back to home page
header("location: index.php");
exit();

// EOF