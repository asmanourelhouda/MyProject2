<?php

    /***
 *	insert des données dans la table en paramètre
 *	@datas	tableau des données à insérer dont la clé et le nom du champs dans la table
 *	@table	table dans laquelle insérer les données
 */
//require_once 'passwordLib.php';
function add($datas, $table){
	 global $PDO; //on ouvre la connexion à la base de données

	foreach($datas as $key => $value){
		$keys[] = $key;
		$values[] = $value;
	}

	$strSQL = "INSERT INTO ".$table." (";
	foreach($keys as $ky => $k){ $strSQL .= $k . ","; }

	$strSQL = substr($strSQL,0,-1) . ") VALUES(";
	foreach($values as $vl => $v){ $strSQL .= "?,"; }

	$strSQL = substr($strSQL,0,-1) . ")";

	$query = $PDO->prepare($strSQL);
	if($query->execute($values)) return $PDO->lastInsertId();
	else return false;
}
/***
 *	met à jour les données de l'ID dans la table en paramètre
 *	@id	identifiant de la ligne à modifier
 *	@datas 	tableau des données à insérer dont la clé et le nom du champs dans la table
 *	@table 	table dans laquelle insérer les données
 */
function update($id, $datas, $table){
    global $PDO;
	foreach($datas as $key => $value){
		$keys[] = $key;
		$values[] = $value;
	}

	$strSQL = "UPDATE ".$table." SET ";
	foreach($datas as $key => $value){
		$strSQL .= $key . " = ?,";
	} $strSQL = substr($strSQL,0,-1) . " WHERE id = ?";
	$values[] = $id;
	$query = $PDO->prepare($strSQL);
	if($query->execute($values)) return true;
	else return false;
}
/***
 *	supprime les données correspondant à l'ID dans la table en paramètre
 *	@id		identifiant de la ligne à supprimer
 *	@table	table sur laquelle on applique la suppression
 */
function delete($id, $table){
	global $PDO;
	$strSQL = "DELETE FROM ".$table." WHERE id = ?";
	$query = $PDO->prepare($strSQL);
	//print_r(array($id));

	if($query->execute(array($id))) return true;
	else return false;
}
/***
 * 	retourne le resultat d'un select
 *	@columns 	colonnes à selectionner pour la requête (ex: array('champ1','champ2') ou '*')
 *	@table 		nom de la table sur laquelle faire la requête
 *	@where 		champs sur lequels appliquer des conditions ( ex: array( 'champ1 =' => 'valeur', 'champ2 LIKE' => 'valeur%') )
 *	@concats 	[ AND | OR ]
 *	@order 		champs sur lequels appliquer le tri, et l'ordre pour chaque champs (ex: array('champ1' => 'ASC','champ2' => 'DESC') )
 *	@limit 		limit[0] => debut de la liste, limit[1] => nombre d'éléments dans la liste retournée (ex: array('0','20') )
 *
 *	return @retour	: tableau contenant la requête executée, les éventuelles erreurs et le resultat de la requête
 */
