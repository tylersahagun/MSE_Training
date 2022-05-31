<!-- 
	-Create a database and a table in that database using mysql
	-In your PHP file connect to your database
	-After the submit button is pressed insert the first name, last name, email and phone in the database
	-After entering it into the database, access the database and using mysql pull it from the database and
	 display it on the screen in the same way you did earlier (first_name: Tom etc)
-->

<html>
<body>
<div class="container">
  <?php
  $displayForm = TRUE;
  if(isset($_POST['submit']))
    {
	  $displayForm = FALSE;
      $fname = $_POST['f_name'];
      $lname = $_POST['l_name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $city = $_POST['city'];
      $zip = $_POST['zip_code'];
      $state = $_POST['state'];
      
	  $citizen;
	  if(!isset($_POST['citizen'])) {
		  $citizen = "non-citizen";
	  } else {
		  $citizen = $_POST['citizen'];
	  }

      $gender = $_POST['gender'];
      $seniority = $_POST['seniority'];

	//sql table creation
	$db_host = '127.0.0.1';
	$db_user = 'root';
	$db_password = 'root';
	$db_db = 'myDB';
	$db_port = 8889;

	$mysqli = new mysqli(
		$db_host,
		$db_user,
		$db_password,
		$db_db,
		$db_port
	);
		
	if ($mysqli->connect_error) {
		echo 'Errno: '. $mysqli->connect_errno;
		echo '<br>';
		echo 'Error: '. $mysqli->connect_error;
		exit();
	}


		$sqlInsert = "INSERT INTO MyUsers (firstName, lastName, email, phone)
			VALUES('$fname', '$lname', '$email', '$phone')";
		

		if ($mysqli->query($sqlInsert) === TRUE) {
			//echo "<p>Data added successfully</p>";
		} else {
			echo "error: " . $mysqli->error;
		}

		$sql = "SELECT * FROM MyUsers ORDER BY id DESC LIMIT 1";
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<p>id: " . $row["id"] . "</p>";
			echo "<p>Name: " . $row["firstName"]. " " . $row["lastName"] . "</p>";
			echo "<p>Email: " . $row["email"] . "</p>";
			echo "<p>Phone: " . $row["phone"] . "</p>";
		}
		} else {
		echo "0 results";
		}
$db_host = '127.0.0.1';
	$db_user = 'root';
	$db_password = 'root';
	$db_db = 'myDB';
	$db_port = 8889;

	$mysqli = new mysqli(
		$db_host,
		$db_user,
		$db_password,
		$db_db,
		$db_port
	);
		
	if ($mysqli->connect_error) {
		echo 'Errno: '. $mysqli->connect_errno;
		echo '<br>';
		echo 'Error: '. $mysqli->connect_error;
		exit();
	}


	$mysqli->close();
	}
    ?>

	<?php if($displayForm) { ?>
	<h2>PHP Tutorial Form</h2>
	<form action="index.php" method="POST">
	First Name:
	<input type="text" name="f_name">
	<br>
	Last Name:
	<input type="text" name="l_name">
	<br>
	Email:
	<input type="email" name="email">
	<br>
	Phone Number:
	<input type="number" name="phone">
	<br>
	Address:
	<input type="text" name="address">
	<br>
	City:
	<input type="text" name="city">
	<br>
	Zip Code:
	<input type="number" name="zip_code">
	<br>
	State:
	<select name="state">
		<option value="AL">Alabama</option>
		<option value="AK">Alaska</option>
		<option value="AZ">Arizona</option>
		<option value="AR">Arkansas</option>
		<option value="CA">California</option>
		<option value="CO">Colorado</option>
		<option value="CT">Connecticut</option>
		<option value="DE">Delaware</option>
		<option value="DC">District Of Columbia</option>
		<option value="FL">Florida</option>
		<option value="GA">Georgia</option>
		<option value="HI">Hawaii</option>
		<option value="ID">Idaho</option>
		<option value="IL">Illinois</option>
		<option value="IN">Indiana</option>
		<option value="IA">Iowa</option>
		<option value="KS">Kansas</option>
		<option value="KY">Kentucky</option>
		<option value="LA">Louisiana</option>
		<option value="ME">Maine</option>
		<option value="MD">Maryland</option>
		<option value="MA">Massachusetts</option>
		<option value="MI">Michigan</option>
		<option value="MN">Minnesota</option>
		<option value="MS">Mississippi</option>
		<option value="MO">Missouri</option>
		<option value="MT">Montana</option>
		<option value="NE">Nebraska</option>
		<option value="NV">Nevada</option>
		<option value="NH">New Hampshire</option>
		<option value="NJ">New Jersey</option>
		<option value="NM">New Mexico</option>
		<option value="NY">New York</option>
		<option value="NC">North Carolina</option>
		<option value="ND">North Dakota</option>
		<option value="OH">Ohio</option>
		<option value="OK">Oklahoma</option>
		<option value="OR">Oregon</option>
		<option value="PA">Pennsylvania</option>
		<option value="RI">Rhode Island</option>
		<option value="SC">South Carolina</option>
		<option value="SD">South Dakota</option>
		<option value="TN">Tennessee</option>
		<option value="TX">Texas</option>
		<option value="UT">Utah</option>
		<option value="VT">Vermont</option>
		<option value="VA">Virginia</option>
		<option value="WA">Washington</option>
		<option value="WV">West Virginia</option>
		<option value="WI">Wisconsin</option>
		<option value="WY">Wyoming</option>
	</select>
	<br>
	<input type="checkbox" id="testName" name="citizen" id="citizenhsip" value="citizen">
	<label for="citizenship">United States Citizen?</label>
	<br>
	Gender:
	<br>
	<input type="radio" id="male" name="gender" value="Male" value="citizen">
	<label for="male">Male</label>
	<br>
	<input type="radio" id="female" name="gender" value="Female">
	<label for="female">Female</label>
	<br>
	Year in School:
	<br>
	<input type="radio" id="freshman" name="seniority" value="Freshman">
	<label for="freshman">Freshman</label>
	<br>
	<input type="radio" id="sophmore" name="seniority" value="Sophmore">
	<label for="sophmore">Sophmore</label>
	<br><input type="radio" id="junior" name="seniority" value="Junior">
	<label for="junior">Junior</label>
	<br>
	<input type="radio" id="senior" name="seniority" value="Senior">
	<label for="senior">Senior</label>
	<br>
	Interests:
	<br> 
	<input type="checkbox" id="interest1" name="interest1" value="Medicine">
	<label for="interest1"> Medicine</label><br>
	<input type="checkbox" id="interest2" name="interest2" value="Finance">
	<label for="interest2"> Finance</label><br>
	<input type="checkbox" id="interest3" name="interest3" value="Sports">
	<label for="interest3"> Sports</label><br>
	<br>
	<input type="submit" value="submit" name="submit">
	</form>

<?php } ?>	
</div>



</body>
</html>



<?php
  
?>