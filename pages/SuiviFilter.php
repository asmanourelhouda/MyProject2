
<?
$InfoLigne = get("*", 'ligne');
?>
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <!--//****************************************************************************************************************-->
        <div class="row">
            <div class="col-md-5 col-xs-10">
                <h3 class="header blue lighter smaller">
                    <i class="icon-calendar-empty smaller-90"></i>
                    Date debut
                </h3>

                <div class="row">
                    <div class="col-md-6 col-xs-8">
                        <div class="input-group input-group-sm">
                            <input type="text" id="datepicker2" class="form-control" />
                            <span class="input-group-addon">
                                <i class="icon-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div><!-- ./span -->
            <div class="col-md-2 "></div>
            <!--           //*************************-->
            <div class="col-md-5 col-xs-10">

                <h3 class="header blue lighter smaller">
                    <i class="icon-calendar-empty smaller-90"></i>
                    Date fin
                </h3>


                <div class="row">
                    <div class="col-md-6 col-xs-8">
                        <div class="input-group input-group-sm">
                            <input type="text" id="datepicker" class="form-control" />
                            <span class="input-group-addon">
                                <i class="icon-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div><!-- ./span -->
        </div><!-- ./row-fluid -->
        <!--//*************************************************************************************************************************************-->
        <!--<div class="space-12"></div>-->
        <div class="row">

            <div class="col-md-5 col-xs-10">
                <h3 class="header blue lighter smaller">
                    <i class="icon-time smaller-90"></i>
                    Heure Debut
                </h3>
                <div class="row">
                    <div class="col-md-6 col-xs-8">
                        <div class="input-group bootstrap-timepicker">
                            <input id="timepicker1" type="text" class="form-control">
                            <span class="input-group-addon">
                                <i class="icon-time"></i>
                            </span>
                        </div>

                    </div><!-- ./span -->
                </div>
            </div>
            <!--*************************************************************-->
            <div class="col-md-2 "></div>          
            <div class="col-md-5 col-xs-10">
                <h3 class="header blue lighter smaller">
                    <i class="icon-time smaller-90"></i>
                    Heure Fin
                </h3>
                <div class="row">
                    <div class="col-md-6 col-xs-8">
                        <div class="input-group bootstrap-timepicker">
                            <input id="timepicker2" type="text" class="form-control">
                            <span class="input-group-addon">
                                <i class="icon-time"></i>
                            </span>
                        </div>

                    </div><!-- ./span -->
                </div>
            </div><!-- ./row-fluid -->
        </div>

        <!--        **************************************************-->
        <div class="space-20"></div>


        <div class="col-md-4 col-xs-1"></div>

        <div class="col-md-4 col-xs-10">
            <div class="widget-box">
                <div class="widget-header">
                    <h4>Ligne</h4>


                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <div>
                            <label for="form-field-select-1">Selcetionner la Ligne concernée</label>

                            <select class="form-control" id="form-field-select-1">
                                <option value="">&nbsp;</option>
                                    <? foreach ($InfoLigne['reponse'] as $DetLigne): ?>
                                    <option value="<?= $DetLigne['id'] ?>"><?= $DetLigne['nom_ligne'] ?></option>
                                <? endforeach; ?> 




                            </select>
                        </div>

                    </div>
                </div><!-- /span -->




            </div>

        </div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->



</div>
<div class="clearfix form-actions">
    <div class=" col-md-12 col-xs-10" >
        <a href="<?= WEBRoot ?>/SuiviResult" class="btn btn-success " data-toggle="modal" style="margin-bottom: auto">
            
            Valider
        </a>

        <!--											&nbsp; &nbsp; &nbsp;
                                                                                                <button class="btn" type="reset">
                                                                                                        <i class="icon-undo bigger-150"></i>
                                                                                                        Reset
                                                                                                </button>-->
    </div>
</div>

<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
</script>	