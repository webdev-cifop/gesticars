<?php
require ('modele.php');
	/*	----------------------------------------------------------------------------------------
		Acces à l'entité role avec son ID:
		- en entrée : $id_role (id du role)
		- en sortie : données de l'entité 'role'
		--------------------------------------------------------------------------------------*/
		
	function lire_role($id_role) {
		$bdd = connectBdd();
		$reponse = $bdd->prepare('SELECT * FROM role WHERE id_role = :ID_role ');
		$reponse->execute(array(
			'ID_role' => $id_role
		));
		$donnees = $reponse->fetch();
		$reponse->closeCursor();
		return $donnees;
	}
	
		/*	------------------------------------------------------------------------------------
		Acces à l'entité role avec son nom :
		- en entrée : $nom_role (nom du role)
		- en sortie : données de l'entité 'role'
		--------------------------------------------------------------------------------------*/
		
	function lire_nom_role($nom_role) {
		$bdd = connectBdd();

		$reponse = $bdd->prepare('SELECT * FROM role WHERE nom_role = :nom_role ');
		$reponse->execute(array(
			'nom_role' => $nom_role
		));
		$donnees = $reponse->fetch();
		$reponse->closeCursor();
		return $donnees;
	}

	
	/*	--------------------------------------------------------------------------------------
		Acces à l'entité login avec son login :
		- en entrée : $login (login de l'utilisateur)
		- en sortie : donnees de l'entité 'login'
		------------------------------------------------------------------------------------*/
		
	function lire_login($login) {
		$bdd = connectBdd();
		$reponse = $bdd->prepare('SELECT * FROM login WHERE nom_login = :login ');
		$reponse->execute(array(
			'login' => $login
		));
		$donnees = $reponse->fetch();
		$reponse->closeCursor();
		return $donnees;
	}
	
	/*	---------------------------------------------------------------------------------------------------------------------------------------
		Créer l'entité login :
		- en entrée : $id_agent, $login (login de l'utilisateur), $mdp (mot de passe de l'utilisateur), $ID_role (nom de role de l'utilisateur)
		- en sortie : 
		-------------------------------------------------------------------------------------------------------------------------------------*/

	function creer_identifiant($id_agent, $login, $mdp, $ID_role) {
		$bdd = connectBdd();
		$req = $bdd->prepare('INSERT INTO login(id_login, nom_login, mdp, id_agent_agent, id_role_role) VALUES (:id_login, :login, :mdp, :id_agent_agent, :id_role_role)') or die(print_r($bdd->errorInfo()));
		$req->execute(array(
			'id_login' => "",
			'login' => htmlspecialchars($login),
			'mdp' => sha1(htmlspecialchars($mdp)),
			'id_agent_agent' => htmlspecialchars($id_agent),
			'id_role_role' => htmlspecialchars($ID_role)
		));
		$req->closeCursor();
	}
	
	/*	--------------------------------------------------------------------------------------
		Supprimer l'entité login :
		- en entrée : $login (login de l'utilisateur)
		- en sortie :
		------------------------------------------------------------------------------------*/

	function supprimer_login($login) {
		$bdd = connectBdd();
		$req = $bdd->prepare('DELETE FROM login WHERE nom_login = :login') or die(print_r($bdd->errorInfo()));
				$req->execute(array(
				'login' => htmlspecialchars($login)
		));
		$req->closeCursor();
	}
	
		/*	----------------------------------------------------------------------------------
		Modifier le mot de passe de l'identifiant login :
		- en entrée : $login (login de l'utilisateur) , $mdp (mot de passe de l'utilisateur)
		- en sortie : donnees de l'entité 'login'
		------------------------------------------------------------------------------------*/

	function modifier_mdp($login, $mdp) {
		$bdd = connectBdd();
		$req = $bdd->prepare('UPDATE login SET mdp = :mdp WHERE nom_login = :login') or die(print_r($bdd->errorInfo()));
				$req->execute(array(
				'login' => $login,
				'mdp' => sha1(htmlspecialchars($mdp))
		));
		$req->closeCursor();
	}
	
		/*	------------------------------------------------------------------------------------
		Modifier le nom de role de l'identifiant role :
		- en entrée : $login de l'utilisateur, $nom_role (nouveau nom de role de l'utilisateur)
		- en sortie : 
		--------------------------------------------------------------------------------------*/

	function modifier_role($login, $nom_role) {
		$c = lire_nom_role($nom_role);
		if ($c['nom_role'] != "") {
			$retour=$c['nom_role'];
			$bdd = connectBdd();
			$req = $bdd->prepare('UPDATE login SET id_role_role = :nom_role_a_creer WHERE nom_login = :login') or die(print_r($bdd->errorInfo()));
					$req->execute(array(
					'login' => htmlspecialchars($login),
					'nom_role_a_creer' => htmlspecialchars($c['id_role'])
			));
			$req->closeCursor();
			return $retour;
		}
		return "";
	}

		/*	--------------------------------------------------------------------------------------------------------------------------------
		Créer, lire, modifier et supprimer l'identifiant :
		- l'utilisateur 'admin' a tous les droits
		- les autres utilisateurs ne peuvent que consulter leur identifiant
		+
		+++++++++++++++++++++++++++++++++++++++++++++++++++++ CREATION de LOGIN +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		+																																	+
		+								SEUL l'administrateur a le droit de créer un utilisateur (LOGIN)									+
		+																																	+
		 + 		en entree :	$id_agent 			----> id_agent de la table AGENT (et LOGIN)													+
		+					$login_a_creer 		----> nom_login de la table LOGIN															+
		+					$mdp_a_creer		----> mdp de la table LOGIN																	+
		+					$nom_role_a_creer 	----> nom_role de la table ROLE																+
		+					$crud				----> "c"																					+
		+																																	+
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		+																																	+
		++++++++++++++++++++++++++++++++++++++++++++++++++++++ LECTURE de LOGIN +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		+																																	+
		+		en entree :	$login_a_creer 		----> nom_login de la table LOGIN (nom de l'utilisateur)									+
		+					$mdp_a_creer		----> mdp de la table LOGIN	(mot de passe de l'utilisatreur)								+
		+																																	+
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		+																																	+
		+++++++++++++++++++++++++++++++++++++++++++++++++++ SUPPRESSION de LOGIN ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		+																																	+
		+								SEUL l'administrateur a le droit de supprimer un utilisateur (LOGIN)								+
		+																																	+
		+		en entree :	$login_a_creer 		----> nom_login de la table LOGIN (nom de l'utilisateur)									+
		+																																	+
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		+																																	+
		++++++++++++++++++++++++++++++++++++++++++++++++++ MODIFICATION de LOGIN ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		+																																	+
		+								SEUL l'administrateur a le droit de modifier un utilisateur (LOGIN)									+
		+																																	+
		+		en entree :	$login_a_creer 		----> nom_login de la table LOGIN (nom de l'utilisateur)									+
		+					$mdp_a_creer		----> nouveau mdp de l'utilisateur de la table LOGIN (le mot de passe n'est pas modifié		+
		+											  si $mdp_a_creer n'est pas renseigné)													+
		+					$nom_role_a_creer	----> nouveau nom de role de l'utilisateur (le $nom_role_a_creer doit exister dans la table +
		+											  ROLE, l'ID_role_role n'est pas modifié si $nom_role_a_creer n'est pas renseigné)   	+
		+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		+																																	+
		-----------------------------------------------------------------------------------------------------------------------------------*/

	function login($id_agent, $login_a_creer, $mdp_a_creer, $nom_role_a_creer, $crud) {
		if (empty($login_a_creer) or empty($mdp_a_creer)) {
			return "Login ou mot de passe erroné";
		}
		else {
			if ($crud == "c") {
				if (empty($nom_role_a_creer)) {
					return "le nom de role est obligatoire";
				}
				else {
					$b = lire_nom_role($nom_role_a_creer);
					if ($nom_role_a_creer != $b['nom_role']) {
						return "le nom de role est erroné";
					}
					else {
						$ID_role = $b['id_role'];
						$b = lire_login($_SESSION['login']);
						if ($_SESSION['nom_role'] != "admin") {
							return "Vous n'avez pas le droit de créer un login";
						}
						else {
							$b = lire_login($login_a_creer);
							if ($login_a_creer == $b['nom_login']) {
								return "Ce login est déjà créé";
							}
							else {
								$a = creer_identifiant($id_agent, $login_a_creer, $mdp_a_creer, $ID_role);
							}
						}
					}
				}
			}
			else {
				if ($crud == "r") {
					//echo "READ !!!!!!!";
					$b = lire_login($login_a_creer);
					//var_dump ($b);
					//exit;
					if ($login_a_creer != $b['nom_login']) {
						return "Login erroné";
					}
					else {
						if (sha1(htmlspecialchars($mdp_a_creer)) != $b['mdp']) {
							return "Mot de passe erroné";
						}
						else {
							$r = lire_role($b['id_role_role']);
							$_SESSION['login']=$b['nom_login'];
							$_SESSION['nom_role']=$r['nom_role'];
							$_SESSION['connect']=1;
							$_SESSION['premiere']=true;
						}
					}
				}
				else {
					if ($crud == "d") {
						if ($_SESSION['nom_role'] != "admin") {
							return "Vous n'avez pas le droit de supprimer cet identifiant";
						}
						else {
							$b = lire_login($login_a_creer);
							if ($login_a_creer != $b['nom_login']) {
								return "Login erroné";
							}
							else {
								$b = supprimer_login($login_a_creer);
							}
						}
					}
					else {
						if ($crud == "u") {
							$b = lire_login($login_a_creer);
							if (($_SESSION['login'] != $b['nom_login']) and ($_SESSION['nom_role'] != "admin")) {
								return  "Login erroné";
							}
							else {
								$mdp = sha1($mdp_a_creer);
								if (($mdp != $b['mdp'])  and ($_SESSION['nom_role'] != "admin")) {
									return "Mot de passe erroné";
								}
								else {
									if ($mdp_a_creer != "") {
										$b=modifier_mdp($login_a_creer, $mdp_a_creer);
									}
									if ($nom_role_a_creer != "") {
										if ($_SESSION['nom_role'] == "admin") {
											$b=modifier_role($login_a_creer, $nom_role_a_creer);
											if ($b != $nom_role_a_creer) {
												return "Le role n'existe pas";
											}
										}
										else {
											return "Vous n'avez pas le droit de changer votre role";
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
?>