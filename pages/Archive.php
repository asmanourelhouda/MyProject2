<?
// nulmerode la page
$pa=  filter_input(INPUT_GET,'d',FILTER_VALIDATE_INT);
//$limite=
$Archive = get("*", 'test_result');
$Total=$Archive['total'];
$where=array(
    '1='=>1
);
$InfoArchive = get("*", 'test_result',$where = null, $concats = "AND",array('DATE_HEURE'=>"DESC"),array($pa,20));
//$InfoArchive = get("*", 'test_result');
//print_r($InfoArchive);
?>


<div class="main-container" id="main-container">
    <script type="text/javascript">
        try {
            ace.settings.check('main-container', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>




        <div class="page-content">



            <!-- PAGE CONTENT BEGINS -->


            <div class="row">
                <div class="col-xs-12">

                    <div class="table-header">
                        Resultat: Archive
                    </div>

                    <div class="table-responsive">
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center">
                                        <!--															<label>
                                                                                                                                                                        <input type="checkbox" class="ace" />
                                                                                                                                                                        <span class="lbl"></span>
                                                                                                                                                                </label>-->
                                    </th>
                                    <th>Date et heure</th>
                                    <th>Code produit</th>
                                    <th class="hidden-480">Numero de serie</th>

                                    <th>Mouvement</th>
                                    <th class="hidden-480">Status</th>
                                    <th class="hidden-480">Defaut</th>
                                    <th class="hidden-480">description</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                
 <? foreach ($InfoArchive['reponse'] as $DetArchive): ?>
                                <tr>
                                   
                                    <td class="center">
                                        <label>
<!--                                            <input type="checkbox" class="ace" />
                                            <span class="lbl"></span>-->
                                        </label>
                                    </td>

                                    <td><?= $DetArchive['DATE_HEURE'] ?></td>
                                    <td><?= $DetArchive['CODE_PRODUCT'] ?></td>
                                    <td class="hidden-480"><?= $DetArchive['SERIAL_NUMBER'] ?></td>
                                    <td><?= $DetArchive['MOVEMENT'] ?></td>
                                    <td><?= $DetArchive['STATUS'] ?></td>
                                    <td><?= $DetArchive['DEFAULT'] ?></td>
                                    <td class="hidden-480" ><?= $DetArchive['DESCRIPTION'] ?></td>

                                    <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                            <a class="blue" href="#">
                                                <i class="icon-zoom-in bigger-130"></i>
                                            </a>

                                            <a class="green" href="#">
                                                <i class="icon-pencil bigger-130"></i>
                                            </a>

                                            <a class="red" href="#">
                                                <i class="icon-trash bigger-130"></i>
                                            </a>
                                        </div>

                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                            <div class="inline position-relative">
                                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-caret-down icon-only bigger-120"></i>
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
                                                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                            <span class="red">
                                                                <i class="icon-trash bigger-120"></i>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

<? endforeach; ?>


                            </tbody>
                        </table>
                        <?
                      echo  pagination($Total,50,'Archive&d=');
                        ?>
                        
                        
                      

                        
                        
                    </div>
                </div>

            </div><!-- /.row -->
        </div><!-- /.page-content -->



    </div><!-- /.main-container-inner -->


</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->

<script type="text/javascript">
    window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

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


        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            var w2 = $source.width();

            if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
                return 'right';
            return 'left';
        }
    })
</script>

