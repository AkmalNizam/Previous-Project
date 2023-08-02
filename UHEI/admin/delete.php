<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

require_once('db_connection.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "DELETE FROM timetable WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        header('Location: table.php');
        exit;
    } else {
        echo "Error deleting row: " . mysqli_error($conn);
    }
} else {
    echo "Invalid row ID provided.";
}

mysqli_close($conn);
?>
