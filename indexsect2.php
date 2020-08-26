<?php
	
	session_start();
	
	
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

?>

<html>
		<head>

			<title> Atelier 3 Section2</title>

		</head>

<body>

	<form action="register2.php" method="post">
		
		<table bordercolor="red" border="3" bgcolor="white" align="left" width="750" cellpadding="8" cellspacing="0" >

			<tr> <!--Section 1-->

				<td rowspan="3"> <!--element sec1-->

					<table bordercolor="orange" border="2" bgcolor="grey" width="100%" cellpadding="6" cellspacing="0" >
						<tr>

							<td>
						
								<section>
										<h1 align="center" style="color: red;font-family: comic sans ms;">Informations Personelles</h1>
								<table bordercolor="black" border="1" bgcolor="#f1e3cb" width="100%" cellpadding="0" cellspacing="0">
									<tr>
										<td>
											<table>
												<tr>
													<td align="right">
													<strong style="color: black">Adresse email: </strong><br>
													<strong style="color: black">Numero de t&#233;l&#233;phone:</strong> <br>
													<strong style="color: black">Adresse:</strong> <br>
													<strong style="color: black">Commune:</strong> <br>
													<strong style="color: black">Wilaya:</strong> <br>
													</td>
													<td>
														<input type="Text" name="email"></a><br>
														<input type="Text" name="Num"><br>
														<textarea rows="1" name="adr"></textarea><br>
														<select name="Commune">
															<option value="vide"> </option>
															<?php

															$sql = "SELECT * FROM commune";
															$list = $conn->query($sql); 
															while ($data = $list->fetch_assoc()){
																echo "<option value= ".$data['id_commune']." >". $data['nom_commune']."</option>";
															}
															?>
														</select><br>
														<select name="Wilaya">
															<option value="vide"></option>
															<?php 

															$sql = "SELECT * FROM wilaya";
															$list = $conn->query($sql);
															while ($data = $list->fetch_assoc()){
																echo "<option value= ".$data['id_wilaya']." >" . $data['nom_wilaya']. "</option>";
															}

														?>
													</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
								</section>
							</td>	
						</tr>
					</table>
					<br>
							<input type="submit" name="Valider" style="width: 100px; height: 30px"><br><br>
							<a href="indexsect1.html"><<< Revenir en arriere </a> 
				</td>
			</tr>
		</table>
	</form>

</body>
</html>