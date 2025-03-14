<?php
session_start();
include("db.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: employer_login2.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $job_id = $_GET['id'];

    $query = "SELECT * FROM jobs WHERE id='$job_id' AND user_id='$user_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $delete_query = "DELETE FROM jobs WHERE id='$job_id'";
        if (mysqli_query($conn, $delete_query)) {
            header("Location: employer_dashboard2.php");
            exit();
        } else {
            echo "Error deleting job: " . mysqli_error($conn);
        }
    } else {
        echo "Job not found or you don't have permission to delete it.";
    }
} else {
    echo "Job ID is missing.";
}
?>