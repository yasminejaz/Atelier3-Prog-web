<?php
	
	session_start();
	$nom=$_POST["Nom"];
	$prenom=$_POST["Prenom"];
	$DN=$_POST["DN"];
	$LN=$_POST["LN"];
	
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


###########################################################################################

#fonction de clacul d'age
function age($DN){
	$dateN=preg_split("[-|/]", $DN);
	$t=time();
	$d=date("d m Y",$t);
	$d=explode(" ",$d);
	if($dateN[2]<$d[2] && ($dateN[1]<$d[1] || ($dateN[1]==$d[1] && $dateN[0]>=$d[0]))){
		return $d[2]-$dateN[2];
	}
		return $d[2]-$dateN[2]-1;
}

############################################################################################

#verification du remplissage de tous les champs 
if (empty($nom) || empty($prenom) || empty($DN) || empty($LN)) {
	
		echo "<font size='5' color=red >Erreur ! Veuillez remplir tous les champs du formulaire.<a href= indexsect1.html>Revenir au formulaire.</a> </font>";
}
else{

  $Vnom=preg_match("#^[A-Za-z][a-z]([a-z]*([-|\s]{1}[A-Z])?[a-z]+)*$#", $_POST["Nom"]); #verifie le format du nom
  $Vpre=preg_match("#^[A-Za-z][a-z]([a-z]*([-|\s]{1}[A-Z])?[a-z]+)*$#", $_POST["Prenom"]); #verifie le format du prenom
  $VDate=preg_match("#\d{2}\s?/\s?\d{2}\s?/\s?\d{4}|\d{2}\s?-\s?\d{2}\s?-\s?\d{4}#",$DN); #verifie le fromat de la date aka: jj/mm/aaaa ou jj-mm-aaaa avec ou sans espace avant ou/et apres le separateur 
  if($VDate){
  	$date=preg_split("[\s?-\s?|\s?/\s?]", $_POST["DN"]); #split de la date pour verifier sa validité 
 	$Vdate=checkdate($date[1], $date[0], $date[2]); #verification de la validité de la date 
 }
if($Vnom== False || $Vpre == False || $VDate==False){

?>

<html>
	<head>
	
		<title> Atelier 3 Section1</title>
	
	</head>

<body style="color: darkblue;">

<table bordercolor="red" border="3" bgcolor="white" align="left" width="750" cellpadding="8" cellspacing="0" >

	<tr> <!--Section 1-->
		<td rowspan="3">
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
													<strong style="text-align: right; color: black">Nom:</strong><br>
													
													<?php
														if(!$Vnom){
															echo "<font color=red>Erreur! Format du Nom non conforme.</font><br>";
														}
													?>
													<strong style="text-align: right; color: black">Prenom:</strong><br>

													<?php
														if(!$Vpre){
															echo "<font color=red >Erreur! Format du Prenom non conforme.</font><br>";
														}
													?>
													<strong style="text-align: right; color: black">Date de Naissance:</strong><br>

													<?php
														if(!$VDate || !$Vdate){
															echo "<font color=red >Erreur! Format de date non conforme.</font><br>";
														}
													?>
													<strong style="text-align: right; color: black">Lieu de Naissance:</strong><br>
												</td>
												<td>
													<?php
														echo $nom."<br>";
														if(!$Vnom){
															echo "<br>";
														}

													?>
													<?php
														echo $prenom."<br>";
														if(!$Vpre){
															echo "<br>";
														}
													?>
													<?php
														echo $DN."<br>";
														if(!$VDate || !$Vdate){
															echo "<br>";
														}
													?>
													<?php
													 	echo $LN."<br>";
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
		<a href="indexsect1.html"><<< Revenir en arriere </a>
	</td>

	</tr>

</table>
</body>
</html>

<?php
	
}else{
	$_SESSION["nom"]=$_POST["Nom"];
	$_SESSION["prenom"]=$_POST["Prenom"];
	$_SESSION["DateN"]=$_POST["DN"];
	$_SESSION["LieuN"]=$_POST["LN"];
?>
	<html>
		<head>
			<title>Atelier 3</title>
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
														<option value="vide"> </option>
														
														<?php 

															$sql = "SELECT * FROM wilaya";
															$list = $conn->query($sql);
															while ($data = $list->fetch_assoc()){
																echo "<option value= ".$data['id_wilaya']." >" . $data['nom_wilaya']. "</option>";
															}

														?>
													</select><br>
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

<?php
	}
}
?>