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
		<br/><br/><br/><br/>
		
		<?php
		
		require ('fonctionConnexionBDD.php');
		
function etablissement($nomEtablissement, $villeEtablissement){
	
	$sqlEtablissement = "SELECT nomEtablissement ,villeEtablissement FROM etablissement WHERE nomEtablissement = '".$nomEtablissement."' AND villeEtablissement = '".$villeEtablissement."'";
    $stmt = $GLOBALS['pdo']->query($sqlEtablissement);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	while($row == false){	
		$stmtEtablissement = $GLOBALS['pdo']->prepare("INSERT INTO etablissement (nomEtablissement, villeEtablissement) VALUES (:nomEtablissement, :villeEtablissement)");
		$stmtEtablissement->execute(array('nomEtablissement' => $nomEtablissement, 'villeEtablissement' => $villeEtablissement));
	
		$stmtEtablissement = $GLOBALS['pdo']->query("SELECT codeEtablissement FROM etablissement WHERE nomEtablissement = '".$nomEtablissement."' AND villeEtablissement = '".$villeEtablissement."'");
		$row = $stmtEtablissement->fetch(PDO::FETCH_ASSOC);

		return $row['codeEtablissement'];
	}
	
	$stmtEtablissement2 = $GLOBALS['pdo']->query("SELECT codeEtablissement FROM etablissement WHERE nomEtablissement = '".$nomEtablissement."' AND villeEtablissement = '".$villeEtablissement."'");
	$row = $stmtEtablissement2->fetch(PDO::FETCH_ASSOC);

	return $row['codeEtablissement'];	
}

function specialite($codeSpecialite, $nomSpecialite){
	
	$sqlSpecialite = "SELECT codeSpecialite, nomSpecialite FROM specialite WHERE codeSpecialite = '".$codeSpecialite."' AND nomSpecialite = '".$nomSpecialite."'";
    $stmt = $GLOBALS['pdo']->query($sqlSpecialite);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	while($row == false){
		$stmtSpecialite = $GLOBALS['pdo']->prepare("INSERT INTO specialite (codeSpecialite, nomSpecialite) VALUES (:codeSpecialite, :nomSpecialite)");
		$stmtSpecialite->execute(array('codeSpecialite' => $codeSpecialite, 'nomSpecialite' => $nomSpecialite));
		
		$stmtSpecialite = $GLOBALS['pdo']->query("SELECT codeSpecialite FROM specialite WHERE codeSpecialite = '".$codeSpecialite."' AND nomSpecialite = '".$nomSpecialite."'");
		$row = $stmtSpecialite->fetch(PDO::FETCH_ASSOC);

		return $row['codeSpecialite'];
	}
	
	$stmtSpecialite2 = $GLOBALS['pdo']->query("SELECT codeSpecialite FROM specialite WHERE codeSpecialite = '".$codeSpecialite."' AND nomSpecialite = '".$nomSpecialite."'");
	$row = $stmtSpecialite2->fetch(PDO::FETCH_ASSOC);

	return $row['codeSpecialite'];	
}

function options($nomOptions, $codeSpecialite){
	
	$sqlOptions = "SELECT nomOptions, codeSpecialite FROM options WHERE nomOptions = '".$nomOptions."' AND codeSpecialite = '".$codeSpecialite."'";
    $stmt = $GLOBALS['pdo']->query($sqlOptions);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	while($row == false){
		$stmtOptions = $GLOBALS['pdo']->prepare("INSERT INTO options (nomOptions, codeSpecialite) VALUES (:nomOptions, :codeSpecialite)");
		$stmtOptions->execute(array('nomOptions' => $nomOptions, 'codeSpecialite' => $codeSpecialite));	
		
		if(empty($nomOptions)){
			$stmtOptions = $GLOBALS['pdo']->query("SELECT codeOptions FROM options WHERE nomOptions = NULL AND codeSpecialite = '".$codeSpecialite."'");
			$row = $stmtOptions->fetch(PDO::FETCH_ASSOC);

			return $row['codeOptions'];
		}
		else{
			$stmtOptions = $GLOBALS['pdo']->query("SELECT codeOptions FROM options WHERE nomOptions = '".$nomOptions."' AND codeSpecialite = '".$codeSpecialite."'");
			$row = $stmtOptions->fetch(PDO::FETCH_ASSOC);

			return $row['codeOptions'];
		}
	}
		if(empty($nomOptions)){
			$stmtOptions = $GLOBALS['pdo']->query("SELECT codeOptions FROM options WHERE nomOptions = NULL AND codeSpecialite = '".$codeSpecialite."'");
			$row = $stmtOptions->fetch(PDO::FETCH_ASSOC);

			return $row['codeOptions'];
		}
		else{
			$stmtOptions = $GLOBALS['pdo']->query("SELECT codeOptions FROM options WHERE nomOptions = '".$nomOptions."' AND codeSpecialite = '".$codeSpecialite."'");
			$row = $stmtOptions->fetch(PDO::FETCH_ASSOC);

			return $row['codeOptions'];
		}
}

