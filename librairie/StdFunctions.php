<?

class StdFunctions {

    //Cette fonction détermine le code/identifiant d'un article/client/fournisseur automatiquement
    public function getNextCode($table, $colonne, $prefix) {
        // à retseter voir on suppression !!!!
        $req = mysql_query('select max(' . $colonne . ')+1 from ' . $table);
        $data = mysql_fetch_array($req);
        if ($data[0] == '') {
            $data[0] = 1;
        }
        return $prefix . $data[0];
    }

    /*
     * function qui retourn la chaine à utiliser pour la ref et le dernier numéro utiliser +1 
     */

    function GetNextRef($table) {
        global $PDO;
        $strSQL = "SELECT * FROM mana_numerotation WHERE  table_name= ?";
        $query = $PDO->prepare($strSQL);
        $query->execute(array($table));
        $retour = $query->fetch();
        return $retour->chaine . ($retour->numero + 1);
    }

    function GetNextRefFact($table) {
        global $PDO;
        $strSQL = "SELECT * FROM mana_numerotation WHERE  table_name= ?";
        $query = $PDO->prepare($strSQL);
        $query->execute(array($table));
        $retour = $query->fetch();
        return $retour->chaine . (str_pad($retour->numero + 1, 6, "0", STR_PAD_LEFT));
    }

    function uppRef($tabel, $NextCode) {
        global $PDO;
        $sql = 'UPDATE mana_numerotation SET numero=:NexCode WHERE table_name =:tab';
        $req = $PDO->prepare($sql);
        $req->execute(array('NexCode' => $NextCode, 'tab' => $tabel));
    }

    /*
     * function de calcul de prix selon le service on demande
     * @type de service *
     * @type de camion
     * @type de client
     * @trajet 
     */

