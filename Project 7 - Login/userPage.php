<html>
<head>
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
    <h1>YOU MADE IT!!!</h1>
    <?php 
    session_start();
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
    ?>
    
    <h2>Welcome to the page!</h2>
    <p>There is a of information here</p>
    <?php 
    echo "<p>Hello " . $_SESSION["username"] . "! Your password is " . $_SESSION["password"] . ". Would you like to change it?</p>";
    
    ?>

    <!-- this is a form to store and upload photos for each user.
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="img">Select Image File:</label>
        <input type="file" name="image" id="img">
        <input type="submit" name="submit" value="Upload Image">
    </form> 
    -->

</div>
</body>
</html>