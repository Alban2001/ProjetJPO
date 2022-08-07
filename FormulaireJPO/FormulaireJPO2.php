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
			<div><a href="FormulaireJPO/index.html"><img class="image_logo_lycee" src="Images/Logo_Lycee_Cassin.png" title="Lycée René Cassin" /></a></div>
			<div><h1><i>Journée Portes Ouvertes - Lycée des métiers René Cassin</i></h1></div><br/><br/>
		</div>
		
		<br/><br/><br/><br/><br/>
		
		<?php

		// Essai connexion BDD + affichage liste

		require 'fonctionConnexionBDD.php';

		$pdo = initBDD();

	
			if(isset($_POST['formation'])){
				switch($_POST['formation']){
					case 'BTS SAM':
					case 'BTS CI':
					case 'BTS CG':
					case 'BTS GPME':
					case 'BTS COM':
					case 'BTS SIO':
					case 'BTS BCC':
					case 'BTS MCO':
					case 'PREPA ECT':
					case 'PREPA ECP':
					case 'PREPA ATS':
					case 'PREPA ENS Cachan':
					case 'BTS DCG':
					case 'TSTMG':
				echo "<h2>Formation : ".$_POST['formation']."</h2>";
				break;
				}
			}

		?>
		
		<br/><br/>
		
		<h3>Veuillez remplir le formulaire ci-dessous :</h3><br/><br/>
		
		<fieldset>
			<legend>INFORMATIONS PERSONNELLES</legend>
			<br/>
			<form method="POST" action="traitementJPO.php">
				<span class="champ_obligatoire" title="CHAMP OBLIGATOIRE !!!">*</span><label> Nom : </label><input type="text" name="nom" placeholder="Entrez votre nom" id="nom" required autocomplete=off><br/><br/>
				
				
				<span class="champ_obligatoire" title="CHAMP OBLIGATOIRE !!!">*</span><label> Prénom : </label><input type="text" name="prenom" placeholder="Entrez votre prénom" required autocomplete=off><br/><br/>

                    				<!-- Terminale -->


				<span class="champ_obligatoire" title="CHAMP OBLIGATOIRE !!!">*</span><label> Vous etes en terminale à dominante : </label><input  onkeyup='this.value=this.value.toUpperCase()' type='text' name='specialite' placeholder='Saisir votre filière actuelle' style='width:250px' required autocomplete=off list="specialiteListe"><br/><br/>


                    <datalist id="specialiteListe">

						<?php

						$querySpe = "SELECT DISTINCT nomSpecialite FROM specialite";

						$stmt = $pdo->prepare($querySpe);
						$stmt->execute();

						while ($row = $stmt->fetch(PDO::FETCH_OBJ))
						{
						?>
						
							<option value="<?php echo $row->nomSpecialite ?>">

						<?php
						}
						?>

                    </datalist>




                    				<!-- Option Fillière -->
				
				<label> Votre/Vos option(s) de votre filière : </label><input onkeyup='this.value=this.value.toUpperCase()' type="text" name="optionSpec" placeholder="Saisir votre/vos option(s) de votre filière" style="width:250px;" autocomplete=off list="optionListe" ><br/><br/>

				    <datalist id="optionListe">

						<?php

						$queryOpt = "SELECT DISTINCT nomOptions FROM options";

						$stmt = $pdo->prepare($queryOpt);
						$stmt->execute();

						while ($row = $stmt->fetch(PDO::FETCH_OBJ))
						{
						?>
							<option value="<?php echo $row->nomOptions ?>">

						<?php
						}
						?>	

                    </datalist>


				
									<!-- Etablissement -->

				<span class="champ_obligatoire" title="CHAMP OBLIGATOIRE !!!">*</span><label> Nom de votre établissement : </label><input onkeyup='this.value=this.value.toUpperCase()' type="text" name="etablissement" placeholder="Entrez le nom de votre établissement (Ex : LYCÉE RENÉ CASSIN)"  style="width:400px;" required autocomplete=off list="etablissementListe"><br/><br/>



                    <datalist id="etablissementListe">

						<?php

						$queryEtab = "SELECT DISTINCT nomEtablissement FROM etablissement";

						$stmt = $pdo->prepare($queryEtab);
						$stmt->execute();

						while ($row = $stmt->fetch(PDO::FETCH_OBJ))
						{
						?>
						
							<option value="<?php echo $row->nomEtablissement ?>">

						<?php
						}
						?>	

                    </datalist>

               						 <!-- Ville Etablissement -->
				
				<span class="champ_obligatoire" title="CHAMP OBLIGATOIRE !!!">*</span><label> Ville de votre établissement : </label><input onkeyup='this.value=this.value.toUpperCase()' type="text" name="villeEtablissement" placeholder="Entrez la ville de votre établissement" style="width:250px;"required autocomplete=off list="villeEtablissementListe">

				
				<datalist id="villeEtablissementListe">

						<?php

						$queryVilleEtab = "SELECT DISTINCT villeEtablissement FROM etablissement";

						$stmt = $pdo->prepare($queryVilleEtab);
						$stmt->execute();

						while ($row = $stmt->fetch(PDO::FETCH_OBJ))
						{
						?>
						
							<option value="<?php echo $row->villeEtablissement ?>">

						<?php
						}
						?>	

                    </datalist>
				
				<br/><br/>
		</fieldset>
		
		<br/><br/>
		
		<fieldset>
				<legend>Choix de la formation  <?php echo "<i>".$_POST['formation']."</i>"; ?> : </legend><br/><br/>
				<span class="champ_obligatoire" title="CHAMP OBLIGATOIRE !!!">*</span><label> Est-ce que la formation, vous intéresse ? </label>
					<input type="radio" name="interetFormation" Value="Oui" checked /><label for="Oui">Oui</label>
					<input type="radio" name="interetFormation" Value="Non" /><label for="Non">Non</label>
					<br/><br/>
				<span class="champ_obligatoire" title="CHAMP OBLIGATOIRE !!!" >*</span><label> Est-ce que vous ferez cette formation dans un autre établissement que le Lycée René Cassin ? </label>
					<input type="radio" name="autresDemande" Value="Oui" checked /><label for="Oui">Oui</label>
					<input type="radio" name="autresDemande" Value="Non" /><label for="Non">Non</label>
					<br/><br/>
		</fieldset>
		<br/><br/>
		<span class="champ_obligatoire2">* CHAMPS OBLIGATOIRE !!!</span>
		<br/><br/>
			<p class="phrase_fin">VOS DONNEES SERONT IMPRIMEES ET PRIS EN COMPTE LORS DE L'INSCRIPTION SUR PARCOURSUP.</p><br/><br/>
		
			<input class="bouton_validerForm" type="submit" name="bouton_Valider" Value="Valider" />
			<input class="bouton_effacerForm" type="reset" name="bouton_Effacer" Value="Effacer" />
			<input type="hidden" name="sigleFormation" value="<?php if(isset($_POST['formation'])){echo $_POST['formation'];}else{echo '0';}?>"/>
			</form>
	</body>
</html>