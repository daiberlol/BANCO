<?php

require_once('/../../Controllers/SolInformacionController.php');
$solinformacionController = new SolInformacionController($modulo);

?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th style="width: 22%;">Nombre completo</th>
            <th>Fecha de nacimiento</th>
            <th>Telefono</th>
            <th>Identificación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $registros = $solinformacionController->Listar();
            if(count($registros) > 0 && !$registros == null)
            {
                foreach($registros as $row)
                {
        ?>
        <tr>
            <td><?php echo $row->getAdmision_form_id(); ?></td>
            <td><?php echo $row->getAdmision_form_inf_nom().' '.$row->getAdmision_form_inf_ape(); ?></td>
            <td><?php echo $row->getAdmision_form_inf_fech(); ?></td>
            <td><?php echo $row->getAdmision_form_inf_telf(); ?></td>
            <td><?php echo $row->getAdmision_form_inf_cid(); ?></td>
            <td>
                <a href="#" class="edit" title="Edit"  data-toggle="modal" data-target="#UPDATE" onClick="LoadModal('UPDATE',<?php echo $row->getAdmision_form_id(); ?>)" ><i class="material-icons">&#xE254;</i></a>
                <a href="#" class="delete" title="Delete"  data-toggle="modal" data-target="#DELETE" data-formid="<?php echo $row->getAdmision_form_id(); ?>" ><i class="material-icons">&#xE872;</i></a>
            </td>
        </tr>
            <?php 
                }
            }
            ?>
    </tbody>
</table>