function visiteur($nomVisiteur, $prenomVisiteur, $codeEtablissement, $codeSpecialite, $codeOptions){
	
	$stmtVisiteur = $GLOBALS['pdo']->prepare("INSERT INTO visiteur (nomVisiteur, prenomVisiteur, codeEtablissement, codeSpecialite, codeOptions) VALUES (:nomVisiteur, :prenomVisiteur, :codeEtablissement, :codeSpecialite, :codeOptions)");
	$stmtVisiteur->execute(array('nomVisiteur' => $nomVisiteur, 'prenomVisiteur' => $prenomVisiteur, 'codeEtablissement' => $codeEtablissement, 'codeSpecialite' => $codeSpecialite, 'codeOptions' => $codeOptions));
	
	$stmtVisiteur = $GLOBALS['pdo']->query("SELECT max(codeVisiteur) AS idVisit FROM visiteur WHERE nomVisiteur = '".$nomVisiteur."' AND prenomVisiteur = '".$prenomVisiteur."' AND codeEtablissement = '".$codeEtablissement."' AND codeSpecialite = '".$codeSpecialite."' AND codeOptions = '".$codeOptions."'");
	$row = $stmtVisiteur->fetch(PDO::FETCH_ASSOC);

	return $row['idVisit'];
}

function visiter($codeVisiteur, $sigleFormation, $interetFormation, $autresDemande){
	
	$stmtVisiter = $GLOBALS['pdo']->prepare("INSERT INTO visiter (codeVisiteur, sigleFormation, interetEleveFormation, autresFormation) VALUES (:codeVisiteur, :sigleFormation, :interetEleveFormation, :autresFormation)");
	$stmtVisiter->execute(array('codeVisiteur' => $codeVisiteur, 'sigleFormation' => $sigleFormation, 'interetEleveFormation' => $interetFormation, 'autresFormation' => $autresDemande));
}

		$GLOBALS['pdo'] = initBDD();
	
	$nomVisiteur = $_POST['nom2'];
	$prenomVisiteur = $_POST['prenom2'];
	$nomSpecialite = $_POST['specialite2'];
	$nomOptions = $_POST['optionSpec2'];
	$nomEtablissement = $_POST['etablissement2'];
	$villeEtablissement = $_POST['villeEtablissement2'];
	$sigleFormation = $_POST['sigleFormation2'];
	$interetFormation = $_POST['interetFormation2'];
	$autresDemande = $_POST['autresDemande2'];
	
	$codeSpecialite = $nomSpecialite;
	
	$codeEtablissement = etablissement($nomEtablissement, $villeEtablissement);
	specialite($codeSpecialite, $nomSpecialite);
	$codeOptions = options($nomOptions, $codeSpecialite);
	$codeVisiteur = visiteur($nomVisiteur, $prenomVisiteur, $codeEtablissement, $codeSpecialite, $codeOptions);
	visiter($codeVisiteur, $sigleFormation, $interetFormation, $autresDemande);
	
	?>

	<div class="remerciements">
		Merci d'avoir remplie le questionnaire !!! :-)
	</div>
	
<form method="post" action="index.html">
	
	<a href="index.html"><input name="boutonRetour" class="bouton_validerForm" type="submit" value="Retour" /></a>
</form>
	</body>
</html>