<?php
session_start();

$dataObj = json_decode($_POST['data']);

$title = $dataObj->eventTitle;
$description = $dataObj->eventDescription;
$time = $dataObj->eventTime;
$username = $_SESSION['username'];

$db_host = '127.0.0.1';
    $db_user = 'root';
    $db_password = 'root';
    $db_db = 'loginSystem';
    $db_port = 8889;

    $conn = new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db,
    $db_port
    );



$sql_UserID = "SELECT id FROM tbl_users WHERE username = '$username'";

$result = mysqli_query($conn, $sql_UserID);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $user_id = (int)$row['id'];
}

$sql = "INSERT INTO events(userID, title, event_description, scheduledTime) VALUE ($user_id, '$title', '$description', '$time')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "<script>window.open('userPage.html')</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>