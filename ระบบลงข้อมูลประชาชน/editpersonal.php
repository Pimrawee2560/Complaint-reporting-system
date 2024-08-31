<?php
include 'Problem_db_conn.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
    exit;
}

$sql = "SELECT username, email, phone FROM user_form WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['user_name']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
    } else {
        error_log("Error executing the query: " . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);
} else {
    error_log("Error preparing the statement: " . mysqli_error($conn));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form submission
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];
    $newPhone = $_POST['phone'];

    $updateSql = "UPDATE user_form SET username = ?, email = ?, phone = ? WHERE username = ?";
    $updateStmt = mysqli_prepare($conn, $updateSql);

    if ($updateStmt) {
        mysqli_stmt_bind_param($updateStmt, "ssss", $newUsername, $newEmail, $newPhone, $_SESSION['user_name']);
        mysqli_stmt_execute($updateStmt);

        if (mysqli_stmt_affected_rows($updateStmt) > 0) {
            // Update successful
            header('location: success_page.php'); // Redirect to a success page
            exit;
        } else {
            // No rows were affected, handle this as an error
            error_log("Error updating user information: " . mysqli_error($conn));
        }

        mysqli_stmt_close($updateStmt);
    } else {
        error_log("Error preparing the update statement: " . mysqli_error($conn));
    }
}
?>

<!-- ... your existing HTML code ... -->