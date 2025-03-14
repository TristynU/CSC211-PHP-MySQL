<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: jobseeker_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    $job_query = "SELECT * FROM jobs WHERE id='$job_id'";
    $job_result = mysqli_query($conn, $job_query);

    if (mysqli_num_rows($job_result) == 0) {
        echo "Job not found.";
        exit();
    }
} else {
    echo "Job ID is missing.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cover_letter = mysqli_real_escape_string($conn, $_POST['cover_letter']);

    $insert_query = "INSERT INTO applications (job_id, user_id, cover_letter) 
                     VALUES ('$job_id', '$user_id', '$cover_letter')";

    if (mysqli_query($conn, $insert_query)) {
        $job = mysqli_fetch_assoc($job_result);
        $employer_id = $job['user_id']; 
        $employer_query = "SELECT email FROM users WHERE id='$employer_id'";
        $employer_result = mysqli_query($conn, $employer_query);
        $employer = mysqli_fetch_assoc($employer_result);

        if ($employer) {
            $employer_email = $employer['email'];
            $subject = "New Job Application for " . $job['title'];
            $message = "Hello,\n\nYou have received a new application for the job: " . $job['title'] . ".\n\n";
            $message .= "Job Seeker: " . $_SESSION['username'] . "\n";
            $message .= "Cover Letter:\n" . $cover_letter . "\n\n";
            $message .= "Regards,\nYour Job Portal";

            mail($employer_email, $subject, $message);

            header("Location: jobseeker_dashboard.php?message=Application Submitted Successfully");
            exit();
        } else {
            echo "Error fetching employer email.";
        }
    } else {
        echo "Error submitting application: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Job</title>
</head>
<body>

<h1>Apply for Job</h1>

<?php
$job = mysqli_fetch_assoc($job_result);
?>

<h3>Job Title: <?php echo htmlspecialchars($job['title']); ?></h3>
<p><strong>Description:</strong> <?php echo htmlspecialchars($job['description']); ?></p>

<form action="apply.php?job_id=<?php echo $job_id; ?>" method="POST">
    <label for="cover_letter">Resume:</label><br>
    <textarea name="cover_letter" id="cover_letter" rows="5" cols="40" required></textarea><br><br>
    <button type="submit">Submit Application</button>
</form>

<p><a href="jobseeker_dashboard.php">Back to Dashboard</a></p>

</body>
</html>