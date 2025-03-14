<?php
session_start();
include("db.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: employer_login2.php");
    exit();
}

$user_id = $_SESSION['user_id'];


$status_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $application_id = $_POST['application_id'];
    $new_status = mysqli_real_escape_string($conn, $_POST['status']);
    $valid_statuses = ['hired', 'rejected'];

    if (in_array($new_status, $valid_statuses)) {
        $update_query = "UPDATE applications SET status='$new_status' WHERE id='$application_id'";

        if (mysqli_query($conn, $update_query)) {
            $status_message = "Application status updated to: " . ucfirst($new_status);
        } else {
            $status_message = "Error updating status: " . mysqli_error($conn);
        }
    } else {
        $status_message = "Invalid status selected.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Application Status</title>
</head>
<body>

<h1>Update Application Status</h1>
<?php if (!empty($status_message)) { ?>
    <p style="color: green;"><?php echo $status_message; ?></p>
<?php } ?>

<form action="update_application_status.php" method="POST">
    <input type="hidden" name="application_id" value="<?php echo $application_id; ?>" required>

    <label for="status">Select Status:</label><br>
    <select name="status" id="status" required>
        <option value="hired" <?php if (isset($application) && $application['status'] == 'hired') echo 'selected'; ?>>Hired</option>
        <option value="rejected" <?php if (isset($application) && $application['status'] == 'rejected') echo 'selected'; ?>>Rejected</option>
    </select><br><br>

    <button type="submit">Update Status</button>
</form>

<p><a href="employer_dashboard2.php">Back to Dashboard</a></p>

</body>
</html>