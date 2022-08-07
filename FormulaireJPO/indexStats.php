<!-- MOTS DE PASSE POUR CHAQUE FORMATIONS

BTS SAM : 1
BTS CI : 2
BTS CG : 3
BTS GPME : 4
BTS COM : 5
BTS SIO : 6
BTS BCC : 7
BTS MCO : 8
PREPA ECT : 9
PREPA ECP : 10
PREPA ATS : 11
PREPA ENS Cachan : 12
DCG : 13
TSTMG : 14

-->

<!DOCTYPE html>
<html>
	<head>
		<title>Journée Portes Ouvertes - Lycée René Cassin</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="Style/FormulaireJPO.css" />
		<link rel="icon" href="Images/Logo_Lycee_Cassin.png"/>
	</head>
	<body>
		<div id="header">
			<div><a href="index.html"><img class="image_logo_lycee" src="Images/Logo_Lycee_Cassin.png" title="Lycée René Cassin" /></a></div>
			<div><h1><i>Journée Portes Ouvertes - Lycée des métiers René Cassin</i></h1></div><br/><br/>
		</div>
		
		<br/><br/><br/><br/><br/>
	<form method="post" action="stats.php" >
		<fieldset>
				<legend>Stastistiques des Formations :</legend><br/><br/>
				<label> Identifiant : </label>
				<select name="formation" style="font-size:17px;">
					<option value="BTS SAM">BTS Support Action Managériale</option>
					<option value="BTS CI">BTS Commerciale International</option>
					<option value="BTS CG">BTS Comptabilité et Gestion</option>
					<option value="BTS GPME">BTS Gestion de la PME</option>
					<option value="BTS COM">BTS Communication</option>
					<option value="BTS SIO">BTS Services Informatiques aux Organisations</option>
					<option value="BTS BCC">BTS Banque - Conseiller de Clientèle</option>
					<option value="BTS MCO">BTS Management Commercial Opérationnel</option>
					<option value="PREPA ECT">PREPA Économique et Commerciale Option technologique</option>
					<option value="PREPA ECP">PREPA Économique et Commerciale Option technologique, voie professionnelle</option>
					<option value="PREPA ATS">PREPA Adaptation Technicien Supérieur</option>
					<option value="PREPA ENS Cachan">PREPA École Normale Supérieure Cachan</option>
					<option value="DCG">Diplôme de Comptabilité et Gestion</option>
					<option value="TSTMG">Terminale Sciences et Technologies du Management et de la Gestion</option>
				</select><br/><br/>
				<label>Mot de Passe : </label>
				<input type="password" name="password" required>
				<input type="submit" Value="Valider" name="validerPassword"/>
		</fieldset>
	</form>
	</body>
</html>