    public function GetPrix($service, $camion, $client, $trajet) {
        // récupération du type de pay du service :
        $Ret=array();
        $where = array();
        $where['service='] = $service;
        $where['TypeCamion='] = $camion;
        if ($client != "") {
            $where['client='] = $client;
        }
        $Ret['type']= getinfo($service,'mana_services','candition');
        if($Ret['type']==1){
             $TrajPrix = get("*", 'mana_trajet_prix', $where);
            $Ret['prix']= $TrajPrix['reponse'][0]['prix']; 
        }else{
        
             if ($trajet != "") {  $where['trajet='] = $trajet;            }
              $TrajPrix = get("*", 'mana_trajet_prix', $where); 
                $Ret['prix'] = $TrajPrix['reponse'][0]['prix'];
        }
        return $Ret;
    }
 public function GetPrixSecondaire($service, $camion, $client, $trajet) {
        // récupération du type de pay du service :
        $Ret=array();
        $where = array();
        $where['service='] = $service;
        $where['TypeCamion='] = $camion;
        if ($client != "") {
            $where['client='] = $client;
        }
        $Ret['type']= getinfo($service,'mana_services','candition');
        if($Ret['type']==1){
             $TrajPrix = get("*", 'mana_trajet_prix', $where);
            $Ret['prix']= $TrajPrix['reponse'][0]['prix_secondaire']; 
        }else{
        
             if ($trajet != "") {  $where['trajet='] = $trajet;            }
              $TrajPrix = get("*", 'mana_trajet_prix', $where); 
                $Ret['prix'] = $TrajPrix['reponse'][0]['prix_secondaire'];
        }
        return $Ret;
    }
    public static function asLetters($number) {
        $convert = explode('.', $number);
        $num[17] = array('zero', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf', 'dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize');
        $num[100] = array(20 => 'vingt', 30 => 'trente', 40 => 'quarante', 50 => 'cinquante', 60 => 'soixante', 70 => 'soixante-dix', 80 => 'quatre-vingt', 90 => 'quatre-vingt-dix');
        if (isset($convert[1]) && $convert[1] != '') {
            return self::asLetters($convert[0]) . ' dinars et ' . self::asLetters($convert[1]);
        }
        if ($number < 0)
            return 'moins ' . self::asLetters(-$number);
        if ($number < 17) {
            return $num[17][$number];
        } elseif ($number < 20) {
            return 'dix-' . self::asLetters($number - 10);
        } elseif ($number < 100) {
            if ($number % 10 == 0) {
                return $num[100][$number];
            } elseif (substr($number, -1) == 1) {
                if (((int) ($number / 10) * 10) < 70) {
                    return self::asLetters((int) ($number / 10) * 10) . '-et-un';
                } elseif ($number == 71) {
                    return 'soixante-et-onze';
                } elseif ($number == 81) {
                    return 'quatre-vingt-un';
                } elseif ($number == 91) {
                    return 'quatre-vingt-onze';
                }
            } elseif ($number < 70) {
                return self::asLetters($number - $number % 10) . '-' . self::asLetters($number % 10);
            } elseif ($number < 80) {
                return self::asLetters(60) . '-' . self::asLetters($number % 20);
            } else {
                return self::asLetters(80) . '-' . self::asLetters($number % 20);
            }
        } elseif ($number == 100) {
            return 'cent';
        } elseif ($number < 200) {
            return self::asLetters(100) . ' ' . self::asLetters($number % 100);
        } elseif ($number < 1000) {
            return self::asLetters((int) ($number / 100)) . ' ' . self::asLetters(100) . ($number % 100 > 0 ? ' ' . self::asLetters($number % 100) : '');
        } elseif ($number == 1000) {
            return 'mille';
        } elseif ($number < 2000) {
            return self::asLetters(1000) . ' ' . self::asLetters($number % 1000) . ' ';
        } elseif ($number < 1000000) {
            return self::asLetters((int) ($number / 1000)) . ' ' . self::asLetters(1000) . ($number % 1000 > 0 ? ' ' . self::asLetters($number % 1000) : '');
        } elseif ($number == 1000000) {
            return 'millions';
        } elseif ($number < 2000000) {
            return self::asLetters(1000000) . ' ' . self::asLetters($number % 1000000);
        } elseif ($number < 1000000000) {
            return self::asLetters((int) ($number / 1000000)) . ' ' . self::asLetters(1000000) . ($number % 1000000 > 0 ? ' ' . self::asLetters($number % 1000000) : '');
        }
    }
    public function AfficheDateFr($dateTime){
        $Date=  explode(' ', $dateTime);
        $DateD=  explode('-', $Date['0']);
        // inversser la date à afficher :p 
        $DateRetour=$DateD['2'].'/'.$DateD['1'].'/'.$DateD['0'];
        return $DateRetour.' '.$Date['1'];
    }
    public function ChangeVi($string){
        $string= number_format($string,3);
       $stringV= str_replace(".", ',', $string) ;
        return $stringV;
    }
    public function SetDate($dateTime){
        $Date=  explode(' ', $dateTime);
        $DateD=  explode('/', $Date['0']);
        $DateSys=$DateD['2'].'-'.$DateD['1'].'-'.$DateD['0'];
        return $DateSys.' '.$Date['1'];
    }
    public function GetRest($idC,$SommeFacture) {
        // récupération du dernier reste par client
        $ListeRest=get("*",'mana_solde',array('id_client='=>$idC));
        $LasteRest=$ListeRest['reponse'];
        // récupération de tous les soldes du client / faire le calcule / ajouter 
        foreach ($LasteRest as $rest){
        //return $LasteRest;
            $RestSolde+=$rest['montant']-$rest['solde_utiliser'];
            if($RestSolde>$SommeFacture){
                return array($rest['id']=>$RestSolde);
                
            }
        }
        // si solde insufisant
        if($RestSolde<$SommeFacture){
            return $RestSolde;
        }
    }
    public function  GetKm($matricule){
        // récupération des km et faire adition des km parcorue
        $totkm=get("*",'mana_gestionkm',array('matricule='=>$matricule));
        $ListedesTot=$totkm['reponse']; 
        if($totkm['total']>1){
            
       
        foreach ($ListedesTot as $km) {
            $Total+=$km['kmetre'];
        }
         }else{
            
             $Total=$ListedesTot[0]['kmetre'];
         }
        return $Total;
    }
    public function Comparedate($date){
         $dEnd = new DateTime($date);
   $dStart  = new DateTime('2014-10-24 00:00');
   $dDiff = $dStart->diff($dEnd);
   $j= $dDiff->format('%R%a'); // use for point out relation: smaller/greater
  // echo $j=$dDiff->days;
    if($j>30){
        return array('class'=>'success',
            'nbr'=>$j
        ) ;
    }elseif ($j<30 && $j>0) {
         
           return array(
            'class'=>'warning',
            'nbr'=>$j
        ) ;
        }else{
           return array(
            'class'=>'danger',
            'nbr'=>$j
        ) ;
        }
    }
     function getGenInfo($id,$table,$Cand,$var){
        global $PDO;
        $strSQL="SELECT $var FROM $table WHERE  $Cand= ?";
        $query = $PDO->prepare($strSQL);
			$query->execute(array($id));
			$retour = $query->fetch();
                        return $retour->$var;
    }
}
$StdFunctions = new StdFunctions();
