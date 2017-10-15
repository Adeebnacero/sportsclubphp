<!DOCTYPE html>
<?php   
   include('index.html');   
?>
<html>
<head>	
<body>
	<div class="container" >
	<?PHP
		$nameErr = $emailErr = $genderErr = $websiteErr = "";
		$name = $email = $gender = $comment = $website = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		  } else {
			$name = test_input($_POST["name"]);
			// check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
			  $nameErr = "Only letters and white space allowed";
			}
		  }
		  
		  if (empty($_POST["email"])) {
			$emailErr = "Email is required";
		  } else {
			$email = test_input($_POST["email"]);
			// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			  $emailErr = "Invalid email format";
			}
		  }
		  
		  if (empty($_POST["comment"])) {
			$comment = "";
		  } else {
			$comment = test_input($_POST["comment"]);
		  }

		  if (empty($_POST["gender"])) {
			$genderErr = "Gender is required";
		  } else {
			$gender = test_input($_POST["gender"]);
		  }
		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		?>

		<h2>Club Contact Form</h2>
		<h4>Contact Number: 021 555 3419</h4>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
		  Name and Surname <input type="text" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>" required autofocus>
		  <span class="error"> <?php echo $nameErr;?></span>		  
		  <br><br>
		  E-mail: <input type="text" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>" required autofocus>
		  <span class="error"> <?php echo $emailErr;?></span>
		  <br><br>
		  Subject: <input type="text" name="website" value="<?= isset($_POST['website']) ? $_POST['website'] : ''; ?>" required autofocus>		  
		  <br><br>
		  Message: <textarea name="comment" rows="5" cols="40" value="<?= isset($_POST['comment']) ? $_POST['comment'] : ''; ?>" required autofocus></textarea>
		  <br><br>		  
		  <br><br>
		  <input type="submit" name="submit" value="Submit">
		</form>
		
	
	</div>
</body>
</html>
		

		