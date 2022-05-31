<html>
<head>
<link rel="stylesheet" href="login.css">
</head>
<body>
<?php include 'connection.php'; ?>    

<div class="container">
  <div class="formcontain">
    <h2 class="head">LOGIN</h2>
    <form action="index.php" method="POST">
    <label for="username">User Name:  </label>
    <input type="text" name="username" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="pasword"><br><br>
    <input type="submit" value="submit" name="submit" id="submit">

    <p><a href="signup.php">New User? Sign up here!</a></p>

  </div>
   
    <?php 
    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["password"] = $password;

    if(isset($_POST['submit']))
    {
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

    if ($mysqli->connect_error) {
        echo 'Errno: '.$mysqli->connect_errno;
        echo '<br>';
        echo 'Error: '.$mysqli->connect_error;
        exit();
    }

    $sql = "SELECT * FROM tbl_users WHERE username='$username' AND userpassword='$password'";
    $result = mysqli_query($mysqli, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
      $_SESSION['username'] = $username;
      $mysqli->close();
        header("Location: userPage.html");
        echo "<p>You did it</p>";
    
      } else {
        echo "Your username or password is incorrect!<br>If you are new here, create an account!";
      }
    }
    ?>

</div>

</body>
</html>