function get($columns = null, $table = null, $where = null, $concats = "AND", $order = null, $limit = null){
    global $PDO;
	$retour = array(); //variable de type tableau, retournée par la fonction
	$rows = "";
	$clause = "";
	$sort = "";
	$limitStr = "";

	if(!is_null($columns) && !is_null($table)){

		// si $rows est un tableau ou égale à * tout va bien.
		if(is_array($columns)){
			foreach($columns as $column) { $rows .= $column .', '; }
			$rows = substr($rows,0,-2);
		} elseif($columns == '*'){
			$rows = '*';
		} else {
			$retour['erreur'] = "Les champs selectionné doivent être appelé depuis une variable Tableau";
		}

		if(!in_array(strtolower($concats),array('and','or'))){
			$retour['erreur'] = "<strong>".$concats."</strong> n'est pas une valeur autorisée pour concaténer des conditions. Utilisez 'OR' ou 'AND'.";
		}

		/*
		si @where est renseigné, on filtre les résultats grâce au tableau @where construit comme suit :
			array ('colname operateur' => 'valeur');
			ex: array('page_id =' => 5);
		sinon, on ne filtre pas les résultats
		*/
		if(!is_null($where) && is_array($where)){
			foreach($where as $k => $v){
				$clause .= $k." ? ".$concats." ";
				$values[] = $v;
			}
			$clause = " WHERE ".substr($clause,0,(-(strlen($concats)+2)));
		} elseif(!is_null($where) && !is_array($where)){
			$retour['erreur'] = "La clause WHERE doit être construite via une variable Tableau";
		} else {
			$clause = "";
		}

		//si $order est un tableau et n'est pas null
		if(!is_null($order) && is_array($order)){
			foreach($order as $k => $v){ $sort .= $k." ".$v.", "; }
			$sort = " ORDER BY ".substr($sort,0,-2);
		} elseif(!is_null($order) && !is_array($order)) {
			$retour['erreur'] = "ORDER BY doit être construit via une variable Tableau";
		} else {
			$sort = "";
		}

		if(!is_null($limit) && is_array($limit) && is_numeric($limit[0]) && is_numeric($limit[1])){
			$debut = $limit[0];
			$nbRows = $limit[1];
			$limitStr = " LIMIT " . $debut . "," . $nbRows;
		} elseif(!is_null($limit) && !is_array($limit)){
			$retour['erreur'] = "LIMIT doit être construit via un tableau de deux entiers";
		} else {
			$limitStr = "";
		}

		// on construit la requête
		$strSQL = "SELECT ".$rows." FROM ".$table.$clause.$sort.$limitStr;
		if(empty($retour['erreur'])){
			$query = $PDO->prepare($strSQL);
			$query->execute(@$values);
			$retour['requete'] = $strSQL;
			$retour['reponse'] = $query->fetchAll(PDO::FETCH_ASSOC);

			$sqlTotal = "SELECT COUNT(*) as total FROM ".$table.$clause.$sort;
			$q =$PDO->prepare($sqlTotal);
			$q->execute(@$values);
			$tot = $q->fetchAll(PDO::FETCH_ASSOC);
			$retour['total'] = $tot[0]['total'];
		}

	} else {
		$retour['erreur'] = "Impossible de créer la requete, les champs à selectionner et la table sont vide";
	}

	return $retour;
}
/***
 *	génère des liens de pagination : numeros de pages, 'suivants', 'précédents'
 *	@total	nombre total d'enregistremnts à paginer
 *	@nbpp	nombre d'enregistrements à afficher par page
 *	@link	chaine qui servira à construire les liens vers les différentes pages
 */
function pagination($total, $nbpp, $link){
	echo"<div class='dataTables_paginate paging_bootstrap'> <ul class='pagination'>";
		/** Pagination **/
		//calcul du nombre de pages
		$nbLiens = ceil($total/$nbpp);

		if($nbLiens > 1){
			/** précédents **/
			if(isset($_GET['d']) && $_GET['d'] > 0){
				//echo "<a href='".$link.($_GET['d']-$nbpp)."'>« Précédents</a>";
                                echo '<li class="prev"><a href="'.$link.($_GET['d']-$nbpp).'"><i class="icon-double-angle-left"></i></a></li>';
			} else {
                            echo '<li class="prev disabled"><a href="#"><i class="icon-double-angle-left"></i></a></li>';
			}
			/** pages ***/
			for($i = 0; $i < $nbLiens; $i++){
				if($_GET['d'] == ($i*$nbpp)){
					//echo "<span class='active_pagi'>".($i+1)."";
                                        echo '<li class="active"> <a href="#">'.($i+1).'</a><li>';
				} else {
					//echo "<a href='".$link.($i*$nbpp)."'>".($i+1)."</a>";
                                         echo '<li class=""> <a href="'.$link.($i*$nbpp).'">'.($i+1).'</a>  <li>';
				}
			}

			/** suivants **/
			if(isset($_GET['d']) && $_GET['d'] >= 0 && $_GET['d'] < ($total-$nbpp)){
                            echo ' <li class="next"><a href="'.$link.($_GET['d']+$nbpp).'"><i class="icon-double-angle-right"></i></a></li>';
				//echo "<a href='".$link.($_GET['d']+$nbpp)."'>Suivants »</a>";
			} else {
				 echo ' <li class="next disabled"><a href="#"><i class="icon-double-angle-right"></i></a></li>';
			}
		}
	echo "</ul></div>";
}

