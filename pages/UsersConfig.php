<?
$iduer = filter_input(INPUT_GET, 'idUser', FILTER_VALIDATE_INT);
if ($iduer) {
    $InfoUser = get("*", 'users', array('id=' => $iduer));
    // select * from users where id = $iduser
    //  echo '<pre>';
    ///  print_r($InfoUser);

    $DetUser = $InfoUser['reponse'][0];
    // print_r($DetUser);
    // echo '</pre>';
}
?>

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->


        <div>
            <div id="user-profile-1" class="user-profile row">
                <div class="col-xs-12 col-sm-3 center">
                    <div>
                        <span class="profile-picture">
                            <img id="avatar" class="editable img-responsive editable-click editable-empty" alt="Alex's Avatar" src="assets/avatars/profile-pic.jpg"></img>
                        </span>

                        <div class="space-4"></div>

                        <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
                            <div class="inline position-relative">

                                &nbsp;
                                <span class="white"><?= $DetUser['name'] ?></span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-9">

                    <div class="space-12"></div>

                    <div class="profile-user-info profile-user-info-striped">
                        <div class="profile-info-row">
                            <div class="profile-info-name"> Utilisateur </div>

                            <div class="profile-info-value">
                                <span class="editable editable-click" id="username"><?= $DetUser['login'] ?></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Mot de passe </div>

                            <div class="profile-info-value" id="country">

                                <span class="editable editable-click" id="country"><?= $DetUser['password'] ?></span>

                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name"> Poste </div>

                            <div class="profile-info-value">
                                <span class="editable editable-click" id="age"><?= $DetUser['post'] ?></span>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
<!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div>