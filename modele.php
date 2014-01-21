<?php
	function connectBdd()
	{
		try
		{
			$bdd = new pdo ('mysql:host = localhost; dbname=gesticars', 'root', '');
		}
		catch (Exception $e)
		{
			die ('Erreur: '.$e->getMessage());
		}
		$bdd->exec("SET CHARACTER SET utf8"); //forcage de l'utf-8
		return $bdd;
	}
	
	function valider_demande() // fonction qui valide une demande en rservation effective.
	{
		$bdd = connectBdd();
		$reponse = $bdd -> prepare('SELECT * FROM demande_resa WHERE :choix = id_demande');
		$reponse->execute(array(
		':choix' => $_POST['choix']
		));
		while ($donnees = $reponse->fetch())
		{
			$requete = $bdd->prepare('INSERT INTO reservation(deb_reservation, fin_reservation, dest_reservation, motif_reservation, id_agent_agent, id_vehicule_vehicule)
			VALUE(:date_deb, :date_fin, :dest, :motif, :agent, :vehicule)');
			$requete->execute(array(
			'date_deb'=> $donnees['demande_date_deb'],
			'date_fin' => $donnees['demande_date_fin'], 
			'dest'=> $donnees['demande_destination'],
			'motif' => $donnees['demande_motif'],
			'agent' => $donnees['id_agent_demande'],
			'vehicule' => $_POST['select_vehicule']
			));
			$requete->closeCursor();
			
			$request = $bdd->prepare('INSERT INTO indisponibilite(indispo_deb, indispo_fin, id_motif_motif_indisponibilite, id_vehicule_vehicule)
			VALUE(:date_deb, :date_fin, :id_motif, :vehicule)');
			$request->execute(array(
			'date_deb'=> $donnees['demande_date_deb'],
			'date_fin' => $donnees['demande_date_fin'], 
			'id_motif' => 1,
			'vehicule' => $_POST['select_vehicule']
			));
			$request -> closeCursor();
			
			$delete = $bdd->prepare('DELETE FROM demande_resa WHERE :choix = id_demande');
			$delete->execute(array(
			':choix' => $_POST['choix']
			));
			$delete->closeCursor();
		}
	}
	
	function supprimer_demande()
	{
		$bdd = connectBdd();
		$delete = $bdd->prepare('DELETE FROM demande_resa WHERE :choix = id_demande');
			$delete->execute(array(
			':choix' => $_POST['choix']
			));
			$delete->closeCursor();
	}
	
	function mysqlFormatDate($date_us) // pour convertir le datetimepicker pour enregistrement ds la BDD
	{	
		$datej= explode(' ', $date_us);
		$date= explode('/', $datej[0]);
		$date = array_reverse($date);
		$date_us = implode('-', $date);
		$date= array ($date_us, $datej[1]);
		$date_us= implode (' ', $date);
		return $date_us;
	}
	
	function mysqlDateFormat($dateUs) // pour convertir le datepicker pour enregistrement dans la bdd
	{
		$datej = explode('/', $dateUs);
		$date = array_reverse($datej);
		$dateUs = implode('-', $date);
		return $dateUs;
	}
	
	function save_demande() // enregistrement de la demande de résa effectué par l'agent
	{
		$bdd = connectBdd();
		$agent = $_POST['agent'];
		$date_deb = $_POST['deb_reservation'];
		$date_fin = $_POST['fin_reservation'];
		$dest = $_POST['destination'];
		$motif = $_POST['motif'];
		
		$date_deb = mysqlFormatDate($date_deb);
		$date_fin = mysqlFormatDate($date_fin);
		
		$reponse = $bdd->prepare('INSERT INTO demande_resa(id_demande, demande_date_deb, demande_date_fin, demande_destination, demande_motif, id_agent_demande)
		VALUE("", :date_deb, :date_fin, :dest, :motif, :agent)');
		$reponse->execute(array(
		'date_deb'=>$date_deb,
		'date_fin'=>$date_fin,
		'dest'=>$dest,
		'motif'=>$motif,
		'agent'=>$agent ));
		$reponse->closeCursor();
		return;
	}
	
	function update_mail_permis_agent() // pour mettre à jour l'email et le N° de permis si ils sont renseignés à la demande de résa par l'agent
	{
		$bdd = connectBdd();
		$mail = $_POST['mail'];
		$permis = $_POST['permis'];
		$agent = $_POST['agent'];
		$req = $bdd->prepare("UPDATE agent SET mail_agent = :mail, permis_agent = :permis WHERE id_agent = $agent ");
		$req->execute(array(
		':mail' => $mail, 
		':permis'=> $permis ));
		$req->closeCursor();
		return;
	}
	
	function update_mail_agent() // pour mettre à jour uniquement l'email si il est renseignés à la demande de résa par l'agent
	{
		$bdd = connectBdd();
		$mail = $_POST['mail'];
		$agent = $_POST['agent'];
		$req = $bdd->prepare("UPDATE agent SET mail_agent = :mail WHERE id_agent = $agent ");
		$req->execute(array(
		':mail' => $mail 
		 ));
		$req->closeCursor();
		return;
	}
	
	function update_permis_agent() // pour mettre à jour uniquement le n° de permis si il est renseignés à la demande de résa par l'agent
	{
		$bdd = connectBdd();
		$permis = $_POST['permis'];
		$agent = $_POST['agent'];
		$req = $bdd->prepare("UPDATE agent SET permis_agent = :permis WHERE id_agent = $agent ");
		$req->execute(array( 
		':permis'=> $permis ));
		$req->closeCursor();
		return;
	}
	
	function getDonnees_vehicule() // recuperation des données vehicules dans la bdd
	{
		$bdd = connectBdd();
		$reponse = $bdd -> query('SELECT * FROM vehicule');
		$tab = $reponse -> fetchAll(PDO::FETCH_ASSOC);
		$reponse -> closeCursor();
		return $tab;
	}

	function getDonnees_agent() // recuperation des données agents dans la bdd
	{
		$bdd = connectBdd();
		$reponse = $bdd -> query('SELECT agent.*, poste.libelle_poste FROM agent, poste WHERE agent.id_poste_poste = poste.id_poste ORDER BY nom_agent');
		$result = $reponse -> fetchAll(PDO::FETCH_ASSOC);
		$reponse -> closeCursor();
		return $result;
	}
	
	function modif_vehicule() // update de la bdd en cas de modif vehicule
	{
	$bdd = connectBdd();
	$modele = $_POST['modif_modele'];
	$immat = $_POST['modif_immat'];
	$assu = $_POST['modif_date'];
	$id = $_POST['id_vehicule'];
	$km = $_POST['modif_km'];
	
	$assu =	mysqlDateFormat($assu);
	
	$req=$bdd->prepare("UPDATE vehicule SET mod_vehicule= :modele, immat_vehicule= :immat, date_assu_vehicule= :dateAssu, km_vehicule= :km  WHERE id_vehicule= :id");
	$req->execute(array(
    ':modele' => $modele, 
	':immat'=> $immat,
	':dateAssu'=> $assu,
	':id'=> $id,
	':km' => $km
	));
	$req->closeCursor();
	return;
	}
	
	function modif_agent() // update de la bdd en cas de modif agent
	{
	$bdd = connectBdd();
	$nom = $_POST['modif_nom'];
	$prenom = $_POST['modif_prenom'];
	$mail = $_POST['modif_mail'];
	$id = $_POST['id_agent'];
	$permis = $_POST['modif_permis'];
	$poste = $_POST['modif_poste'];
	
	$req=$bdd->prepare("UPDATE agent SET nom_agent= :nom, prenom_agent= :prenom, mail_agent= :mail, permis_agent= :permis, id_poste_poste= :poste  WHERE id_agent= :id");
	$req->execute(array(
    ':nom' => $nom, 
	':prenom'=> $prenom,
	':mail'=> $mail,
	':id'=> $id,
	':permis' => $permis,
	':poste' => $poste
	));
	$req->closeCursor();
	return;
	}
	
	function ajout_vehicule() // ajouter un vehicule dans la bdd
	{
	$bdd = connectBdd();
	$modele = $_POST['modele'];
	$immat = $_POST['immat'];
	$assu = $_POST['dateAssu'];
	$km = $_POST['km'];
	
	$assu =	mysqlDateFormat($assu);
	
	$req=$bdd->prepare('INSERT INTO vehicule(id_vehicule, immat_vehicule, mod_vehicule, date_assu_vehicule, km_vehicule) VALUES("", :immat, :modele, :dateAssu, :km)');
	$req->execute(array(
    'immat'=> $immat,
	'modele' => $modele, 
	'dateAssu'=> $assu,
	'km' => $km
	));
	$req->closeCursor();
	return;
	}
	
	function ajout_agent() // ajouter un agent dans la bdd
	{
	$bdd = connectBdd();
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['mail'];
	$permis = $_POST['permis'];
	$poste = $_POST['poste'];
	$login = $_POST['login'];
	
	$req=$bdd->prepare('INSERT INTO agent(id_agent, nom_agent, prenom_agent, mail_agent, permis_agent, id_poste_poste, id_login_login) VALUES("", :nom, :prenom, :mail, :permis, :poste, :login)');
	$req->execute(array(
    'nom' => $nom,
	'prenom' => $prenom,
	'mail'=> $mail,
	'permis' => $permis,
	'poste' => $poste,
	'login' => $login
	));
	$req->closeCursor();
	return;
	}
	
	function select_poste_agent() //recuperation des postes dans la bdd
	{
	$bdd = connectBdd();
	$req = $bdd->query('SELECT * FROM poste');
		while ($data = $req->fetch())
		{
			echo "<option value='".$data['id_poste']."'>".$data['libelle_poste']."</option>";
		}
	}
	
	function delete_vehicule()
	{
	$bdd = connectBdd();
	$immat= $_POST['immat'];
	$req= $bdd->prepare('DELETE FROM vehicule WHERE immat_vehicule= :immat');
	$req->execute(array(
	'immat'=> $immat,
	));
	$req->closeCursor();
	return;
	}
	
	function delete_agent()
	{
	$bdd = connectBdd();
	$nom= $_POST['nom'];
	$req= $bdd->prepare('DELETE FROM agent WHERE nom_agent= :nom');
	$req->execute(array(
	'nom'=> $nom,
	));
	$req->closeCursor();
	return;
	}
	
	function dispo_vehicule()
	{
	
	/* Dans cette fonction j'ai concatené tous les elements de mes requetes et fais des explodes afin de ressortir le résultat de mes requêtes dans
	un tableau simple, non multidimensionel, afin de pouvoir utiliser la fonction array_diff qui ne fonctionne pas avec des tableau multi-dimensionnels*/
	
		$bdd = connectBdd();
		$requete = $bdd->query("SELECT id_vehicule FROM vehicule");
		$id_vehicule = ""; //initialisation de la variable $id_vehicule
		while ($data=$requete->fetch())
		{
		 $id_vehicule .= $data['id_vehicule'].";"; 
		}
		$id_vehicule = explode(";", $id_vehicule); // pour enlever les ";"
		$vide = array_pop($id_vehicule); // pour enlever la dernière ligne vide du tableau et eviter erreur sql car id=vide sinon
		// $id_vehicule est un tableau qui contient tout les id des vehicules existants

		$req = $bdd->query('SELECT demande_resa.*, agent.nom_agent, agent.prenom_agent FROM demande_resa JOIN agent WHERE demande_resa.id_agent_demande = agent.id_agent ORDER BY demande_resa.demande_date_deb');
		$recount = $req->rowCount();
			if ($recount >=1)
			{
				while ($donnees=$req->fetch())
				{
					$id_demande = $donnees['id_demande'];
								
					$verif = $bdd->prepare("SELECT DISTINCT id_vehicule_vehicule FROM indisponibilite WHERE :demande_date_deb > indispo_deb AND :demande_date_deb < indispo_fin
																									OR :demande_date_fin > indispo_deb AND :demande_date_fin < indispo_fin
																									OR :demande_date_deb < indispo_deb AND :demande_date_fin > indispo_fin"); // test date pour verif dispo
					$verif->execute(array(
					'demande_date_deb' => $donnees['demande_date_deb'],
					'demande_date_fin' => $donnees['demande_date_fin'],
					));
					$count = $verif->rowCount();
			
					if ($count >= 1) //si il y a des résa dans la même tranche horaire-date
					{
						$id_exist = ""; //initialisation de la variable $id_exist
						while ($data = $verif->fetch())
						{
						$id_exist .= $data['id_vehicule_vehicule'].";"; //concatenation à chaque parcoure de boucle
						}
						$id_reserve = explode(";", $id_exist); // pour enlever les ";"
						$vide = array_pop($id_reserve); // pour enlever la dernière ligne vide du tableau et eviter erreur sql car id=vide sinon
						// $id_reserve contient tous les id des vehicule qui sont déjà réservé pour cette periode
						
						$dispo = array_diff($id_vehicule, $id_reserve); // compare le tableau $id_vehicule avec le tableau $id_reserve et retourne la différence.
						
						echo "<tr><td>".$donnees['nom_agent']."</td><td>".$donnees['prenom_agent']."</td><td>".$donnees['demande_date_deb']."
						</td><td>".$donnees['demande_date_fin']."</td><td>".$donnees['demande_destination']."</td><td>".$donnees['demande_motif']."</td>
						<td><select name='select_vehicule'>";
				
						foreach ($dispo as $key => $value) // dans le tableau retourné par le array_diff c'est à dire le tableau des vehicules dispo à cette date
						{
							$request = $bdd->query("SELECT immat_vehicule FROM vehicule WHERE $value = id_vehicule");
							while ($donnees = $request->fetch())
							{
								echo "<option value=".$value.">".$donnees['immat_vehicule']."</option>"; //affichage dans un select des numero immat
							}
						}
						echo "</td><td><input type='radio' name='choix' value='".$id_demande."'></td></tr>";
					}
					else
					{
						echo "<tr><td>".$donnees['nom_agent']."</td><td>".$donnees['prenom_agent']."</td><td>".$donnees['demande_date_deb']."
						</td><td>".$donnees['demande_date_fin']."</td><td>".$donnees['demande_destination']."</td><td>".$donnees['demande_motif']."</td>
						<td><select name='select_vehicule'>";
						$request = $bdd->query("SELECT immat_vehicule, id_vehicule FROM vehicule");
						while ($donnees = $request->fetch())
						{
							echo "<option value=".$donnees['id_vehicule'].">".$donnees['immat_vehicule']."</option>";
						}
						echo "</td><td><input type='radio' name='choix' value='".$id_demande."'></td></tr>";
					}
				}
				$requete->closeCursor();
				$req->closeCursor();
				$verif->closeCursor();
				$request->closeCursor();
			}
	}
	
	function indispo_entretien_vehicule() // mise en indiponibilité d'un vehicule en cas d'entretien
	{
	$bdd = connectBdd();
	
	$date_deb_indispo = $_POST['date_deb_indispo'];
	$date_fin_indispo = $_POST['date_fin_indispo'];
	$id_vehicule = $_POST['id_vehicule'];
	
	$date_deb_indispo = mysqlFormatDate($date_deb_indispo);
	$date_fin_indispo = mysqlFormatDate($date_fin_indispo);
	
	$request = $bdd->prepare('INSERT INTO indisponibilite(indispo_deb, indispo_fin, id_motif_motif_indisponibilite, id_vehicule_vehicule)
			VALUE(:date_deb, :date_fin, :id_motif, :vehicule)');
	$request->execute(array(
	'date_deb'=> $date_deb_indispo,
	'date_fin' => $date_fin_indispo, 
	'id_motif' => 2,
	'vehicule' => $id_vehicule
	));
	$request->closeCursor();
	return;
	}
	
	function modif_entretien() //modifier les dates pour un vehicule déclaré en entretien
	{
		$bdd = connectBdd();
		$reponse = $bdd -> query("SELECT indisponibilite.*, vehicule.immat_vehicule, vehicule.mod_vehicule FROM indisponibilite, vehicule WHERE indisponibilite.id_vehicule_vehicule = vehicule.id_vehicule AND indisponibilite.id_motif_motif_indisponibilite = 2");
		$entretien = $reponse -> fetchAll(PDO::FETCH_ASSOC); 
		$reponse -> closeCursor();
		return $entretien;
	}
	
	function valid_modif_entretien() // update de la bdd à la validation des modifs
	{
	$bdd = connectBdd();
	
	$date_deb_indispo = $_POST['date_deb_indispo'];
	$date_fin_indispo = $_POST['date_fin_indispo'];
	$id_indispo = $_POST['id_indispo'];
	
	$date_deb_indispo = mysqlFormatDate($date_deb_indispo);
	$date_fin_indispo = mysqlFormatDate($date_fin_indispo);
	
	$request = $bdd->prepare('UPDATE indisponibilite SET indispo_deb= :indispo_deb, indispo_fin= :indispo_fin WHERE id_indispo= :id_indispo');
	$request->execute(array(
	'indispo_deb'=> $date_deb_indispo,
	'indispo_fin' => $date_fin_indispo, 
	'id_indispo' => $id_indispo
	));
	$request->closeCursor();
	return;
	}
	
	function getDonnees_reservations() // recuperation des résa existantes dans la bdd
	{
		$date = date('Y-m-d H:i');
		$bdd = connectBdd();
		$reponse = $bdd -> query('SELECT reservation.*, agent.*, vehicule.* FROM agent, reservation, vehicule WHERE reservation.id_agent_agent = agent.id_agent AND reservation.id_vehicule_vehicule = vehicule.id_vehicule ORDER BY reservation.deb_reservation');
		$resa = $reponse -> fetchAll(PDO::FETCH_ASSOC);
			foreach ($resa as $value_resa)
			{ 
				echo '<tr><td>'.$value_resa["mod_vehicule"].'</td><td>'.$value_resa["immat_vehicule"].'</td><td>'.$value_resa["deb_reservation"].'</td><td>'.$value_resa["fin_reservation"].'</td><td>'.$value_resa["nom_agent"].' '.$value_resa["prenom_agent"].'</td></tr>';
			}
		$reponse -> closeCursor();
		return;
	}

	function afficher_menu () // affichage du menu car ca faisait long de l'ecrire à chaque page dans la vue
	{
	echo "<div id='main'> 
			<div id='top'>
			<h1>ESPACE ADMINISTRATEUR</h1>
			</div>
			
			<div id='side'>
			<h2>Menu</h2>
				<ul>
					<li>Espace validation
							<ul class='sous_menu'>
									<li><a href='index.php?page=AfficherDemande'/>Validation des demandes</a></li>
							</ul>
					</li>	
					<li>Gestion agents
							<ul class='sous_menu'>
									<li><a href='index.php?page=consulterAgent'/>Consulter agent</a></li>
									<li><a href='index.php?page=ajouterAgent'/>Ajouter agent</a></li>
									<li><a href='index.php?page=modifierAgent_1'/>Modifier agent</a></li>
									<li><a href='index.php?page=supprimerAgent_1'/>Supprimer agent</a></li>
							</ul>
					</li>	
					<li>Gestion véhicule
							<ul class='sous_menu'>
									<li><a href='index.php?page=consulterVehicule'/>Consulter véhicule</a></li>
									<li><a href='index.php?page=ajouterVehicule'/>Ajouter véhicule</a></li>
									<li><a href='index.php?page=modifierVehicule_1'/>Modifier véhicule</a></li>
									<li><a href='index.php?page=supprimerVehicule_1'/>Supprimer véhicule</a></li><br />
									<li><a href='index.php?page=indispo_vehicule'/>Mettre vehicule en entretien</a></li>
									<li><a href='index.php?page=modifIndispo_vehicule'/>Modifier vehicule en entretien</a></li>
							</ul>
					</li>
					<li>Espace affichage
					
						<ul class='sous_menu'>
									<li><a href='agenda/demos/agenda.html'/>Afficher calendrier des réservations<a></li>
									<li><a href='index.php?page=liste_reservation'/>Afficher tableau des réservations<a></li>
						</ul>
					</li>
				</ul>
				<form method='post' action:'index.php'><input type='submit' name='deconnecter' value='deconnecter' class='deconnect'></form>
			</div>";
	}

?>