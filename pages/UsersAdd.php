

<div id="modal-table" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    Ajouter un nouvel utilisateur
                </div>
            </div>
            <div class="modal-body" style="padding: 0px">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <form class="form-horizontal"  method="POST" action="">

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nom </label>

                                <div class="col-sm-9">
                                    <input type="text" id="name" placeholder="Nom d'utilisateur" class="col-xs-10 col-sm-5" name="name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Login </label>

                                <div class="col-sm-9">
                                    <input type="text" id="login" placeholder="Identifiant" class="col-xs-10 col-sm-5"name="login" />
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Mot de passe </label>
                                <div class="col-sm-9">
                                    <input type="password" id="password" placeholder="Mot de passe" class="col-xs-10 col-sm-5" name="password"/>
                                </div>
                            </div>                                                     
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Poste </label>
                                <div class="col-sm-9">
<!--                                    <input type="text" id="user-post-add" placeholder="Poste" class="col-xs-10 col-sm-5" />-->

                                    <select class="col-xs-10 col-sm-5" id="type"name="type">
                                        <option value="">&nbsp;</option>                                         
                                        <option value="127-Administrateur">Administrateur</option>
                                        <option value="100-G">Supérviseur</option>
                                        <option value="90-Tea">Team Leader</option>
                                        <option value="30-Dir">Directeur</option>
                                    </select>
                                </div>
                            </div>

                            <div class="space-4"></div>

                            <div class="form-group">


                                <div class="col-sm-9" style="margin-left: 150px">

                                    <span class="help-inline col-xs-12 col-sm-7">
                                        <label class="middle">
                                            <input class="ace" type="checkbox" id="checkac"name="check" />
                                            <span class="lbl"> Compte active </span>
                                        </label>
                                    </span>
                                </div>
                            </div>

                            <div class="space-4"></div>
                            <div class="space-4"></div>

                            <div class="clearfix form-actions" style="margin-bottom: 0px">
                                <div class="col-md-offset-3 col-md-9">

                                    <button class="btn btn-info" type="submit" name="Add" value="1">
                                        <i class="icon-ok bigger-110"></i>

                                        AJouter
                                    </button>

                                    &nbsp; &nbsp; &nbsp;
                                    <button class="btn" type="reset">
                                        <i class="icon-undo bigger-110"></i>
                                        Reset
                                    </button>
                                    &nbsp; &nbsp; &nbsp;

                                    <button class="btn btn-danger " data-dismiss="modal">
                                        <i class="icon-remove"></i>
                                        Close
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div><!-- /.col -->
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>