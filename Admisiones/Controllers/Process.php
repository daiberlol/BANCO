<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once ('../Controllers/SolInformacionController.php');
$solinformacionController = new SolInformacionController(1);

if(isset($_POST['action']))
{
    if ($_POST['action'] == 'INSERT')
    {
        echo $solinformacionController->Agregar($_POST['admision_form_inf_ape'], $_POST['admision_form_inf_cid'], $_POST['admision_form_inf_fech'], $_POST['admision_form_inf_nom'], $_POST['admision_form_inf_telf']);
        
    }
    if ($_POST['action'] == 'DELETE')
    {
        echo json_encode($_POST);
    }
    if ($_POST['action'] == 'UPDATE')
    {
        echo $solinformacionController->Editar($_POST['code'], $_POST['admision_form_inf_ape'], $_POST['admision_form_inf_cid'], $_POST['admision_form_inf_fech'], $_POST['admision_form_inf_nom'], $_POST['admision_form_inf_telf']);
    }
    
}else
{
    return;
}
?>



