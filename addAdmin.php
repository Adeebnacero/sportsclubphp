<?php   
   include('index.html');
   $designation = array("Chairman", "Executive", "Finance",  "Secretary","Trustee");   
?>
<html>   
   <head>      
      <?php echo "<link rel='stylesheet' type='text/css' href='css/styles.css' />";?> 	  	
   </head>	
   <body>
	<div align="center">   
		<table align="center" class="hoverTable">	 
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Designation</th>
				<th>DOB</th>
				<th>Status</th>
			</tr>			  
		 <?php
			if (isset($_POST['add']) && !empty($_POST['firstName']) && !empty($_POST['lastName']))
			{		
			
				$firstName = $_POST['firstName'];
				$lastName = $_POST['lastName'];
				$designation = $_POST['designation'];
				$DOB = $_POST['DOB'];	
				
				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_PORT => "8080",
				  CURLOPT_URL => "http://localhost:8080/Controller/addNewAdministrator?firstName=$firstName&lastName=$lastName&designation=$designation&DOB=$DOB&status=active",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_HTTPHEADER => array(
					"authorization: Basic dXNlcjpwYXNzd29yZA==",
					"cache-control: no-cache",
					"postman-token: 8094e0c4-9c59-d2f5-be07-651fc774bf91"
				  ),
				));
				//,"postman-token: 6b0d34a9-8fb9-13c4-28fe-e81d41bef709"

				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
				
				//$response = file_get_contents($url);					

				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
				  
					$characters = json_decode($response);
							echo '<tr>';
							echo '<td>' . $characters->firstName . '</td>';
							echo '<td>' . $characters->lastName . '</td>';
							echo '<td>' . $characters->designation . '</td>';
							echo '<td>' . $characters->DOB . '</td>';
							echo '<td>' . $characters->status . '</td>';
							echo '</tr>';
						
					}		
								  
			}			   
		 ?>		 
		</table>
	</div>       
	<div class= "container-fluid" align = "center" >      
	<form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
		<h3 style="margin-top:10px;">Add New Administrator</h3>
		<br clear="both">
		<h4 class = "form-signin-heading">							
			<input type = "text"  id="firstName " class = "form-control" name = "firstName" placeholder = "First Name"  required autofocus style="width:250px;"></br>				
			<input type = "text" id="lastName "class = "form-control" name = "lastName" placeholder = "Last Name"  required autofocus style="width:250px;"></br>
				<div class="form-group" align="left|center" >
						<select  class="selectpicker" id="selectpicker1" name="designation" required autofocus>
							<option value="" disabled selected>Designation</option>
								<?php
									foreach ($designation as $des) {
									echo '<option value="'.$des.'">'.$des.'</option>';
								}
								?>	  
						</select>
				</div>				
			<input type = "text" id="DOB "class = "form-control" name = "DOB" placeholder = "DOB"  required autofocus style="width:250px;"></br>
			<button class= "btnSubmit" type = "submit" name = "add" id="show">Add Admin</button></br>
			<!--<img src="running.png" alt="Smiley face" align="left" style="img-width:50px;img-height:50px;">-->
	</form> 		 
	</div>   
	<script src="js/jquery.js"></script>	  
</body>
</html>






























