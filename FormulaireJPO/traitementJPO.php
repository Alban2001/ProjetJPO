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
		
		<div class="resultatInfosVisiteur">
<?php

if($_POST['bouton_Valider']){
	echo "Nom : <strong>".$_POST['nom']."</strong><br/><br/>";

	echo "Prénom : <strong>".$_POST['prenom']."</strong><br/><br/>";
	
	echo "Spécialité : <strong>".$_POST['specialite']."</strong><br/><br/>";
	
	echo "Option(s) : <strong>".$_POST['optionSpec']."</strong><br/><br/>";
	
	echo "Etablissement : <strong>".$_POST['etablissement']."</strong><br/><br/>";
	
	echo "Ville de votre établissement : <strong>".$_POST['villeEtablissement']."</strong><br/><br/>";
	
	echo "Formation choisi : <strong>".$_POST['sigleFormation']."</strong><br/><br/>";
	
	echo "Est-ce que la formation <i>".$_POST['sigleFormation']."</i>, vous intéresse ? : <strong>".$_POST['interetFormation']."</strong><br/><br/>";
	
	echo "Est-ce que vous ferez cette formation dans un autre établissement ? : <strong>".$_POST['autresDemande']."</strong><br/><br/>";
}


?>

</div>

	<a href="index.html"><input class="bouton_validerForm" name="boutonPrecedent" type="submit" value="Revenir à la page précédente" /></a>

<form method="post" action="pageFinal.php">
	<input type="hidden" name="nom2" value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];}else{echo '0';}?>"/>
	<input type="hidden" name="prenom2" value="<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];}else{echo '0';}?>"/>
	<input type="hidden" name="specialite2" value="<?php if(isset($_POST['specialite'])){echo $_POST['specialite'];}else{echo '0';}?>"/>
	<input type="hidden" name="optionSpec2" value="<?php if(!empty($_POST['optionSpec'])){echo $_POST['optionSpec'];}else{echo "NULL";}?>"/>
	<input type="hidden" name="etablissement2" value="<?php if(isset($_POST['etablissement'])){echo $_POST['etablissement'];}else{echo '0';}?>"/>
	<input type="hidden" name="villeEtablissement2" value="<?php if(isset($_POST['villeEtablissement'])){echo $_POST['villeEtablissement'];}else{echo '0';}?>"/>
	<input type="hidden" name="sigleFormation2" value="<?php if(isset($_POST['sigleFormation'])){echo $_POST['sigleFormation'];}else{echo '0';}?>"/>
	<input type="hidden" name="interetFormation2" value="<?php if(isset($_POST['interetFormation'])){echo $_POST['interetFormation'];}else{echo '0';}?>"/>
	<input type="hidden" name="autresDemande2" value="<?php if(isset($_POST['autresDemande'])){echo $_POST['autresDemande'];}else{echo '0';}?>"/>

	<input class="bouton_validerForm" name="boutonEnvoyer" type="submit" value="Envoyer" />
</form>
	</body>
</html>