<?php

session_start();

$rep_des="/user/";
$taille_max= 20480000;
$Nom_fichier= $_FILES["image"]["name"];
$taille_fich= $_FILES["image"]["size"];

if($_FILES["image"]["type"]="image/jpeg"){

if($taille_fich>$taille_max){
	echo "Erreur, Votre fichier depasse la taille autorisé ";
}else{

	
	//modifier le nom du fichier
	if(move_uploaded_file($_FILES["image"]["tmp_name"],"user/".$_SESSION["id"])){
		echo "Chargement reussi!";

?>		
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

<?php


	}else{
		echo "Erreur lors du chargement";
		echo "<a href=''></a>";
	}

}
}else{
	echo "Erreur dans le type de fichier charger, veuillez svp charger un image.";
}
?>