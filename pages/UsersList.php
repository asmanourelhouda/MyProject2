<?

// select * from users 
//    echo '<pre>';
//    print_r($InfoUser);
//   
//  
//    foreach ($InfoUser['reponse'] as $DetUsers){
//        print_r($DetUsers);
//    }
//
//
//  echo '</pre>';

$idsupp = filter_input(INPUT_POST, 'SuppID'); 
$id= filter_input(INPUT_POST,'id');

if ($idsupp== 1):
    $dataA = array(
        'etat' => "1"
    );
echo '<div class="alert alert-danger" role="alert">Utilisateur supprimée</div>';
    update($id,$dataA,'users');
    redirect('UsersList');
endif; 



//
$SuppId = filter_input(INPUT_GET, 'idUser', FILTER_VALIDATE_INT);
//if ($SuppId != "") {
//    delete($SuppId, 'users');
//    redirect('UsersList');
//}
print_r($_POST); 
$Add = filter_input(INPUT_POST, 'Add');
if ($Add == 1) {
    $name = filter_input(INPUT_POST, 'name');
    $login = filter_input(INPUT_POST, 'login');
    $password = filter_input(INPUT_POST, 'password');
    $post_type = filter_input(INPUT_POST, 'type');
    $stat = filter_input(INPUT_POST, 'check');
    $TypC=  explode('-',$post_type);
    $type=$TypC[0];
    $post=$TypC[1];

    $user = array(
        'id' => '',
        'login' => $login,
        'password' => $password,
        'type' => $type,
        'name' => $name,
        'etat' => $stat,
        'post' => $post
    );

    add($user, 'users');
 //   redirect('Dashboard');
}
$ModifBtn=  filter_input(INPUT_POST,'ModifBtn');
if($ModifBtn){
    $id=  filter_input(INPUT_POST,'id');
     $name = filter_input(INPUT_POST, 'name');
    $login = filter_input(INPUT_POST, 'login');
    $password = filter_input(INPUT_POST, 'password');
    $post_type = filter_input(INPUT_POST, 'type');
    $stat = filter_input(INPUT_POST, 'check');
    $TypC=  explode('-',$post_type);
    $type=$TypC[0];
    $post=$TypC[1];

    $user = array(
        'id' => $id,
        'login' => $login,
        'password' => $password,
        'type' => $type,
        'name' => $name,
        'etat' => $stat,
        'post' => $post
    );

    update($id, $user,'users');
     redirect('UsersList'); 
}




$InfoUser = get("*", 'users',array('etat='=>0)); 
?>



<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <a href="#modal-table" class="btn btn-success" data-toggle="modal" style="margin-bottom: 12px">
                <i class="icon-plus-sign"></i>
                Ajouter
            </a>

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
                                    <th>Nom</th>
                                    <th>Login</th>
                                    <th>Mot de passe</th>
                                    <th>Poste</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                      
                                <? foreach ($InfoUser['reponse'] as $DetUsers): ?>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <?= $DetUsers['name'] ?>
                                        </td>
                                        <td><?= $DetUsers['login'] ?></td>
                                        <td class="hidden-480"><?= $DetUsers['password'] ?></td>
                                        <td><?= $DetUsers['post'] ?></td>



                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="<?= WEBRoot ?>/UsersConfig&idUser=<?= $DetUsers['id'] ?>" class="btn btn-xs btn-success">

                                                    <i class="icon-search bigger-120"></i>
                                                </a>

                                                <a class="btn btn-xs btn-info" href="<?= WEBRoot ?>/UsersList&idUser=<?= $DetUsers['id'] ?>"> 

                                                    <i class="icon-edit bigger-120"></i>
                                                </a>

                                               
                                                <a href='#' class='btn btn-xs btn-danger confirm-delete' data-title='Suppression acompte' data-id="<?= $DetUsers['id'] ?>">
                                                 <i class="icon-trash bigger-120"></i>
                                                </a>
                                            </div>
<!--
                                            <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                <div class="inline position-relative">
                                                    <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                                        <i class="icon-cog icon-only bigger-110"></i>
                                                    </button>

                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                        <li>
                                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                <span class="blue">
                                                                    <i class="icon-zoom-in bigger-120"></i>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                                <span class="green">
                                                                    <i class="icon-edit bigger-120"></i>
                                                                </span>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="<?= WEBRoot ?>/UsersList&Suppid=<?= $DetUsers['id'] ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                                <a href="<?= WEBRoot ?>/Gestion_restaurant&Suppid=<?= $RestDet['id'] ?>" class="btn btn-sm btn-danger"> 
                                                                <a href="<?= WEBRoot ?>/ListeMenu&Suppid=<?= $men->id ?>">Supprimer</a>
                                                                <span class="red">
                                                                    <i class="icon-trash bigger-120"></i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>-->
                                        </td>
                                    </tr>
<? endforeach; ?>

                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->

<? include 'UsersAdd.php'; ?>
<?
$idModif=  filter_input(INPUT_GET,'idUser');
if($idModif){
   include 'UsersModif.php'; 
}
 ?>
                </div><!-- /span -->
            </div><!-- /row -->





        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->


