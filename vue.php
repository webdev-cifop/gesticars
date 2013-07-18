<html>

<head>
	<title>prologiciel CIFOP</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style/style.css" type="text/css" />

	<!-- jQuery -->	
	<script src="script/jquery-ui-1.10.3.custom/js/jquery-1.9.1.js"></script>
    
	<!-- datePicker -->
    <link rel="stylesheet" href="script/jquery-ui-1.10.3.custom/css/pepper-grinder/jquery-ui-1.10.3.custom.css"> <!-- css datepicker -->
    	
    	
	<script src="script/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js"></script> <!-- script datepicker -->
	<script src="script/jquery-ui-1.10.3.custom/development-bundle/ui/i18n/jquery.ui.datepicker-fr.js"></script> <!-- script langue datepicker -->
		
	<!-- timepicker -->
	<link rel="stylesheet" href="sscript/jQuery-Timepicker-Addon-master/jquery-ui-timepicker-addon.css"/> <!-- CSS timepicker -->
		
		
	<script type="text/javascript" src="script/jQuery-Timepicker-Addon-master/jquery-ui-timepicker-addon.js"></script> <!-- script timepicker -->
	
	<script src="script/validation_engine/jquery.validationEngine.js"></script> <!-- script validation engine -->
	<script src="script/validation_engine/languages/jquery.validationEngine-fr.js"></script> <!-- langue pour validation engine -->
	<link rel="stylesheet" href="style/validationEngine.jquery.css" type="text/css"/> <!-- css validation engine -->
	
	<script> 
	$(function(){
    $('.datetime').datetimepicker({
    showSecond: false,
    timeFormat: 'hh:mm',
    showTime: false
    });
	});
	</script>
	
	<script>
	$(function() {
	$( ".datepicker" ).datepicker(); 
	});
	</script>
	
	<script>
	jQuery(document).ready(function()
	{
	jQuery(".validate").validationEngine(); //va s'appliquer sur la classe 'validate' 
	});
	</script>

</head>

