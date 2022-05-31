<?php
session_start();

$username = $_SESSION['username'];

$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'loginSystem';
$db_port = 8889;

$conn = new mysqli($db_host, $db_user, $db_password, $db_db, $db_port);

if ($conn->connect_error) {
    echo 'Error: ' . $conn->connect_errno;
    echo '<br>';
    echo 'Error: ' . $conn->connect_error;
    exit();
}

$result = mysqli_query($conn, $sql);

$sql_UserID = "SELECT id from tbl_users WHERE username = '$username'";

$result1 = mysqli_query($conn, $sql_UserID);

if (mysqli_num_rows($result1) > 0 ) {
    $row = mysqli_fetch_assoc($result1);
    $userID = (int)$row['id'];
}

$sql1 = "SELECT * FROM events WHERE userID = '$userID'";

$result2 = mysqli_query($conn, $sql1);
$eventArray = array();

while ($row = mysqli_fetch_array($result2)) {
    $eventArray[] = array (
        'title' => $row['title'],
        'event_description' => $row['event_description'],
        'scheduledTime' => $row['scheduledTime']
    );
} 

echo json_encode($eventArray);

$conn -> close();


?>