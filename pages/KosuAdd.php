<?php
echo "The time is " . date("Y-m-d H:i:s");


$InfoLigne = get("*", 'ligne');

?>

<div id="modal-table" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">&times;</span>
                    </button>
                    Ajouter un nouvel Element
                </div>
            </div>
            <div class="modal-body" style="padding: 0px">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->

                        <form class="form-horizontal"  method="POST" action="">

                            <div class="space-4"></div>

                      <div class="form-group col-xs-12">   
                   
                          <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Date </label>
                        <div class="col-xs-6 col-md-4 input-group input-group-sm">
                            
                            <input type="text" id="datepicker2" class="form-control" name="date" />
                            <span class="input-group-addon">
                                <i class="icon-calendar"></i>
                            </span>
                        </div>
                 
               </div>
                            <div class="form-group col-xs-12">
                                <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Heure </label>

                                <div class="col-xs-6 col-md-4 no-padding-right">
                                  <!--<input type="text" id="heure" placeholder="" class="col-xs-10 col-sm-5"name="heure" />-->
                                    <select class="form-control " id="form-field-select-1" name="heure">
                                <option value="">&nbsp;</option>
                               
                                <option value="1">6-7</option>
                                <option value="2">7-8</option>
                                <option value="3">8-9</option>
                                <option value="4">9-10</option>
                                <option value="5">10-11</option>
                                <option value="6">11-12</option>
                                <option value="7">12-13</option>
                                <option value="8">13-14</option>
                                <option value="9">14-15</option>
                                <option value="10">15-16</option>
                                <option value="11">16-17</option>
                                <option value="12">17-18</option>
                                <option value="13">18-19</option>
                                <option value="14">19-20</option>
                                <option value="15">20-21</option>
                                <option value="16">21-22</option>
                                <option value="17">22-23</option>
                                <option value="18">23-00</option>
                                <option value="19">00-01</option>
                                <option value="20">01-02</option>
                                <option value="21">02-03</option>
                                <option value="22">03-04</option>
                                <option value="23">04-05</option>
                                <option value="24">05-06</option>
                                    
                                    

                                       

                            </select>
                                </div>
                            </div>
    <div class="form-group ol-xs-12">
                                <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Nombre des opérateurs </label>

                                <div class="col-xs-6 col-md-4 no-padding-right">
                                    <input type="text" id="NbOp"  name="NbOp"/>
                                </div>
                            </div>
                            
                             <div class="form-group col-xs-12">
                                <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Ligne </label>

                                <div class="col-xs-6 col-md-4 no-padding-right">
                                  <!--<input type="text" id="heure" placeholder="" class="col-xs-10 col-sm-5"name="heure" />-->
                                     <select class="form-control" id="form-field-select-1" name="ligne">
                                <option value="">&nbsp;</option>
                                    <? foreach ($InfoLigne['reponse'] as $DetLigne): ?>
                                    <option value="<?= $DetLigne['id'] ?>"><?= $DetLigne['nom_ligne'] ?></option>
                                <? endforeach; ?> 




                            </select>
                                </div>
                            </div>
                            
                             <div class="space-4"></div>

                            <div class="space-4"></div>

                            <div class="space-4"></div>
                            <div class="space-4"></div>
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