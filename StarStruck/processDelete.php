<?php

require_once 'database.php';
require_once 'functions.php';

if (isset($_POST['delete'])) {
    $contentId = trim($_GET['id']);

    deleteContent($conn, $contentId);
} else {
    header("location: editContent.php");
    exit();
}
