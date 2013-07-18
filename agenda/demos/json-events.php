<?php

//	$year = date('Y');
//	$month = date('m');
	try
	{
		// On se connecte ?ySQL
		$pdo = new PDO('mysql:host=localhost;dbname=resauto', 'admin', 'resauto');
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arr? tout
			die('Erreur : '.$e->getMessage());
	}
	$req0 = $pdo->query("SELECT * FROM reservation");
	for ($i=0; $row = $req0->fetch();$i++)
	{
		$id_agent = $row['id_agent_agent'];
		$req1 = $pdo->query("SELECT * FROM agent WHERE id_agent = $id_agent");
		$agent = $req1->fetch();
		$id_poste = $agent['id_poste_poste'];
		$req2 = $pdo->query("SELECT * FROM poste WHERE id_poste = $id_poste");
		$poste = $req2->fetch();
		$libelle = $poste['libelle_poste'];
		if ($poste['libelle_poste'] == 'commercial') {$couleur = '#bb55ff';}
		else {if ($poste['libelle_poste'] == 'responsable') {$couleur = '#0000ff';} 
			else {if ($poste['libelle_poste'] == 'professeur') {$couleur = '#efac3a';}
				else {$couleur = '#c2c2c2';}
			}
		}
		$id_vehicule = $row['id_vehicule_vehicule'];
		$req3 = $pdo->query("SELECT * FROM vehicule WHERE id_vehicule = $id_vehicule");
		$vehicule = $req3->fetch();
		
		$mes_events[$i] = array(
		'title' => "".$vehicule['immat_vehicule']." : ".utf8_encode($agent['prenom_agent'])." " .utf8_encode($agent['nom_agent'])." : ".utf8_encode($row['dest_reservation'])." - ".utf8_encode($row['motif_reservation'])."",
		'start' => "".$row['deb_reservation']."",
		'end' => "".$row['fin_reservation']."",
		'backgroundColor' => $couleur,
		'allDay' => false);
	}
	$req4 = $pdo->query("SELECT * FROM indisponibilite WHERE id_motif_motif_indisponibilite = 2 ");
	for ($j=$i; $dispo = $req4->fetch();$j++)
	{
		
			$couleur = '#ffd000';
			$id_vehicule = $dispo['id_vehicule_vehicule'];
			$req5 = $pdo->query("SELECT * FROM vehicule WHERE id_vehicule = $id_vehicule");
			$vehicule = $req5->fetch();

			$mes_events[$j] = array(
			'title' => $vehicule['immat_vehicule']." : entretien",
			'start' => $dispo['indispo_deb'],
			'end' => $dispo['indispo_fin'],
			'backgroundColor' => $couleur,
			'allDay' => false
			);	
	}
	echo json_encode($mes_events);
?>	