<body>		
<?php
switch ($page)
{
	case 'identification':
		echo "<h1>BIENVENUE</h1>
			<h2>Gestion des réservations automobiles du CIFOP</h2>
			<div class=login>
			<form method='post' action='ctrllogin.php' class='validate'>
			<fieldset>
			<legend>CONNEXION</legend>
			Login:<input maxlength=20 size=20 name='login' value='' class='validate[required]'/><br />
			Password:<input size=20 maxlength=20 type='password' name='password' value='' class='validate[required]'/><br />
			<input type='submit' name='logger' value='envoyer'>
			</form>
			</div>
			<img src='style/images/cifop3.jpg' alt='logo partenaires'/>";
	break;
	
	case 'AfficherDemande' :
		afficher_menu ();
		echo "<div class='content'>";
		echo "<h2>Demande de réservation</h2>";
		echo "<div class='overflow'><table border=1><form method='post' action='index.php'>";
		echo '<tr><th>Nom</th><th>Prénom</th><th>Date début reservation</th><th>Date fin réservation</th><th>Destination</th><th>Motif</th><th>Véhicule</th><th></th></tr>';
		dispo_vehicule();
		echo "</table>";
		echo "</div>";
		echo "<input type='submit' name='valider_demande' value='valider'><input type='submit' name='supprimer_demande' value='supprimer'>";
		echo "</div></form>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;	
			
	case 'demandeResa':
		echo "<h1>RESERVATION</h1>
			<h2>Demande reservation en ligne d'un véhicule cifop</h2>
			<img src='style/images/cifop3.jpg' alt='logo cifop' />
			<h3>Bonjour et bienvenue</h3>
			<div class='formulaire'>
			<form method='post' action='index.php' class='validate'>
			<fieldset>
			<legend>FORMULAIRE DE RESERVATION</legend>
			Agent: <select name='agent' class='validate[required]'>";
			foreach ($table_agent as $value_agent)
			{ 
				echo "<option value='".$value_agent['id_agent']."'>".$value_agent['nom_agent']." ".$value_agent['prenom_agent']."</option>";
			}
			echo "</select><br />";
			echo "Mail <font size=1>(uniquement si jamais renseigné)</font>: 
			<input size=25 name='mail' value='' class='validate[custom[email]]' style='margin-left:59px;'/><br />
			N° de permis <font size=1>(uniquement si jamais renseigné)</font>: 
			<input size=25 name='permis' value='' style='margin-left:59px;'/><br /><br />
			Date et heure de début:
			<input  size=15 name='deb_reservation'  value='' class='datetime' class='datetime'/><br />
			Date et heure de fin:
			<input size=15 name='fin_reservation' value='' class='datetime' style='margin-left:22px;'/><br /><br />
			Destination:
			<input  name='destination' size='15' value='' class='validate[required]' style='margin-left:20px;'/><br />
			Motif:
			<input  name='motif' size='15' value='' class='validate[required]' style='margin-left:70px;'/><br /><br />
			<input type='submit' name='demande_resa' value='envoyer'>
			</fieldset>
			</form>
			<div align='center'><form method='post' action:'index.php'><input type='submit' name='deconnecter' value='deconnecter' class='deconnect'></form>
			</div></div>
			<img src='style/images/partenaires.jpg' alt='logo partenaires'/>";
	break;
		
	case 'consulterVehicule': 
		afficher_menu ();
		echo "<div class='content'>";
		echo "<h2>Consulter les véhicules</h2>";
		echo "<div class='overflow'><table border=1 >";
		echo '<tr><th>modèle</th><th>immatriculation</th><th>Date assurance</th><th>Kilomètrage</th></tr>';
		foreach ($table_vehicule as $value_vehicule)
			{ 
				echo '<tr><td>'.$value_vehicule["mod_vehicule"].'</td><td>'.$value_vehicule["immat_vehicule"].'</td><td>'.$value_vehicule["date_assu_vehicule"].'</td><td>'.$value_vehicule["km_vehicule"].' Km</td></tr>';
			}
		echo "</table><br />";
		echo "</div></div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
	
	case 'consulterAgent': 
		afficher_menu ();
		echo "<div class='content'>";
		echo "<h2>Consulter les agents</h2>";
		echo "<div class='overflow'><table border=1 >";
		echo '<tr><th>Nom</th><th>Prénom</th><th>Mail</th><th>Permis</th><th>Poste</th></tr>';
		foreach ($table_agent as $value_agent)
			{ 
				echo '<tr><td>'.$value_agent["nom_agent"].'</td><td>'.$value_agent["prenom_agent"].'</td><td>'.$value_agent["mail_agent"].'</td><td>'.$value_agent["permis_agent"].'</td><td>'.$value_agent["libelle_poste"].'</td></tr>';
			}
		echo "</table><br />";
		echo "</div></div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;


	case 'modifierVehicule_1':
		afficher_menu ();
		echo "<div class='content'>";
		echo "<div class='overflow'><table border=1><table border=1 >";
		echo '<tr><th>modèle</th><th>immatriculation</th><th>Date assurance</th><th>Kilomètrage</th></tr>';
		foreach ($table_vehicule as $value_vehicule)
			{ 
				echo '<tr><td>'.$value_vehicule["mod_vehicule"].'</td><td>'.$value_vehicule["immat_vehicule"].'</td><td>'.$value_vehicule["date_assu_vehicule"].'</td><td>'.$value_vehicule["km_vehicule"].' Km</td>
					<td><form method="POST" action="index.php">
					<input type="submit" name="modif_vehicule" value="modifier">
					<input type="hidden" name="modele" value="'.$value_vehicule["mod_vehicule"].'">
					<input type="hidden" name="immat" value="'.$value_vehicule["immat_vehicule"].'">
					<input type="hidden" name="dateAssu" value="'.$value_vehicule["date_assu_vehicule"].'">
					<input type="hidden" name="id_vehicule" value="'.$value_vehicule["id_vehicule"].'">
					<input type="hidden" name="km" value="'.$value_vehicule["km_vehicule"].'"></form></td>';
			}
		echo "</table></div></div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
		
	case 'modifierVehicule_2':
		afficher_menu ();
		echo "<div class='content'>
		<h2>Modifier un véhicule</h2>
		
		<form method='POST' action='index.php' class='validate'> ";
			echo "Modèle: <input type='text' name='modif_modele' class='validate[required]' value='".$_POST['modele']."'><br />
				Immatriculation: <input type='text' name='modif_immat' class='validate[required]' value='".$_POST['immat']."'><br />
				Date de fin d'assurance: <input type='text' name='modif_date' class='validate[required] datepicker' value='".$_POST['dateAssu']."'><br />
				Kilomètrage: <input type='text' name='modif_km' class='validate[required]' value='".$_POST['km']."'><br />
				<input type='hidden' name='id_vehicule' value='".$_POST['id_vehicule']."'><br />
				<input type='submit' name='valid_modif_vehicule' value='confirmer'>
		</form>";	
		echo "</div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
	
	case 'modifierAgent_1':
		afficher_menu ();
		echo "<div class='content'>";
		echo "<div class='overflow'><table border=1><table border=1 >";
		echo '<tr><th>Nom</th><th>Prénom</th><th>Mail</th><th>Permis</th><th>Poste</th></tr>';
		foreach ($table_agent as $value_agent)
			{ 
				echo '<tr><td>'.$value_agent["nom_agent"].'</td><td>'.$value_agent["prenom_agent"].'</td><td>'.$value_agent["mail_agent"].'</td><td>'.$value_agent["permis_agent"].'</td><td>'.$value_agent["libelle_poste"].'</td>
					<td><form method="POST" action="index.php">
					<input type="submit" name="modif_agent" value="modifier">
					<input type="hidden" name="nom" value="'.$value_agent["nom_agent"].'">
					<input type="hidden" name="prenom" value="'.$value_agent["prenom_agent"].'">
					<input type="hidden" name="mail" value="'.$value_agent["mail_agent"].'">
					<input type="hidden" name="permis" value="'.$value_agent["permis_agent"].'">
					<input type="hidden" name="poste" value="'.$value_agent["id_poste_poste"].'">
					<input type="hidden" name="id_agent" value="'.$value_agent["id_agent"].'"></form></td>';
			}
		echo "</table></div></div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
	
		case 'modifierAgent_2':
		afficher_menu ();
		echo "<div class='content'>
		<h2>Modifier un agent</h2>
		
		<form method='POST' action='index.php' class='validate'> ";
		echo "Nom: <input type='text' name='modif_nom' class='validate[required]' value='".$_POST['nom']."'><br />
			Prénom: <input type='text' name='modif_prenom' class='validate[required]' value='".$_POST['prenom']."'><br />
			Mail: <input type='text' name='modif_mail' class='validate[required]' value='".$_POST['mail']."'><br />
			N° Permis: <input type='text' name='modif_permis' class='validate[required]' value='".$_POST['permis']."'><br />
			Poste: <select name='modif_poste' class='validate[required]'>";
			select_poste_agent();
		echo "</select><br />
			<input type='hidden' name='id_agent' value='".$_POST['id_agent']."'><br />
			<input type='submit' name='valid_modif_agent' value='confirmer'></form>";	
		echo "</div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;

	case 'ajouterVehicule':
		afficher_menu ();
		echo "<div class='content'>
		<h2>Ajouter un véhicule</h2>
		<form method='POST' action='index.php' class='validate'>";
			echo "<div class='form'>Modèle: <input type='text' name='modele' class='validate[required]' value=''><br />
				Immatriculation: <input type='text' name='immat' class='validate[required]' value=''><br />
				Date de fin d'assurance: <input type='text' name='dateAssu' class='validate[required] datepicker' value=''><br />
				Kilomètrage: <input type='text' name='km' class='validate[required]' value=''><br />
				<input type='submit' name='valid_ajout_vehicule' value='Ajouter'>
		</div></form></div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
	
		case 'ajouterAgent':
		afficher_menu ();
		echo "<div class='content'>
		<h2>Ajouter un agent</h2>
		<form method='POST' action='index.php' class='validate'>";
			echo "<div class='form'>Nom: <input type='text' name='nom' class='validate[required]' value=''><br />
				Prénom: <input type='text' name='prenom' class='validate[required]' value=''><br />
				Mail: <input type='text' name='mail' class='validate[required,custom[email]]' value=''><br />
				Permis: <input type='text' name='permis' class='validate[required]' value=''><br />
				Poste: <select name='poste' class='validate[required]'>";
				select_poste_agent();
			echo "</select><br />";
			echo "<input type='hidden' name='login' value='8'><br /><br />
				<input type='submit' name='valid_ajout_agent' value='Ajouter'>
				</div></form></div>";
			echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;

	
	case 'supprimerVehicule_1':
		afficher_menu ();
		echo "<div class='content'>";
		echo "<div class='overflow'><table border=1><table border=1 >";
		echo '<tr><th>modèle</th><th>immatriculation</th><th>Date assurance</th><th>Kilomètrage</th></tr>';
		foreach ($table_vehicule as $value_vehicule)
			{ 
				echo '<tr><td>'.$value_vehicule["mod_vehicule"].'</td><td>'.$value_vehicule["immat_vehicule"].'</td><td>'.$value_vehicule["date_assu_vehicule"].'</td><td>'.$value_vehicule["km_vehicule"].' Km</td>
					<td><form method="POST" action="index.php"><input type="submit" name="supprimer_vehicule" value="supprimer">
					<input type="hidden" name="immat" value="'.$value_vehicule["immat_vehicule"].'"></form></td>';
			}
		echo "</table></div></div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
		
	case 'supprimerVehicule_2':
		afficher_menu ();
		echo "<div class='content'>
			<h2>Suppression d'un vehicule</h2>
			<form method='POST' action='index.php'>";
		echo "Etes vous sûr(e) de vouloir supprimer le vehicule \"".$_POST['immat']."\" de votre base de données ? <br />";
		echo "<div class=lien><input type='submit' name='sup_vehicule_oui' value='OUI'><input type='submit' name='sup_vehicule_non' value='NON'>
				<input type='hidden' name='immat' value='".$_POST['immat']."'></div></form>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
	
	case 'supprimerAgent_1':
		afficher_menu ();
		echo "<div class='content'>";
		echo "<div class='overflow'><table border=1><table border=1 >";
		echo "<tr><th>Nom</th><th>Prénom</th><th>Mail</th><th>Permis</th><th>Poste</th><th></th></tr>";
		foreach ($table_agent as $value_agent)
			{ 
				echo '<tr><td>'.$value_agent["nom_agent"].'</td><td>'.$value_agent["prenom_agent"].'</td><td>'.$value_agent["mail_agent"].'</td><td>'.$value_agent["permis_agent"].'</td><td>'.$value_agent["libelle_poste"].'</td>
					<td><form method="POST" action="index.php"><input type="submit" name="supprimer_agent" value="supprimer">
					<input type="hidden" name="nom" value="'.$value_agent["nom_agent"].'"></form></td>';
			}
		echo "</table></div></div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
	
	case 'supprimerAgent_2':
		afficher_menu ();
		echo "<div class='content'>
			<h2>Suppression d'un agent</h2>
			<form method='POST' action='index.php'>";
		echo "Etes vous sûr(e) de vouloir supprimer l'agent \"".$_POST['nom']."\" de votre base de données ? <br />";
		echo "<div class=lien><input type='submit' name='sup_agent_oui' value='OUI'><input type='submit' name='sup_agent_non' value='NON'>
				<input type='hidden' name='nom' value='".$_POST['nom']."'></div></form>";
		echo "<div id='footer'>
		<h6>Copyleft to the owner</h6>
		</div>";
	break;
	
	case 'supprimerDemande':
		afficher_menu ();
		echo "<div class='content'>
			<h2>Suppression d'une demande</h2>";
		$choix = $_POST['choix'];
		$bdd = connectBdd();
		$reponse = $bdd -> query("SELECT demande_resa.id_demande, agent.nom_agent, agent.prenom_agent FROM demande_resa JOIN agent WHERE demande_resa.id_demande = ".$choix." AND demande_resa.id_agent_demande = agent.id_agent");
		while ($donnees = $reponse->fetch())
		{
		echo "<form method='POST' action='index.php'>Etes vous sûr(e) de vouloir supprimer la demande de réservation \"".$donnees['nom_agent']." ".$donnees['prenom_agent']."\" de votre base de données ? <br />";
		echo "<input type='hidden' name='choix' value='".$donnees['id_demande']."'>";
		}
		$reponse->closeCursor();
		echo "<div class=lien><input type='submit' name='sup_demande_oui' value='OUI'><input type='submit' name='sup_demande_non' value='NON'>
			</form>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
	
	case 'indispo_vehicule':
		afficher_menu ();
		echo "<div class='content'>
		<h2>Mettre un véhicule en entretien</h2>";
		echo "<div class='overflow'><table border=1><table border=1 >";
		echo '<tr><th>modèle</th><th>immatriculation</th><th>Date assurance</th><th>Kilomètrage</th></tr>';
		foreach ($table_vehicule as $value_vehicule)
			{ 
				echo '<tr><td>'.$value_vehicule["mod_vehicule"].'</td><td>'.$value_vehicule["immat_vehicule"].'</td><td>'.$value_vehicule["date_assu_vehicule"].'</td><td>'.$value_vehicule["km_vehicule"].' Km</td>
					<td><form method="POST" action="index.php">
					<input type="submit" name="indispo_vehicule" value="entretien">
					<input type="hidden" name="modele" value="'.$value_vehicule["mod_vehicule"].'">
					<input type="hidden" name="immat" value="'.$value_vehicule["immat_vehicule"].'">
					<input type="hidden" name="id" value="'.$value_vehicule["id_vehicule"].'">
					</form></td>';
			}
		echo "</table></div></div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
	
	case 'indisponibiliteVehicule_2':
		afficher_menu ();
		echo "<div class='content'>
		<h2>Mettre un véhicule en entretien</h2>
		
		<form method='POST' action='index.php' class='validate'> ";
			echo "Modèle: ".$_POST['modele']."<br />
				Immatriculation: ".$_POST['immat']."<br />
				Date de début d'indisponibilité: <input type='text' name='date_deb_indispo' class='validate[required] datetime' value=''><br />
				Date de fin d'indisponibilité: <input type='text' name='date_fin_indispo' class='validate[required] datetime' value=''><br />
				<input type='hidden' name='id_vehicule' value='".$_POST['id']."'><br />
				<input type='submit' name='valid_indispo_vehicule' value='confirmer'>
		</form>";	
		echo "</div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
	
	case 'modifIndispo_vehicule':
		afficher_menu ();
		echo "<div class='content'>
		<h2>Modifier un véhicule en entretien</h2>";
		echo "<div class='overflow'><table border=1>";
		echo "<tr><th>modèle</th><th>immatriculation</th><th>Date debut entretien</th><th>Date fin entretien</th></tr>
		<form method='POST' action='index.php' class='validate'>";
		$entretien = modif_entretien();
			foreach ($entretien as $value_vehicule)
			{ 
				echo '<tr><td>'.$value_vehicule["mod_vehicule"].'</td><td>'.$value_vehicule["immat_vehicule"].'</td><td>'.$value_vehicule["indispo_deb"].'</td><td>'.$value_vehicule["indispo_fin"].'</td>
					<td><form method="POST" action="index.php">
					<input type="submit" name="modif_entretien" value="modifier">
					<input type="hidden" name="modele" value="'.$value_vehicule["mod_vehicule"].'">
					<input type="hidden" name="immat" value="'.$value_vehicule["immat_vehicule"].'">
					<input type="hidden" name="id" value="'.$value_vehicule["id_indispo"].'">
					</form></td>';
			}
		echo "</form></table></form>";	
		echo "</div></div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
	
	case 'modifIndispo_vehicule_2':
		afficher_menu ();
		echo "<div class='content'>
		<h2>Modifier un véhicule en entretien</h2>
		
		<form method='POST' action='index.php' class='validate'> ";
			echo "Modèle: ".$_POST['modele']."<br />
				Immatriculation: ".$_POST['immat']."<br />
				Date de début d'indisponibilité: <input type='text' name='date_deb_indispo' class='validate[required] datetime' value=''><br />
				Date de fin d'indisponibilité: <input type='text' name='date_fin_indispo' class='validate[required] datetime' value=''><br />
				<input type='hidden' name='id_indispo' value='".$_POST['id']."'><br />
				<input type='submit' name='valid_modif_entretien' value='confirmer'>
		</form>";	
		echo "</div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
	
	case 'liste_reservation': 
		afficher_menu ();
		echo "<div class='content'>";
		echo "<h2>Consulter les réservations</h2>";
		echo "<div class='overflow'><table border=1 >";
		echo '<tr><th>modèle</th><th>immatriculation</th><th>Debut réservation</th><th>Fin réservation</th><th>Agent</th></tr>';
		getDonnees_reservations() ;
		echo "</table><br />";
		echo "</div></div>";
		echo "<div id='footer'>
			<h6>Copyleft to the owner</h6>
			</div>";
	break;
}
?>				
</body>

</html>