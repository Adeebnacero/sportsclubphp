<?php   
   include('index.html');
   $feet = array("Left", "Right");
   $position = array("Striker", "Midfield", "Defender");   
?>
<html>   
   <head>      
      <?php echo "<link rel='stylesheet' type='text/css' href='css/styles.css'/>";?> 	  
   </head>	
<body> 
	<div align="center">  
		<table class="hoverTable">	  
         <?php
            
			//Validation for login screen
			if (isset($_POST['remove']) )
			{	
				if (ctype_digit($_POST['ID'])){
						$id = $_POST['ID'];			
						$curl = curl_init();

						curl_setopt_array($curl, array(
						  CURLOPT_PORT => "8080",
						  CURLOPT_URL => "http://localhost:8080/Controller/deleteAdministrator?clubID=$id",
						  CURLOPT_RETURNTRANSFER => true,
						  CURLOPT_ENCODING => "",
						  CURLOPT_MAXREDIRS => 10,
						  CURLOPT_TIMEOUT => 30,
						  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						  CURLOPT_CUSTOMREQUEST => "GET",
						  CURLOPT_HTTPHEADER => array(
														"authorization: Basic dXNlcjpwYXNzd29yZA==",
														"cache-control: no-cache"
													  ),
						));

						$response = curl_exec($curl);
						$err = curl_error($curl);
						curl_close($curl);

						if ($err) {
						  echo "cURL Error #:" . $err;
						} else {
						  echo $response;			  
						}
				}else{
					
					echo "Please enter valid Member ID!";
				}	
			}
         ?>
		 </table>
	</div>       
      <div class= "container-fluid" align="center" >      
         <form class = "form-signin" role = "form" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method = "post">
			<h3 style="margin-top:10px;">Admin to remove</h3>
			<br clear="both">
				<input type = "ID" class = "form-control" name = "ID" placeholder = "Member ID"  required autofocus style="width:250px;"></br>	
				<button class = "btnSubmit" type = "submit" name = "remove">Delete Admin</button>
         </form> 		 
      </div>   
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>	  
</body>
</html>






























