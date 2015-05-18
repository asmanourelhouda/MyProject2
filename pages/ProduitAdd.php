<?

// Ajout
$Add = filter_input(INPUT_POST, 'Add');
if ($Add == 1) {
    $ref = filter_input(INPUT_POST, 'ref'); 
    $lignes=  filter_input(INPUT_POST, 'Ligne');
    


    $produit = array(
        'id' => '',
        'NAME' => $ref,
        'ligne' => $lignes,
      
    );

    add($produit, 'produit');
    //   redirect('Dashboard');
}


$InfoLigne = get("*", 'ligne');

?>
<form class="form-horizontal" role="form" method="POST">
    <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Référence </label>

        <div class="col-sm-4">
            <input type="text" id="ref"  class="form-control" name="ref" />
        </div>
    </div>

    <div class="space-4"></div>

     <div class="form-group">
        <label class="col-sm-3 control-label no-padding-right" for="form-input-readonly"> Ligne </label>

        <div class="col-sm-4">
            <select class="form-control" id="form-field-select-1" name="Ligne">
                                <option value="">&nbsp;</option>
                                    <? foreach ($InfoLigne['reponse'] as $DetLigne): ?>
                                    <option value="<?= $DetLigne['id'] ?>"><?= $DetLigne['nom_ligne'] ?></option>
                                <? endforeach; ?> 




                            </select>
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