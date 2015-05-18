<?
// Ajout
$Add = filter_input(INPUT_POST, 'Add');
if ($Add == 1) {
    $ref = filter_input(INPUT_POST, 'ref'); 
    $zone=  filter_input(INPUT_POST, 'zone');
    $poste=  filter_input(INPUT_POST, 'poste');
    $superv=  filter_input(INPUT_POST, 'superv');
    $tl=  filter_input(INPUT_POST, 'tl');
    $obligne=  filter_input(INPUT_POST, 'obligne');
    $limitdir=  filter_input(INPUT_POST, 'limitdir');
    $limitress=  filter_input(INPUT_POST, 'limitres');
    $limitsuper=  filter_input(INPUT_POST, 'limitsuper');
    
    


    $lignes = array(
        'id' => '',
        'nom_ligne' => $ref,
        'Zone' => $zone,
        'Poste' => $poste,
        'superviseur' => $superv,
        'teamleader' => $tl,
        'objectifligne' => $obligne,
        'limitdirecteur' => $limitdir,
        'limitresponsable' => $limitress,
        'limitsuperviseur' => $limitsuper,
      
    );

    add($lignes, 'ligne');
     redirect('LigneList');
}



$InfoUsers = get("*", 'users');

?>
<form class="form-horizontal" role="form" method="POST">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Référence </label>

        <div class="col-sm-9">
            <input type="text" id="ref"  class="col-xs-10 col-sm-5" name="ref"/>
        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-2"> Zone </label>

        <div class="col-sm-9">
            <input type="text" id="zone" class="col-xs-10 col-sm-5" name="zone"/>
            <span class="help-inline col-xs-12 col-sm-7">

            </span>
        </div>
    </div>

    <div class="space-4"></div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Poste </label>

        <div class="col-sm-9">
            <input type="text" id="poste" name="poste" class="col-xs-10 col-sm-5" />
            <span class="help-inline col-xs-12 col-sm-7">

            </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Superviseur </label>

        <div class="col-sm-9">
            <select class="col-sm-4 col-md-5" id="form-field-select-1" name="superv">
                                <option value="">&nbsp;</option>
                                <? foreach ($InfoUsers['reponse'] as $DetUsers): ?>
                                  <? if($DetUsers['type']==100): ?>
                                <option value="<?= $DetUsers['id'] ?>"><?= $DetUsers['name'] ?></option>
                                <? endif; ?> 
                                     <? endforeach; ?> 
                             
                            </select>  
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Team Leader </label>

        <div class="col-sm-9">
            <select class="col-sm-4 col-md-5" id="form-field-select-1" name="tl">
                                <option value="">&nbsp;</option>
                                <? foreach ($InfoUsers['reponse'] as $DetUsers): ?>
                                  <? if($DetUsers['type']==90): ?>
                                <option value="<?= $DetUsers['id'] ?>"><?= $DetUsers['name'] ?></option>
                                <? endif; ?> 
                                     <? endforeach; ?> 
                             
                            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Objectif ligne </label>

        <div class="col-sm-9">
            <input type="text" id="obligne" class="col-xs-10 col-sm-5" name="obligne" />
            <span class="help-inline col-xs-12 col-sm-7">

            </span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Limite directeur </label>

        <div class="col-sm-9">
            <input type="text" id="limitdir" class="col-xs-10 col-sm-5" name="limitdir" />
            <span class="help-inline col-xs-12 col-sm-7">

            </span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Limite responsable </label>

        <div class="col-sm-9">
            <input type="text" id="limitres" class="col-xs-10 col-sm-5" name="limitres" />
            <span class="help-inline col-xs-12 col-sm-7">

            </span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Limite superviseur </label>

        <div class="col-sm-9">
            <input type="text" id="limitsuper" class="col-xs-10 col-sm-5" name="limitsuper" />
            <span class="help-inline col-xs-12 col-sm-7">

            </span>
        </div>
    </div>

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-success" type="submit" name="Add" value="1">
                <i class="icon-ok bigger-110"></i>
                Submit
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                <i class="icon-undo bigger-110"></i>
                Reset
            </button>
        </div>
    </div>

</form>