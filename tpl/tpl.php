<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Dashboard</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="UTF-8">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />

        <meta name="description" content="3 styles with inline editable feature" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />
        <link rel="stylesheet" href="assets/css/jquery.gritter.css" />
        <link rel="stylesheet" href="assets/css/select2.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-editable.css" />
        <link rel="stylesheet" href="assets/css/ace-fonts.css" />
        <link rel="stylesheet" href="assets/css/ace.min.css" />
        <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
        <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="assets/css/mycss.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />








    </head>

    <body>
        <div>
            <div id="wrapper">
                <!--BEGIN BACK TO TOP-->
                <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
                <!--END BACK TO TOP-->


                <!--BEGIN TOPBAR-->
                <? include 'modules/TopPage.php'; ?>
                <!--END TOPBAR-->

                <div id="wrapper">
                    <? include 'modules/NavBar.php'; ?>

                    <div class="col-md-10 bg_w">  
                        <!--BEGIN CONTENT-->
                        <?= $pages ?>
                        <!--END CONTENT-->

                    </div>


                    <!--BEGIN FOOTER-->
<!--                    <div id="footer" style="position: absolute; bottom: 0; background: #FFFFFF; height: 60px; margin-left: 300px; text-align: center; line-height: 60px">
                        <div class="copyright">
                            <a href="http://themifycloud.com">2014 © KAdmin Responsive Multi-Purpose Template</a></div>
                    </div>-->

                </div>
                <!--END PAGE WRAPPER-->

            </div>
        </div>

        <div id="modal-from-dom" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySuup" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title TitD" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                        <p>Attention vous êtes sur le point de faire une suppression d'une ligne d'enregistrement.</p>
                        <p>Vous voulez continuer?</p>

                    </div> 
                    <div class="modal-footer">
                        <a href="<?= $Pga ?>&SuppID=" class="btn btn-danger">Oui</a>
                        <!-- <a href="delete.php?some=param&ref=" class="btn danger">Yes 2</a> -->
                        <a href="#" data-dismiss="modal" class="btn btn-default">Non</a>
                    </div>
                </div>
            </div> 
        </div> 
        <script type="text/javascript">
            window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
        </script>


        <script type="text/javascript">
            if ("ontouchend" in document)
                document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
        </script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/typeahead-bs2.min.js"></script>

        <script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>
        <script src="assets/js/jquery.easy-pie-chart.min.js"></script>
        <script src="assets/js/jquery.sparkline.min.js"></script>
        <script src="assets/js/flot/jquery.flot.min.js"></script>
        <script src="assets/js/flot/jquery.flot.pie.min.js"></script>
        <script src="assets/js/flot/jquery.flot.resize.min.js"></script>


        <script src="assets/js/ace-elements.min.js"></script>
        <script src="assets/js/ace.min.js"></script>

        <script src="assets/js/ace-extra.min.js"></script>
        <script src="assets/js/jquery.gritter.min.js"></script>
        <script src="assets/js/bootbox.min.js"></script>

        <script src="assets/js/jquery.hotkeys.min.js"></script>
        <script src="assets/js/bootstrap-wysiwyg.min.js"></script>
        <script src="assets/js/select2.min.js"></script>

        <script src="assets/js/fuelux/fuelux.spinner.min.js"></script>
       <!-- <script src="assets/js/x-editable/bootstrap-editable.min.js"></script>
        <script src="assets/js/x-editable/ace-editable.min.js"></script>-->
        <script src="assets/js/jquery.maskedinput.min.js"></script>

        <script src="assets/js/highcharts.js"></script>
        <script src="assets/js/exporting.js"></script>
        <script src="assets/js/date-time/bootstrap-datepicker.min.js"></script>
        <script src="assets/js/date-time/bootstrap-timepicker.min.js"></script>
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/jquery.dataTables.bootstrap.js"></script>
        <script src="assets/js/canvasjs.min.js"></script>




        <script src="assets/js/Myjs.js"></script>





    </body>
</html>
