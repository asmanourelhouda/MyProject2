
<?
    $InfoUserModification = get("*", 'users', array('id=' => $idModif));
    $DetUserModification = $InfoUserModification['reponse'][0];
?>

<div id="modal-table-modificaion" class="modal show" tabindex="0">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    Modifier l'utilisateur
                </div>
            </div>
            <div class="modal-body" style="padding: 0px">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <form class="form-horizontal"  method="POST" action="">
                            <input type="hidden" name="id" value="<?=$DetUserModification['id']?>">
                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nom </label>

                                <div class="col-sm-9">
                                    <input type="text" id="name" placeholder="Nom d'utilisateur" class="col-xs-10 col-sm-5" name="name" value="<?=$DetUserModification['name']?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Login </label>

                                <div class="col-sm-9">
                                    <input type="text" id="login" placeholder="Identifiant" class="col-xs-10 col-sm-5"name="login" value="<?=$DetUserModification['login']?>"/>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Mot de passe </label>
                                <div class="col-sm-9">
                                    <input type="password" id="password" placeholder="Mot de passe" class="col-xs-10 col-sm-5" name="password" value="<?=$DetUserModification['password']?>"/>
                                </div>
                            </div>                                                     
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Poste </label>
                                <div class="col-sm-9">
<!--                                    <input type="text" id="user-post-add" placeholder="Poste" class="col-xs-10 col-sm-5" />-->

                                    <select class="col-xs-10 col-sm-5" id="type" name="type">
                                        <option value="">&nbsp;</option>                                         
                                        <option value="127-Administrateur"  <? if($DetUserModification['post']=="Administrateur") { echo 'selected="selected"';} ?> >Administrateur</option>
                                        <option value="100-Gérant" <? if($DetUserModification['post']=="Gérant") { echo 'selected="selected"';} ?> >Gérant</option>
                                        <option value="90-Team Leader" <? if($DetUserModification['post']=="Team Leader") { echo 'selected="selected"';} ?> >Team Leader</option>
                                        <option value="50-Ouvrier" <? if($DetUserModification['post']=="Ouvrier") { echo 'selected="selected"';} ?> >Ouvrier</option>
                                        <option value="30-Poste X" <? if($DetUserModification['post']=="Poste X") { echo 'selected="selected"';} ?> >Poste X</option>
                                    </select>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">


                                <div class="col-sm-9" style="margin-left: 150px">

                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <label class="middle">
                                            <input class="ace" type="checkbox" id="checkac" name="check" <? if($DetUserModification['etat']=="0") { echo 'checked';} ?>  />
                                            <span class="lbl"> Compte active </span>
                                        </label>
                                    </span>
                                </div>
                            </div>

                            <div class="space-4"></div>
                            <div class="space-4"></div>

                            <div class="clearfix form-actions" style="margin-bottom: 0px">
                                <div class="col-md-offset-3 col-md-9">

                                    <button class="btn btn-info" type="submit" name="ModifBtn" value="1">
                                        <i class="icon-ok bigger-110"></i>

                                       Modifier
                                    </button>

                                    
                                    &nbsp; &nbsp; &nbsp;

                                    <a class="btn btn-danger " href="UsersList">
                                        <i class="icon-remove"></i>
                                        Close
                                    </a>

                                </div>
                            </div>
                        </form>
                    </div><!-- /.col -->
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>