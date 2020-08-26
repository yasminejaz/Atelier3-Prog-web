<?php


	session_start();

	$Annee=$_POST["Annee"];
	$AnneeF=$_POST["AnneeF"];
	$AnneeD=$_POST["AnneeD"];
	$Serie=$_POST["Serie"];
	$Mention=$_POST["Mention"];
	$Moy=$_POST["Moy"];
	$Lyc=$_POST["Lyc"];
	$Pfe=$_POST["Pfe"];



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





	if(empty($Moy) || empty($Lyc) || empty($Pfe) || $Annee=="vide" ||$AnneeD=="vide" || $AnneeF=="vide" ||$Serie=="vide" ||$Mention=="vide"){

		echo "<font size='5' color=red >Erreur ! Veuillez remplir tous les champs du formulaire.<a href= indexsect3.php >Revenir au formulaire.</a> </font>";
	}else{
		if (($AnneeF-"3"<$Annee) || ($Moy>"19.99" || $Moy<"10.00") || ($AnneeF>$AnneeD)) {
			# code...
		

?>

<html>
	<head>
	
		<title> Atelier 3</title>
	
	</head>

<body style="color: darkblue;">

<table bordercolor="red" border="3" bgcolor="white" align="left" width="750" cellpadding="8" cellspacing="0" >

	<tr> <!--Section 1-->
		<td rowspan="3">
			<table bordercolor="orange" border="2" bgcolor="grey" width="100%" cellpadding="6" cellspacing="0" >
				<tr>

					<td>
						
						<section>
							<h1 align="center" style="color: red;font-family:comic sans ms;">Informations sur Cursus</h1>
								<a name="#infoCur"></a>
							<table bordercolor="black" border="1" bgcolor="#f1e3cb" width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td>
										<ol>
											<li >
											<strong style="color: black">Cycle Secondaire: </strong>
												<ul><br>
													<li>
														<strong style="color: black">Lyc&#233;e:</strong> <?php echo $_POST["Lyc"]; ?>
													</li>
													<li>
														<strong style="color: black">Ann&#233;e de d&#233;but:</strong>
														<?php 
															if($AnneeF-"3">=$Annee)
																{echo $Annee; 
																}else{
																	echo $Annee."<br>";
																	echo "<font color=red > Erreur!, Verifiez la date choisi.<a href= indexsect3.html >Revenir au formulaire.</a></font>";
																}
														?>
													</li>
													<li>
														<strong style="color: black">Ann&#233;e de fin:</strong> <?php echo $_POST["AnneeF"]; ?>
													</li>
												</ul>
											</li>
											<br>
											<li>
												<strong style="color: black">Bac:</strong>
												<ul>
													<li>
														<dl>
															<dt>
																<strong style="color: black">S&#233;rie:</strong>
															</dt>
															<dd>
																<?php echo $_POST["Serie"]; ?>
															</dd>
															
														</dl>
													<li>
														<dl>
															<dt>
																<strong style="color: black">Mention:</strong>
															</dt>
															<dd><?php echo $_POST["Mention"]; ?></dd>
														</dl>
													</li>
													<li>
														<strong style="color: black">Moyenne:</strong> 
														<?php 
															if($Moy<="19.99" && $Moy>="10.00") 
																{ echo $Moy; 
																	}else {
																		echo $Moy."<br>";
																	echo "<font color=red > Erreur!, Moyenne erroné.<a href= indexsect3.html >Revenir au formulaire.</a></font>";
																}?>
													</li>
												</ul>
											</li>
											<br>
											<li>
												<strong style="color: black">Cycle Universitaire:</strong>
												<ul><br>
													<li>
														<strong style="color: black">Universit&#233;:</strong>
														<a href='https://www.usthb.dz/' style="text-decoration-line:  none"> U.S.T.H.B </a>
													</li>
													<li>
														<strong style="color: black">Ann&#233;e de debut:</strong> 
														
														<?php 
															if($AnneeF<=$AnneeD)
																{echo $AnneeD;
																}else{
																	echo $AnneeD;
																	echo "<font color=red > Erreur!, Verifiez la date choisi.<a href= indexsect3.html >Revenir au formulaire.</a></font>";
																} 
														?>
													
													</li>
													<li>
														<strong style="color: black">Titre P.F.E:</strong> <?php echo $_POST["Pfe"]; ?>
													</li>
												</ul>
											</li>
										</ol>
									</td>
								</tr>

							</table>	
	
						</section>

					</td>
					
					<a href="indexsect3.html"><<< Revenir en arriere </a> 
					
				</tr>

			</table>


		
</table>


</body>


</html>
<?php
	}else{

		$_SESSION["Annee"]=$_POST["Annee"];
		$_SESSION["AnneeF"]=$_POST["AnneeF"];
		$_SESSION["AnneeD"]=$_POST["AnneeD"];
		$_SESSION["Serie"]=$_POST["Serie"];
		$_SESSION["Mention"]=$_POST["Mention"];
		$_SESSION["Moy"]=$_POST["Moy"];
		$_SESSION["Lyc"]=$_POST["Lyc"];
		$_SESSION["Pfe"]=$_POST["Pfe"];
		

		$nom= $_SESSION["nom"];
		$prenom= $_SESSION["prenom"];
		$DateN= $_SESSION["DateN"];
		$LieuN= $_SESSION["LieuN"];
		$email= $_SESSION["email"];
		$Num= $_SESSION["Num"];
		$Adr= $_SESSION["Adr"];
		$Commune= $_SESSION["Commune"];
		$Wilaya= $_SESSION["Wilaya"];
		$Annee= $_SESSION["Annee"];
		$AnneeF= $_SESSION["AnneeF"];
		$AnneeD= $_SESSION["AnneeD"];
		$Serie= $_SESSION["Serie"];
		$Mention= $_SESSION["Mention"];
		$Moy= $_SESSION["Moy"];
		$Lyc= $_SESSION["Lyc"];
		$Pfe= $_SESSION["Pfe"];
		
		$req="INSERT INTO utilisateur(nom,prenom,date_naiss,lieu_naiss,email,tel,adr,id_commune,id_wilaya,lycee,deb_s,fin_s,id_serie_bac,id_mention_bac,moy_bac,debut_u,titre_PFE) 
		Values ('$nom','$prenom','$DateN','$LieuN','$email','$Num','$Adr','$Commune','$Wilaya','$Lyc','$Annee','$AnneeF','$Serie','$Mention','$Moy','$AnneeD','$Pfe')";

		if ($conn->query($req) === False) {
						  echo "Error: " . $req . "<br>" . $conn->error;}


?>

<html>

	<body>
		
		<form action="upload.php" method="Post" enctype="multipart/form-data">
			<input type="hidden" name="Max_File_Size" value="20480000"> <!-- Limiter la taille du fichier a 20Mo -->
			Choisir une image a charger: <input type="file" name="image" accept="image/jpg"><br> <!-- le type de fichier autorisé est Image.jgp -->
			<input type="submit" name="submit">
		</form>
	</body>

</html>

<?php

	$req="SELECT id As id from utilisateur where nom='$nom' AND prenom ='$prenom'AND date_naiss='$DateN'";
	$res=$conn->query($req)->fetch_assoc()['id'];

	$_SESSION["id"]=$res.".jpg";

	}
}

?>