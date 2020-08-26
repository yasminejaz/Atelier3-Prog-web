<?php
	

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Atelier3";

	// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
		if ($conn->connect_error) {
		 die("Connection To Server failed: " . $conn->connect_error);}

	$id=$_POST["user"];

	$sql="SELECT * FROM utilisateur Where id='$id'";

	$list = $conn->query($sql);
	$data = $list->fetch_assoc();
	 $nom=$data['nom'];
	 $prenom=$data['prenom'];
	 $DateN=$data['date_naiss'];
	 $LieuN=$data['lieu_naiss'];
	 $email=$data['email'];
	 $Num=$data['tel'];
	 $Adr=$data['adr'];
	 $id_C=$data['id_commune'];
	 $id_w=$data['id_wilaya'];
	 $Lyc=$data['lycee'];
	 $Annee=$data['deb_s'];
	 $AnneeF=$data['fin_s'];
	 $AnneeD=$data['debut_u'];
	 $id_S=$data['id_serie_bac'];
	 $id_M=$data['id_mention_bac'];
	 $Moy=$data['moy_bac'];
	 $pfe=$data['titre_PFE'];

	$sql= "SELECT nom_commune AS commune FROM Commune Where id_commune='$id_C'";
	$Commune=$conn->query($sql)->fetch_assoc()['commune'];

	$sql= "SELECT nom_wilaya AS wilaya FROM Wilaya Where id_wilaya='$id_w'";
	$Wilaya=$conn->query($sql)->fetch_assoc()['wilaya'];

	$sql= "SELECT nom_serie AS serie FROM Serie Where id_serie_bac='$id_S'";
	$Serie=$conn->query($sql)->fetch_assoc()['serie'];

	$sql= "SELECT nom_mention AS mention FROM Mention Where id_mention_bac=$id_M";
	$Mention=$conn->query($sql)->fetch_assoc()['mention'];

?>

<html>
	<head>
	
		<title> Atelier 3</title>
	
	</head>

<body style="color: darkblue;">

<table bordercolor="red" border="3" bgcolor="white" align="left" width="750" cellpadding="8" cellspacing="0" >

	<tr> <!--Section 1-->

		<td rowspan="3"> <!--element sec1-->

			<table bordercolor="orange" border="2" bgcolor="grey" width="100%" cellpadding="6" cellspacing="0" >
				<tr>

					<td>
						
						<section>
								<h1 align="center" style="color: red;font-family: comic sans ms;">
									<?php
										$pic="user/".$_POST["user"].".jpg";
										echo "<img src='$pic' style='float: right'>";
									?>
								Informations Personelles</h1>
							<table bordercolor="black" border="1" bgcolor="#f1e3cb" width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td>
										<table>
											<tr>
												<td align="right">
												<strong style="color: black;">Nom:</strong><br>
												<strong style="color: black">Prenom:</strong><br>
												<strong style="color: black">Date de Naissance:</strong> <br>
												<strong style="color: black">Lieu de Naissance:</strong> <br>
												</td>
												<td>
													<?php
														echo $nom;
													?><br>
													<?php
														echo $prenom;
													?><br>
													<?php
														echo $DateN;
													?><br>
													<?php
														echo $LieuN;
													?><br>
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
		 <!--Section 2-->

		 <!--element sec2-->

			<table bordercolor="orange" border="2" bgcolor="grey" width="100%" cellpadding="6" cellspacing="0">
				<tr>

					<td>
						<section>
								<h1 align="center" style="color: red;font-family:comic sans ms;">Informations de Contact</h1>
								<a name="#infoCon"></a>
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
													<?php
														echo $email;
													?><br>
													<?php
														echo $Num;
													?><br>
													<?php
														echo $Adr;
													?><br>
													<?php
														echo $Commune;
													?><br>
													<?php
														echo $Wilaya;
													?><br>
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

	<!--Section 3-->

		 <!--element sec3-->

			<table bordercolor="orange" border="2" bgcolor="grey" width="100%" cellpadding="6" cellspacing="0">
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
														<strong style="color: black">Lyc&#233;e:</strong> 
														<?php
															echo $Lyc;
														?>
													</li>
													<li>
														<strong style="color: black">Ann&#233;e de d&#233;but:</strong> 
														<?php
															echo $Annee;
														?>
													</li>
													<li>
														<strong style="color: black">Ann&#233;e de fin:</strong>
														<?php
															echo $AnneeF;
														?>
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
																<?php
																	echo $Serie;
																?>
															</dd>
															
														</dl>
													<li>
														<dl>
															<dt>
																<strong style="color: black">Mention:</strong>
															</dt>
															<dd> <?php
																	echo $Mention;
																?>
															</dd>
														</dl>
													</li>
													<li>
														<strong style="color: black">Moyenne:</strong> 
														<?php
															echo $Moy;
														?>
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
															echo $AnneeD;
														?>
													</li>
													<li>
														<strong style="color: black">Titre P.F.E:</strong> 
														<?php
															echo $pfe;
														?>
													</li>
												</ul>
											</li>
										</ol>
									</td>
								</tr>

							</table>	
	
						</section>

					</td>
					
				</tr>

			</table>


		
</table>

</body>


</html>