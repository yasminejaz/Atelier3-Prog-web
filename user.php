<html>

	<head>

		<title>User</title>
	
	</head>


	<body>
		
		<table width="400px" align="center" bgcolor="#f4ea8e" height="200px" border="black">
			<tr>
		<form action="Userfiche.php" method="POST" align="center">
		
		
		<td>
			<br><h2 align="center">Choisissez un id pour affiché ses renseignements: </h2><br>
			<p align="center">
			<select name="user">
				<option value="vide"></option>
																		
					<?php 

						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "Atelier3";

						// Create connection
						$conn = new mysqli($servername, $username, $password, $dbname);
		

						// Check connection
						if ($conn->connect_error) {
						  die("Connection To Server failed: " . $conn->connect_error);
						}


						$sql="SELECT * FROM utilisateur";
							$list = $conn->query($sql);

							while ($data = $list->fetch_assoc()){

								echo "<option value= ".$data['id']." >" . $data['id']. "</option>";	}

					?>
			</select>
			<input type="submit" name="Entrer">
		</p>
			
			</td>
			
		</form>
	</tr>
		</table>

	</body>

</html>