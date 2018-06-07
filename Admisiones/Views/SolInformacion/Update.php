<?php 
$solinformacionController = new SolInformacionController(1);
$solicitud = $solinformacionController->Buscar($code);
?>


<div class="form-group">
    <div class="row">
         <div class="col-md-6 col-sm-12 form-group">
            <label>Nombre del solicitante</label>
            <input type="text" name="admision_form_inf_nom" id="admision_form_inf_nom" class="form-control" value="<?php echo $solicitud['admision_form_inf_nom']?>">
         </div>
        <div class="col-md-6 col-sm-12 form-group">
            <label>Apellido del solicitante</label>
            <input type ="text" name="admision_form_inf_ape" id="admision_form_inf_ape" class="form-control" value="<?php echo $solicitud['admision_form_inf_ape']?>">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6 col-sm-12 form-group">
            <label>Fecha de nacimiento</label>
            <input type="date" name="admision_form_inf_fech" id="admision_form_inf_fech" class="form-control" value="<?php echo $solicitud['admision_form_inf_fech']?>">
        </div>
        <div class="col-md-6 col-sm-12 form-group">
            <label>Telefono</label>
            <input type="number" name="admision_form_inf_telf" id="admision_form_inf_telf" class="form-control" value="<?php echo $solicitud['admision_form_inf_telf']?>">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-12 form-group">
            <label>N° de Identificación</label>
            <input type="number" name="admision_form_inf_cid" id="admision_form_inf_cid" class="form-control" value="<?php echo $solicitud['admision_form_inf_cid']?>">
        </div>
    </div>
</div>
<input type="hidden" name="action" value="UPDATE">
<input type="hidden" name="module" value="Admisiones">
<input type="hidden" name="code" value="<?php echo $solicitud['admision_form_id']?>">
<div class="modal-footer">
   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   <button type="submit" class="btn btn-primary">Agregar</button>
</div>