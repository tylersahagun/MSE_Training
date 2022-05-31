<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Contact Form </title>
    <style type="text/css">
		body{
background-color: #f1f1f1;
	}
		.form-control {
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    color: #555;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.btn-primary {
    padding: 6px 12px;
    font-size: 14px;
    font-weight: 400;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 4px; 
    background-color: #337ab7;
    color: #fff;
}
textarea.form-control {
    height: auto;
}
.container 
{ 
margin-left: 32%;
width: 400px ;
margin-top: 10%;

 }
label   {
	font-size: 18px;
}
.success 
{ 
	margin: 5px auto;
  border-radius: 5px;
  border: 3px solid #fff;
  background: #33CC00;
  color: #fff;

  padding: 10px;
  box-shadow: 10px 5px 5px grey;
}
	</style>
</head>

<body> 
	<div class="container">
		<?php 
		if(isset($_POST['submit_form']))
			{ 
        $name=$_POST['name']; 
        $email=$_POST['email']; 
        $msg=$_POST['msg']; 
        $hide=2;
        //your insert query or mail function 
        echo '<div class="success">Thank you <strong>'.$name.',</strong> Your message has been sent ... </div> '; 
			}
		?>
		<?php if(!isset($hide)) { ?>
			<h2>Contact Form  &#9971;</h2>
	<form action="" method="POST">
		<label> Name </label>
		<input type="text" name="name" class="form-control" required>
		<label>Email </label>
		<input type="email" name="email" class="form-control" required>
		<label> Message </label>
		<textarea name="msg" cols="10" rows="5"  class="form-control" required></textarea> 
		<input type="submit" name="submit_form" value="Send" class="btn-primary">
</form>
<?php }?> 
</div>
</body>
</html>