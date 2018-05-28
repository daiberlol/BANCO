<?php

require_once('/../../Controllers/RolController.php');
$rolcontroller = new RolController();
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th style="width: 60%;">Nombre</th>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        <?php 
            $registros = $rolcontroller->Listar();
            if(count($registros > 0))
            {
                foreach($registros as $row)
                {
        ?>
        <tr>
            <td><?php echo $row->getRol_id(); ?></td>
            <td><?php echo $row->getRol_nombre(); ?></td>
            <td>
                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
            </td>
        </tr>
            <?php 
                }
            }
            ?>
    </tbody>
</table>