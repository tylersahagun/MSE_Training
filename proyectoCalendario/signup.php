<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'connection.php'; ?>    
<div class="container">
<h2>Sign Up!</h2>
    <form action="signup.php" method="GET">
    <label for="firstname">First Name:</label>
    <input type="text" name="firstname" id="firstname" required><br>
    <label for="lastname">Last Name:</label>
    <input type="text" name="lastname" id="lastname" required><br>
    <label for="dob">Birthday:</label>
    <input type="date" name="dob" id="dob" required><br>
    <label for="username">User Name:</label>
    <input type="text" name="username" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="pasword" required><br>
    <input type="submit" value="submit" name="submit">
    </form>

    <?php 
    session_start();
        if(isset($_GET['submit']))
            {
                $fname = $_GET['firstname'];
                $lname = $_GET['lastname'];
                $dob = $_GET['dob'];
                $username = $_GET['username'];
                $password = $_GET['password'];
        
                $db_host = '127.0.0.1';
                $db_user = 'root';
                $db_password = 'root';
                $db_db = 'loginSystem';
                $db_port = 8889;

                $mysqli = new mysqli(
                $db_host,
                $db_user,
                $db_password,
                $db_db,
                $db_port
                );

                $sql = "INSERT INTO tbl_users (username, userpassword, firstname, lastname, dob)
                    VALUES ('$username', '$password', '$fname', '$lname', '$dob')";

                if ($mysqli->query($sql) === TRUE) {
                echo "<p>You successfully created an account!</p>";
                } else {
                    echo "error: " . $sql . "<br>" . $mysqli->error;
                }    

                echo "<p><a href='index.php'>Login!</a></p>";
            }    
    ?>



</div>

</body>
</html>