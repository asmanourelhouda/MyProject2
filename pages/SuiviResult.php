<?


//suppression par la modif d'ID
//$idsupp = filter_input(INPUT_POST, 'SuppID'); 
//$id= filter_input(INPUT_POST,'id');
//
//if ($idsupp== 1):
//    $dataA = array(
//        'etat' => "1"
//    );
//echo '<div class="alert alert-danger" role="alert">Utilisateur supprimée</div>';
//    update($id,$dataA,'users');
//    redirect('UsersList');
//endif; 




$SuppId = filter_input(INPUT_GET, 'SuppID', FILTER_VALIDATE_INT);
if ($SuppId != "") {
    delete($SuppId, 'donnees');
    redirect('KosuList');
}

print_r($_POST); 

// Ajout
$Add = filter_input(INPUT_POST, 'Add');
if ($Add == 1) {
    $nbop = filter_input(INPUT_POST, 'NbOp');
    $temps = filter_input(INPUT_POST, 'temps');
    $NbP = filter_input(INPUT_POST, 'NbP');
    $kosu = ($nbop * $temps)/ $NbP;
   

    $kosul = array(
        'id' => '',
        'nbr_op' => $nbop,
        'temps' => $temps,
        'nb_piece_bonnes' => $NbP,
        'kosu' => $kosu
    );

    add($kosul, 'donnees');
 //   redirect('Dashboard');
}

//Modification
$ModifBtn=  filter_input(INPUT_POST,'ModifBtn');
if($ModifBtn){
    $id=  filter_input(INPUT_POST,'id');
      $nbop = filter_input(INPUT_POST, 'NbOp');
    $temps = filter_input(INPUT_POST, 'temps');
    $NbP = filter_input(INPUT_POST, 'NbP');
    $kosu = ($nbop * $temps)/ $NbP;
   

    $kosul = array(
        'id' => $id,
        'nbr_op' => $nbop,
        'temps' => $temps,
        'nb_piece_bonnes' => $NbP,
        'kosu' => $kosu
    );

    update($id, $kosul,'donnees');
     redirect('KosuList'); 
}



//Recuperation des données
$InfoKosu = get("*", 'donnees'); 
?>



<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
<!--            <a href="#modal-table" class="btn btn-success" data-toggle="modal" style="margin-bottom: 12px">
                <i class="icon-plus-sign"></i>
                Ajouter
            </a>-->




<!--// 1er Graphe-->


	<div id="chartContainer" style="height:300px; width:100%;">
	</div>







            <div class="row">
                <div class="col-xs-12">
                    
                    
                    
                    <div class="table-responsive">




                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center">
                                        <label>
                                            <input type="checkbox" class="ace" />
                                            <span class="lbl"></span>
                                        </label>
                                    </th>
                                    <!--<th>ID</th>-->
                                    <th>Temps</th>
                                    <th>Nombre des opérateurs</th>
                                    
                                    <th>Nombre des pèces bonne</th>
                                    <th>Kosu</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                      
                                <? foreach ($InfoKosu['reponse'] as $DetKosu): ?>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>
<!--                                        <td>
                                            <?= $DetKosu['id'] ?>
                                        </td>-->
                                             <td><?= $DetKosu['temps'] ?></td>
                                        <td><?= $DetKosu['nbr_op'] ?></td>
                                 
                                        <td><?= $DetKosu['nb_piece_bonnes'] ?></td>
                                        <td><?= $DetKosu['kosu'] ?></td>



                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="<?= WEBRoot ?>/KosuConfig&idUser=<?= $DetKosu['id'] ?>" class="btn btn-xs btn-success">

                                                    <i class="icon-search bigger-120"></i>
                                                </a>

                                                <a class="btn btn-xs btn-info" href="<?= WEBRoot ?>/KosuList&idUser=<?= $DetKosu['id'] ?>"> 

                                                    <i class="icon-edit bigger-120"></i>
                                                </a>

                                               
                                                <a href='#' class='btn btn-xs btn-danger confirm-delete' data-title='Suppression acompte' data-id="<?= $DetKosu['id'] ?>">
                                                 <i class="icon-trash bigger-120"></i>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>
<? endforeach; ?>

                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->

<? include 'KosuAdd.php'; ?>
<?
$idModif=  filter_input(INPUT_GET,'idUser');
if($idModif){
   include 'KosuModif.php'; 
}
 ?>
                    
                    
 


<!--2eme graphe-->
	<div id="chartContainer1" style="height: 300px; width: 100%;">
	</div>


                </div><!-- /span -->
            </div><!-- /row -->





        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->


