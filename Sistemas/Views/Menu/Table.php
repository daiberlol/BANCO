<?php

require_once('/../../Controllers/MenuController.php');
$menucontroller = new MenuController();
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th style="width: 22%;">Descripcion</th>
            <th>Padre</th>
            <th>Link</th>
            <th>Aplicacion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $registros = $menucontroller->Listar();
            if(count($registros > 0))
            {
                foreach($registros as $row)
                {
        ?>
        <tr>
            <td><?php echo $row->getMenu_id(); ?></td>
            <td><?php echo $row->getMenu_item(); ?></td>
            <td><?php echo $row->getMenu_padre(); ?></td>
            <td><?php echo $row->getMenu_link(); ?></td>
            <td><?php echo $row->getMenu_aplicacion(); ?></td>
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