/* connexion
     * récupération des info d'utilisateur
     * recherche dans la base test si l'adresse existe puis si la mdp match the old one
     * si tous on ordre cree une sessiion avec les info de l'utilisateur puis le redériger vers la page acc user
     *$email tester en récupération puis match ici puis redirection améliorere le code à la fin merci nagui
     *       */
function Con($login,$pass){
    $Err="";
    if($login!=""&& $pass!=""){
        $where=array('login =' =>$login);
       $tab= get('*','users',$where);
       if($tab['total']!=0){
           $user=$tab['reponse'][0];
       // if(!password_verify($pass, $user['password'])) {
        if($pass!= $user['password']) {
           $Err='Votre mot de passe est incorrect';
       }else{ //creation de la session
            $user['password']="#####";
           $_SESSION['user']=$user;
       }
       }else{
           $Err="login n'existe pas";
       }  
    }else{
         $Err="les champs sont vide";
    }
    if($Err!=""){return $Err ;}
    else        {return 1;}
}
function deconnexion(){
    unset($_SESSION);
    session_destroy();
    redirect('index.php');
    
}
function UppImg($repertoireDestination){
    $nomOrigine = $_FILES['fichier']['name'];
    $elementsChemin = pathinfo($nomOrigine);
    $extensionFichier = $elementsChemin['extension'];
    $extensionsAutorisees = array("jpeg", "jpg", "gif","png");
    if (!(in_array($extensionFichier, $extensionsAutorisees))) {
        $Erreur= "Le fichier n'a pas l'extension attendue";
    } else {
        // Copie dans le repertoire du script avec un nom
        // incluant l'heure a la seconde pres
      //  $repertoireDestination = dirname(__FILE__)."/";
        $nomDestination = "img_".date("YmdHis").".".$extensionFichier;

        if (move_uploaded_file($_FILES["fichier"]["tmp_name"],
            $repertoireDestination.$nomDestination)) {
          return $nomDestination;
        } else {
            $Erreur= "Le fichier n'a pas été uploadé (trop gros ?) ou ".
                "Le déplacement du fichier temporaire a échoué";
        }
    }
    if($Erreur!="") {return $Erreur;}
}

function redirect($url, $time = 0) {
    //On v?rifie si aucun en-t?te n'a d?j? ?t? envoy?    
    if (!headers_sent()) {
        header("refresh: $time;url=$url");
        exit;
    } else {
        echo '<meta http-equiv="refresh" content="', $time, ';url=', $url, '">';
    }
}
/**
 * get name of tabel or get juste one info
 * $id ==> id of row
 * $Table
 * $var ==> valleur rechercher
 * return $var[$i]
 */
    function getinfo($id,$table,$var){
        global $PDO;
        $strSQL="SELECT $var FROM $table WHERE  id= ?";
        $query = $PDO->prepare($strSQL);
			$query->execute(array($id));
			$retour = $query->fetch();
                        return $retour->$var;
    }
    
    function getGenInfo($id,$table,$Cand,$var){
        global $PDO;
        $strSQL="SELECT $var FROM $table WHERE  $Cand= ?";
        $query = $PDO->prepare($strSQL);
			$query->execute(array($id));
			$retour = $query->fetch();
                        return $retour->$var;
    }
    function getRecete($date_debut,$date_fin,$camion,$nom_chauffeur){
        // parcourire la table intervention du chaque camion et chaque chauffeur !!!
        $listeIntervention=get("*",'mana_intervention',array(''));
    }