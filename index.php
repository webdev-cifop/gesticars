<?php
require ('modele.php');

if(!isset($_SESSION)){
	session_start();
	If (!isset($_SESSION['connect'])){
		$_SESSION['connect'] = 0;
	}
	$page='identification';
}

If (isset($_GET['page']))
{
	$page=$_GET['page'];
}
	
$table_vehicule=getDonnees_vehicule();
$table_agent=getDonnees_agent();


/////////////////////////////////////////// DEBUT attribution $page  /////////////////////////////////////////////////
If($_SESSION['connect']==1)
{	
	If (($_SESSION['premiere']) and ($_SESSION['nom_role']=='admin'))
	{
		$page='AfficherDemande';
		$_SESSION['premiere']=false;
	}
	
	If (($_SESSION['premiere']) and ($_SESSION['nom_role']!='admin'))
	{
		$page='demandeResa';
		$_SESSION['premiere']=false;
	}
	
	If (isset($_POST['deconnecter']))
	{
		session_destroy();
		header("Location: ./index.php");
	}
	
	If (isset($_POST['demande_resa']) and (empty($_POST['mail'])) and (empty($_POST['permis'])))
	{
		save_demande();
		echo "<div id='ok'>Votre demande à bien été enregistré</div>";
		session_destroy();
	}
	
	If (isset($_POST['demande_resa']) and (!empty($_POST['mail'])) and (empty($_POST['permis'])))
	{
		save_demande();
		update_mail_agent();
		echo "<div id='ok'>Votre demande ainsi que votre mail ont bien été enregistré</div>";
		session_destroy();
	}
	
	If (isset($_POST['demande_resa']) and (!empty($_POST['mail'])) and (!empty($_POST['permis'])))
	{
		save_demande();
		update_mail_permis_agent();
		echo "<div id='ok'>Votre demande ainsi que votre mail et N° de permis ont bien été enregistré</div>";
		session_destroy();
	}
	
	If (isset($_POST['demande_resa']) and (empty($_POST['mail'])) and (!empty($_POST['permis'])))
	{
		save_demande();
		update_permis_agent();
		echo "<div id='ok'>Votre demande ainsi que votre N° de permis ont bien été enregistré</div>";
		session_destroy();

	}
	
	If (isset($_POST['modif_vehicule']))
	{
		$page='modifierVehicule_2';
	}
	
	If (isset($_POST['modif_agent']))
	{
		$page='modifierAgent_2';
	}
	
	If (isset ($_POST['supprimer_vehicule']))
	{
		$page='supprimerVehicule_2';
	}
	
		If (isset ($_POST['supprimer_agent']))
	{
		$page='supprimerAgent_2';
	}
	
		If (!empty($_POST['choix']) AND (isset($_POST['supprimer_demande'])))
	{
		$page='supprimerDemande';
	}
	
	If (isset($_POST['indispo_vehicule']))
	{
		$page='indisponibiliteVehicule_2';
	}
	
	If (isset($_POST['modif_entretien']))
	{
		$page='modifIndispo_vehicule_2';
	}
}	

/////////////////////////////////////////////  FIN attribution $page  ////////////////////////////////////////////////	

//////////////////////////////////////////// DEBUT attribution des Fonctions  ////////////////////////////////////////
	If (isset($_POST['valid_modif_entretien']))
	{
		valid_modif_entretien();
		header("Location: ./index.php?page=modifIndispo_vehicule");
	}
	
		If (isset($_POST['valid_indispo_vehicule']))
	{
		indispo_entretien_vehicule();
		header("Location: ./index.php?page=consulterVehicule");
	}
	
	If (!empty($_POST['choix']) AND (isset($_POST['valider_demande'])))
	{
		valider_demande();
		header("Location: ./index.php?page=AfficherDemande");
	}
	
	If (empty($_POST['choix']) AND (isset($_POST['valider_demande'])))
	{
		echo "<span color='red'>Vous devez faire une selection !</span>";
		header("Location: ./index.php?page=AfficherDemande");
	}
	
	
	If (empty($_POST['choix']) AND (isset($_POST['supprimer_demande'])))
	{
		echo "<span color='red'>Vous devez faire une selection !</span>";
		header("Location: ./index.php?page=AfficherDemande");
	}
	
	If (isset($_POST['sup_demande_oui']))
	{
		supprimer_demande();
		header("Location: ./index.php?page=AfficherDemande");
	}
	
	If (isset($_POST['sup_demande_non']))
	{
		header("Location: ./index.php?page=AfficherDemande");
	}
	
	If (isset($_POST['valid_modif_vehicule']))
	{
		modif_vehicule();
		header("Location: ./index.php?page=consulterVehicule");
	}

		If (isset($_POST['valid_modif_agent']))
	{
		modif_agent();
		header("Location: ./index.php?page=consulterAgent");
	}
	
	If (isset($_POST['valid_ajout_vehicule']))
	{
		ajout_vehicule();
		header("Location: ./index.php?page=consulterVehicule");
	}
	
		If (isset($_POST['valid_ajout_agent']))
	{
		ajout_agent();
		header("Location: ./index.php?page=consulterAgent");
	}
	
	If (isset($_POST['sup_vehicule_oui']))
	{
		delete_vehicule();
		header("Location: ./index.php?page=consulterVehicule");
	}
	
	If (isset($_POST['sup_vehicule_non']))
	{
		header("Location: ./index.php?page=consulterVehicule");
	}
	
		If (isset($_POST['sup_agent_oui']))
	{
		delete_agent();
		header("Location: ./index.php?page=consulterAgent");
	}
	
		If (isset($_POST['sup_agent_non']))
	{
		header("Location: ./index.php?page=consulterAgent");
	}
	
//////////////////////////////////////////  FIN attribution des fonctions  /////////////////////////////////////////////

include ('vue.php');
?>