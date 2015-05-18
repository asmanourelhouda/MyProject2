
<?
    $InfoKosuModification = get("*", 'donnees', array('id=' => $idModif));
    $DetKosuModification = $InfoKosuModification['reponse'][0];
?>

<div id="modal-table-modificaion" class="modal show" tabindex="0">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    Modifier les données
                </div>
            </div>
            <div class="modal-body" style="padding: 0px">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <form class="form-horizontal"  method="POST" action="">
                            <input type="hidden" name="id" value="<?=$DetKosuModification['id']?>">
                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre des opérateurs </label>

                                <div class="col-sm-9">
                                    <input type="text" id="NbOp" placeholder="Nombre des opérateurs" class="col-xs-10 col-sm-5" name="NbOp" value="<?=$DetKosuModification['nbr_op']?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Temps </label>

                                <div class="col-sm-9">
                                    <input type="text" id="temps" placeholder="Identifiant" class="col-xs-10 col-sm-5"name="temps" value="<?=$DetKosuModification['temps']?>"/>
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre des pèces bonne  </label>

                                <div class="col-sm-9">
                                    <input type="text" id="NbP" placeholder="Nombre des pèces bonne " class="col-xs-10 col-sm-5"name="NbP" value="<?=$DetKosuModification['nb_piece_bonnes']?>"/>
                                </div>
                            </div>
                                                                            
                     
                            <div class="space-4"></div>

                          

                            <div class="space-4"></div>
                            <div class="space-4"></div>

                            <div class="clearfix form-actions" style="margin-bottom: 0px">
                                <div class="col-md-offset-3 col-md-9">

                                    <button class="btn btn-info" type="submit" name="ModifBtn" value="1">
                                        <i class="icon-ok bigger-110"></i>

                                       Modifier
                                    </button>

                                    
                                    &nbsp; &nbsp; &nbsp;

                                    <a class="btn btn-danger " href="KosuList">
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