<?php
session_start();
include("db.php");

// Check if the user is logged in and is an employer
if (!isset($_SESSION['user_id'])) {
    header("Location: employer_login2.php"); // Redirect to login page if not logged in
    exit();
}

$user_id = $_SESSION['user_id'];

// Check if the job_id is provided in the URL
if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    // Verify if the employer is authorized to view applicants for this job
    $query = "SELECT * FROM jobs WHERE id='$job_id' AND user_id='$user_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Employer is authorized to view applicants for this job

        // Fetch all applicants for this job
        $applications_query = "SELECT a.*, u.username, u.email 
                               FROM applications a
                               JOIN users u ON a.user_id = u.id
                               WHERE a.job_id = '$job_id'";

        $applications_result = mysqli_query($conn, $applications_query);
    } else {
        echo "You are not authorized to view applicants for this job.";
        exit();
    }
} else {
    echo "Job ID is missing.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applicants</title>
</head>
<body>

<h1>Applicants for Job ID: <?php echo htmlspecialchars($job_id); ?></h1>

<p><a href="employer_dashboard2.php">Back to Dashboard</a></p>

<?php
// Display applicants
if (mysqli_num_rows($applications_result) > 0) {
    echo "<table border='1'>
            <tr>
                <th>Applicant Name</th>
                <th>Email</th>
                <th>Cover Letter</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>";

    // Loop through the applicants and display their information
    while ($applicant = mysqli_fetch_assoc($applications_result)) {
        echo "<tr>
                <td>" . htmlspecialchars($applicant['username']) . "</td>
                <td>" . htmlspecialchars($applicant['email']) . "</td>
                <td>" . nl2br(htmlspecialchars($applicant['cover_letter'])) . "</td>
                <td>" . ucfirst($applicant['status']) . "</td>
                <td>
                    <a href='update_application_status.php?applicant_id=" . $applicant['id'] . "&status=hired'>Hire</a> |
                    <a href='update_application_status.php?applicant_id=" . $applicant['id'] . "&status=rejected'>Reject</a>
                </td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No applicants have applied for this job yet.</p>";
}
?>

</body>
</html>