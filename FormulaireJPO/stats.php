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
				
		<h2>Statistiques</h2><br/>
		
		<?php 

	if($_POST['validerPassword']){
		if($_POST['formation'] == "BTS SAM" && $_POST['password'] == "1"){
			
			echo "<h2>BTS SAM</h2><br/>";
			$formation = "BTS SAM";
			tableauStats($formation);
			
		}
		elseif($_POST['formation'] == "BTS CI" && $_POST['password'] == "2"){
			
			echo "<h2>BTS CI</h2><br/>";
			$formation = "BTS CI";
			tableauStats($formation);
			
		}
		elseif($_POST['formation'] == "BTS CG" && $_POST['password'] == "3"){
			
			echo "<h2>BTS CG</h2><br/>";
			$formation = "BTS CG";
			tableauStats($formation);
		}
		elseif($_POST['formation'] == "BTS GPME" && $_POST['password'] == "4"){
			
			echo "<h2>BTS GPME</h2><br/>";
			$formation = "BTS GPME";
			tableauStats($formation);
		}
		elseif($_POST['formation'] == "BTS COM" && $_POST['password'] == "5"){
			
			echo "<h2>BTS COM</h2><br/>";
			$formation = "BTS COM";
			tableauStats($formation);
		}
		elseif($_POST['formation'] == "BTS SIO" && $_POST['password'] == "6"){
			
			echo "<h2>BTS SIO</h2><br/>";
			$formation = "BTS SIO";
			tableauStats($formation);
		}
		elseif($_POST['formation'] == "BTS BCC" && $_POST['password'] == "7"){
			
			echo "<h2>BTS BCC</h2><br/>";
			$formation = "BTS BCC";
			tableauStats($formation);
		}
		elseif($_POST['formation'] == "BTS MCO" && $_POST['password'] == "8"){
			
			echo "<h2>BTS MCO</h2><br/>";
			$formation = "BTS MCO";
			tableauStats($formation);
		}
		elseif($_POST['formation'] == "PREPA ECT" && $_POST['password'] == "9"){
			
			echo "<h2>PREPA ECT</h2><br/>";
			$formation = "PREPA ECT";
			tableauStats($formation);
		}
		elseif($_POST['formation'] == "PREPA ECP" && $_POST['password'] == "10"){
			
			echo "<h2>PREPA ECP</h2><br/>";
			$formation = "PREPA ECP";
			tableauStats($formation);
		}
		elseif($_POST['formation'] == "PREPA ATS" && $_POST['password'] == "11"){
			
			echo "<h2>PREPA ATS</h2><br/>";
			$formation = "PREPA ATS";
			tableauStats($formation);
		}
		elseif($_POST['formation'] == "PREPA ENS Cachan" && $_POST['password'] == "12"){
			
			echo "<h2>PREPA ENS Cachan</h2><br/>";
			$formation = "PREPA ENS Cachan";
			tableauStats($formation);
		}
		elseif($_POST['formation'] == "DCG" && $_POST['password'] == "13"){
			
			echo "<h2>DCG</h2><br/>";
			$formation = "DCG";
			tableauStats($formation);
		}
		elseif($_POST['formation'] == "TSTMG" && $_POST['password'] == "14"){
			
			echo "<h2>TSTMG</h2><br/>";
			$formation = "TSTMG";
			tableauStats($formation);
		}
		else{
			echo "<br/><br/><h3 class='erreurStats'>ERREUR : FORMATION OU MOT DE PASSE INCORRECT !!!</h3><br/><br/>";
		}
	}
		
		
		function tableauStats($formation){
			
		require 'fonctionConnexionBDD.php';

		$pdo = initBDD();
		
		
		?>
		
		<table BORDER ='1' class='tableauVisit'>
		<caption>VISITEUR</caption><br/><br/>
				<tr>
					<th>Code du visiteur</th>
					<th>Nom </th>
					<th>Prénom</th>
					<th>Specialité</th>
					<th>Option</th>
					<th>Nom de l'établissement</th>
					<th>Ville de l'établissement</th>
					<th>Interet formation ?</th>
					<th>Autres formation ?</th>
				</tr>
		<br/><br/>
		
		<?php
		
						$queryVisit = "SELECT DISTINCT visiteur.codeVisiteur, nomVisiteur, prenomVisiteur, nomSpecialite, nomOptions, nomEtablissement, villeEtablissement, interetEleveFormation, autresFormation 
										FROM visiteur, specialite, visiter, etablissement, formation, options
										WHERE visiteur.codeVisiteur = visiter.codeVisiteur
										AND visiteur.codeOptions = options.codeOptions
										AND visiteur.codeEtablissement = etablissement.codeEtablissement						   
										AND visiteur.codeSpecialite = specialite.codeSpecialite
										AND visiter.sigleFormation = formation.sigleFormation
										AND visiter.sigleFormation = '".$formation."'";

						$stmt = $pdo->prepare($queryVisit);
						$stmt->execute();
						

						while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
						{
						?>
							<tr>
								<th><?php echo $row['codeVisiteur'] ?></th>
								<td><?php echo $row['nomVisiteur'] ?></td>
								<td><?php echo $row['prenomVisiteur'] ?></td>
								<td><?php echo $row['nomSpecialite'] ?></td>
								<td><?php echo $row['nomOptions'] ?></td>
								<td><?php echo $row['nomEtablissement'] ?></td>
								<td><?php echo $row['villeEtablissement'] ?></td>
								<td><?php echo $row['interetEleveFormation'] ?></td>
								<td><?php echo $row['autresFormation'] ?></td>
							</tr>
		<?php }	?>
		
						
						
		
		</table>
		
						<?php
						
						
						$nbrPers = $pdo->query('SELECT COUNT(visiter.codeVisiteur) FROM visiter WHERE visiter.sigleFormation = "'.$formation.'"')->fetchColumn();
						
						$nbrPersInteret = $pdo->query('SELECT COUNT(visiter.codeVisiteur) FROM visiter WHERE interetEleveFormation = "Oui" AND visiter.sigleFormation = "'.$formation.'"')->fetchColumn();
						

						?>
						<br/><br/>
							<p class="requeteSql"><b>NOMBRE DE PERSONNES</b> : <?php echo $nbrPers ?></p><br/>
							<p class="requeteSql"><b>NOMBRE DE PERSONNES INTERESSE PAR LA FORMATION</b> : <?php echo $nbrPersInteret ?></p><br/>
							
							
		<table BORDER ='1' class='tableauEtab'>
		<caption>ETABLISSEMENTS</caption><br/><br/><br/>
				<tr>
					<th>Code de l'établissement </th>
					<th>Nom de l'établissement</th>
					<th>Ville de l'établissement</th>
				</tr>
<?php
						$queryEtab = "SELECT codeEtablissement, nomEtablissement, villeEtablissement FROM etablissement";

						$stmt = $pdo->prepare($queryEtab);
						$stmt->execute();
						

						while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
						{
						?>
							<tr>
								<th><?php echo $row['codeEtablissement'] ?></td>
								<td><?php echo $row['nomEtablissement'] ?></td>
								<td><?php echo $row['villeEtablissement'] ?></td>
							</tr>
						<?php
						}
						?>
		</table>
		<table BORDER ='1' class='tableauSpec'>
		<caption>SPECIALITES</caption><br/><br/><br/>
				<tr>
					<th>Code de la spécialité </th>
					<th>Nom de la spécialité</th>
				</tr>
<?php
						$querySpec = "SELECT codeSpecialite, nomSpecialite FROM specialite";

						$stmt = $pdo->prepare($querySpec);
						$stmt->execute();
						

						while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
						{
						?>
							<tr>
								<th><?php echo $row['codeSpecialite'] ?></th>
								<td><?php echo $row['nomSpecialite'] ?></td>
							</tr>
						<?php
						}
						?>
		
				</table>		
		<table BORDER ='1' class='tableauOpt'>
		<caption>OPTIONS</caption><br/><br/><br/>
				<tr>
					<th>Code de l'options </th>
					<th>Nom de l'option</th>
					<th>Code de la specialite</th>
				</tr>
<?php
						$queryOpt = "SELECT codeOptions, nomOptions, codeSpecialite FROM options";

						$stmt = $pdo->prepare($queryOpt);
						$stmt->execute();
						

						while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
						{
						?>
							<tr>
								<th><?php echo $row['codeOptions'] ?></th>
								<td><?php echo $row['nomOptions'] ?></td>
								<td><?php echo $row['codeSpecialite'] ?></td>
							</tr>
						<?php
			
						}
		}
		?>
		</table>
		<br/><br/><br/><br/><br/>
	</body>
</html>