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
    redirect('LigneList');
}

print_r($_POST);

// Ajout
$Add = filter_input(INPUT_POST, 'Add');
if ($Add == 1) {
    $nbop = filter_input(INPUT_POST, 'NbOp');
    $temps = filter_input(INPUT_POST, 'temps');
    $NbP = filter_input(INPUT_POST, 'NbP');
    $kosu = ($nbop * $temps) / $NbP;


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
$ModifBtn = filter_input(INPUT_POST, 'ModifBtn');
if ($ModifBtn) {
    $id = filter_input(INPUT_POST, 'id');
    $nbop = filter_input(INPUT_POST, 'NbOp');
    $temps = filter_input(INPUT_POST, 'temps');
    $NbP = filter_input(INPUT_POST, 'NbP');
    $kosu = ($nbop * $temps) / $NbP;


    $kosul = array(
        'id' => $id,
        'nbr_op' => $nbop,
        'temps' => $temps,
        'nb_piece_bonnes' => $NbP,
        'kosu' => $kosu
    );

    update($id, $kosul, 'donnees');
    redirect('KosuList');
}



//Recuperation des données
$InfoLigne = get("*", 'ligne');
?>





<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="main-container-inner">

        <div class="page-content">

            <!-- PAGE CONTENT BEGINS -->

            <div class="row">
                <div class="col-xs-12">
                    <a href="<?= WEBRoot ?>/LigneAdd" class="btn btn-success" data-toggle="modal" style="margin-bottom: 12px">
                        <i class="icon-plus-sign"></i>
                        Ajouter
                    </a>
                    <div class="table-header">
                        Liste des lignes
                    </div>

                    <div class="table-responsive">
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center">
                                        <label>
                                            <input type="checkbox" class="ace" />
                                            <span class="lbl"></span>
                                        </label>
                                    </th>
                                    <th>Référence</th>
                                    <th class="hidden-480 visible-md visible-lg hidden-sm hidden-xs">Zone</th>
                                    <th class="hidden-480 visible-md visible-lg hidden-sm hidden-xs">Poste</th>
                                    <th class="hidden-480 visible-md visible-lg hidden-sm hidden-xs">Superviseur</th>
                                    <th>Team Leader</th>
                                    <th class="hidden-480 visible-md visible-lg hidden-sm hidden-xs">Objectif ligne</th>
                                    <th class="hidden-480 visible-md visible-lg hidden-sm hidden-xs">Limite directeur</th>
                                    <th class="hidden-480 visible-md visible-lg hidden-sm hidden-xs">Limite Responsable</th>
                                    <th class="hidden-480 visible-md visible-lg hidden-sm hidden-xs">Limite Superviseur</th>

                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <? foreach ($InfoLigne['reponse'] as $DetLigne): ?>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td><?= $DetLigne['nom_ligne'] ?></td>
                                        <td class="hidden-480 visible-md visible-lg hidden-sm hidden-xs"> <?= $DetLigne['Zone'] ?></td>
                                        <td class="hidden-480 visible-md visible-lg hidden-sm hidden-xs"><?= $DetLigne['Poste'] ?></td>
                                        <td class="hidden-480 visible-md visible-lg hidden-sm hidden-xs"><?= getinfo($DetLigne['superviseur'],'users','name') ?></td>
                                        <td><?= getinfo($DetLigne['teamleader'],'users','name') ?></td>
                                        <td class="hidden-480 visible-md visible-lg hidden-sm hidden-xs"><?= $DetLigne['objectifligne'] ?></td>
                                        <td class="hidden-480 visible-md visible-lg hidden-sm hidden-xs"><?= $DetLigne['limitdirecteur'] ?></td>
                                        <td class="hidden-480 visible-md visible-lg hidden-sm hidden-xs"><?= $DetLigne['limitresponsable'] ?></td>
                                        <td class="hidden-480 visible-md visible-lg hidden-sm hidden-xs"><?= $DetLigne['limitsuperviseur'] ?></td>



                                        <td class="visible-md visible-lg hidden-sm hidden-xs">
                                            <div >
                                                <a href="<?= WEBRoot ?>/KosuConfig&idUser=<?= $DetLigne['id'] ?>" class="btn btn-xs btn-success">

                                                    <i class="icon-search bigger-120"></i>
                                                </a>

                                                <a class="btn btn-xs btn-info" href="<?= WEBRoot ?>/KosuList&idUser=<?= $DetLigne['id'] ?>"> 

                                                    <i class="icon-edit bigger-120"></i>
                                                </a>


                                                <a href='#' class='btn btn-xs btn-danger confirm-delete' data-title='Suppression acompte' data-id="<?= $DetLigne['id'] ?>">
                                                    <i class="icon-trash bigger-120"></i>
                                                </a>
                                            </div>

                                        </td>

                                        <td class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div >
                                                <div class="inline position-relative">
                                                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-caret-down icon-only bigger-120"></i>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                        <a href="<?= WEBRoot ?>/KosuConfig&idUser=<?= $DetLigne['id'] ?>" class="btn btn-xs btn-success">

                                                            <i class="icon-search bigger-120"></i>
                                                        </a>

                                                        <a class="btn btn-xs btn-info" href="<?= WEBRoot ?>/KosuList&idUser=<?= $DetLigne['id'] ?>"> 

                                                            <i class="icon-edit bigger-120"></i>
                                                        </a>


                                                        <a href='#' class='btn btn-xs btn-danger confirm-delete' data-title='Suppression acompte' data-id="<?= $DetLigne['id'] ?>">
                                                            <i class="icon-trash bigger-120"></i>
                                                        </a>
                                                    </ul>
                                                </div>

                                            </div>

                                        </td>
                                    </tr>
                                <? endforeach; ?> 

                            </tbody>
                        </table>
                    </div>
                </div>

            </div><!-- /.row -->
        </div><!-- /.page-content -->



    </div><!-- /.main-container-inner -->


</div><!-- /.main-container -->


<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
</script>


<script type="text/javascript">
    if ("ontouchend" in document)
        document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
</script>


<!-- inline scripts related to this page -->

<script type="text/javascript">
    jQuery(function ($) {
    var oTable1 = $('#sample-table-2').dataTable({
    "aoColumns": [
    {"bSortable": false},
            null, null, null, null, null,
    {"bSortable": false}
    ]});
            $('table th input:checkbox').on('click', function () {
    var that = this;
            $(this).closest('table').find('tr > td:first-child input:checkbox')
            .each(function () {
            this.checked = that.checked;
                    $(this).closest('tr').toggleClass('selected');
            });
    });

</script>

