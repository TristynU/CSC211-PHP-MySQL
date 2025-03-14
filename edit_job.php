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
        $job = mysqli_fetch_assoc($result);
    } else {
        echo "Job not found or you don't have permission to edit it.";
        exit();
    }
} else {
    echo "Job ID is missing.";
    exit();
}

if (isset($_POST['submit'])) {
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $update_query = "UPDATE jobs SET description='$description', location='$location', salary='$salary', category='$category' WHERE id='$job_id' AND user_id='$user_id'";
    
    if (mysqli_query($conn, $update_query)) {
        header("Location: employer_dashboard2.php");
        exit();
    } else {
        echo "Error updating job: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job</title>
</head>
<body>

<h1>Edit Job Posting</h1>

<form action="edit_job.php?id=<?php echo $job_id; ?>" method="POST">
    
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" required><?php echo htmlspecialchars($job['description']); ?></textarea><br><br>
    
    <label for="location">Location:</label><br>
    <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($job['location']); ?>" required><br><br>
    
    <label for="salary">Salary:</label><br>
    <input type="text" id="salary" name="salary" value="<?php echo htmlspecialchars($job['salary']); ?>" required><br><br>
    
    <label for="category">Category:</label><br>
    <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($job['category']); ?>" required><br><br>
    
    <button type="submit" name="submit">Update Job</button>
</form>

<p><a href="employer_dashboard2.php">Back to Dashboard</a></p>

</body>
</html>