<?php

	session_start();

	$email=$_POST["email"];
	$Num=$_POST["Num"];
	$adr=$_POST["adr"];
	$Commune=$_POST["Commune"];
	$Wilaya=$_POST["Wilaya"];



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



	#verification du remplissage de tous les champs 

	if(empty($email) || empty($Num) || empty($adr) || $Commune=="vide" || $Wilaya=="vide"){
		echo "<font size='5' color=red >Erreur ! Veuillez remplir tous les champs du formulaire.<a href= indexsect2.php >Revenir au formulaire.</a> </font>";
	}

	else{	

		$_SESSION["email"]=$_POST["email"];
		$_SESSION["Num"]=$_POST["Num"];
		$_SESSION["Adr"]=$_POST["adr"];
		$_SESSION["Commune"]=$_POST["Commune"];
		$_SESSION["Wilaya"]=$_POST["Wilaya"];
?>
	
<html>
	<head>
	
		<title> Atelier 3 Section3</title>
	
	</head>

<body style="color: darkblue;">

<form action="register3.php" method="post">

<table bordercolor="red" border="3" bgcolor="white" align="left" width="750" cellpadding="8" cellspacing="0" >

	<tr> <!--Section 3-->

		<td rowspan="3"> <!--element sec3-->

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
														<strong style="color: black">Lyc&#233;e:</strong>      <input type="text" name="Lyc">
													</li>
													<li>
														<strong style="color: black">Ann&#233;e de d&#233;but:</strong>
														<select name="Annee">
																<option value="vide"></option>
																<option value="2005">2005</option>
																<option value="2006">2006</option>
																<option value="2007">2007</option>
																<option value="2008">2008</option>
																<option value="2009">2009</option>
																<option value="2010">2010</option>
																<option value="2011">2011</option>
																<option value="2012">2012</option>
																<option value="2013">2013</option>
																<option value="2014">2014</option>
																<option value="2015">2015</option>
															
														</select>
													</li>
													<li>
														<strong style="color: black">Ann&#233;e de fin: 
														 </strong> 
														 <select name="AnneeF">
																<option value="vide"></option>
																<option value="2010">2010</option>
																<option value="2011">2011</option>
																<option value="2012">2012</option>
																<option value="2013">2013</option>
																<option value="2014">2014</option>
																<option value="2015">2015</option>
																<option value="2016">2016</option>
																<option value="2017">2017</option>

														</select>
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
																<select name="Serie">
																	<option value="vide"></option>
																	
																	<?php 

																		$sql="SELECT * FROM serie";
																		$list = $conn->query($sql);
																		while ($data = $list->fetch_assoc()){
																		echo "<option value= ".$data['id_serie_bac']." >" . $data['nom_serie']. "</option>";
																		}

																	?>
																</select>
															</dd>
															
														</dl>
													<li>
														<dl>
															<dt>
																<strong style="color: black">Mention:</strong>
															</dt>
															<dd>
																<select name="Mention">
																	<option value="vide"></option>

																	<?php 

																		$sql="SELECT * FROM mention";
																		$list = $conn->query($sql);
																		while ($data = $list->fetch_assoc()){
																		echo "<option value= ".$data['id_mention_bac']." >" . $data['nom_mention']. "</option>";
																		}

																	?>
																</select>
															</dd>
														</dl>
													</li>
													<li>
														<strong style="color: black">Moyenne:</strong> 
														<input type="text" name="Moy">
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
														<strong style="color: black">Ann&#233;e de debut: 
														</strong> 
														<select name="AnneeD">
																<option value="vide"></option>
																<option value="2010">2010</option>
																<option value="2011">2011</option>
																<option value="2012">2012</option>
																<option value="2013">2013</option>
																<option value="2014">2014</option>
																<option value="2015">2015</option>
																<option value="2016">2016</option>
																<option value="2017">2017</option>

														</select>
													</li>
													<li>
														<strong style="color: black">Titre P.F.E:</strong> 
														<textarea rows="1" name="Pfe"></textarea>
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
			<input type="submit" name="Valider" style="width: 100px; height: 30px"><br><br>
					<a href="indexsect2.php"><<< Revenir en arriere </a> 
</table>
	
</form>

</body>


</html>

<?php
}
?>