<?php
session_start();
define('__ROOT__', dirname(dirname(__FILE__)));
$config = include (__ROOT__.'/../config.php');

$path = "http://" . $_SERVER['HTTP_HOST'].$config['APPLICATION'].'/';

if(isset($_GET['applicacion']))
{
    $aplicacion = $_GET['applicacion'];
    $modulo = 1;
}
if(isset($_POST['action']))
{
    echo json_encode($_POST);
    $module = $_POST['module'];
}

?>

<style type="text/css">
    body {
        color: #566787;
        background: #f7f5f2;
		font-family: 'Roboto', sans-serif;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px auto;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
		color: #fff;
		background: #40b2cd;		
		padding: 16px 25px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
	.search-box {
        position: relative;
        float: right;
    }
	.search-box .input-group {
		min-width: 300px;
		position: absolute;
		right: 0;
	}
	.search-box .input-group-addon, .search-box input {
		border-color: #ddd;
		border-radius: 0;
	}	
    .search-box input {
        height: 34px;
        padding-right: 35px;
        background: #f4fcfd;
        border: none;
        border-radius: 2px !important;
    }
	.search-box input:focus {
        background: #fff;
	}
	.search-box input::placeholder {
        font-style: italic;
    }
	.search-box .input-group-addon {
        min-width: 35px;
        border: none;
        background: transparent;
        position: absolute;
        right: 0;
        z-index: 9;
        padding: 6px 0;
    }
    .search-box i {
        color: #a0a5b1;
        font-size: 19px;
        position: relative;
        top: 2px;
    }
    table.table {
        table-layout: fixed;
        margin-top: 15px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:first-child {
        width: 60px;
    }
    table.table th:last-child {
        width: 120px;
    }
    table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
    }
	table.table td a.view {
        color: #03A9F4;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }    
</style>
<script type="text/javascript">
    
function LoadModal(mode,code){
   var parm = {code: code,mode: mode};
    $.ajax({
            data:  parm,
            url:   '../Admisiones/Views/SolInformacion/ModalBase.php',
            type:  'POST',
            async: true,
            beforeSend: function () {
                    $("#BaseModalUpdate").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                    $("#BaseModalUpdate").html(response);
                    $("#UPDATE").modal();
            },error: function(response){
                                    //alert(response);
                            }
    });
}
$(document).ready(function(){

    $("#search").on("keyup", function() {
        var term = $(this).val().toLowerCase();
        $("table tbody tr").each(function(){
            $row = $(this);
            var name = $row.find("td:nth-child(2)").text().toLowerCase();
            console.log(name);
            if(name.search(term) < 0){                
                $row.hide();
            } else{
                $row.show();
            }
        });
    });
    
    var parametros = {mode: 'INSERT'};
    
    $.ajax({
            data:  parametros,
            url:   '../Admisiones/Views/SolInformacion/ModalBase.php',
            type:  'POST',
            async: true,
            beforeSend: function () {
                    $("#BaseModalInsert").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                    $("#BaseModalInsert").html(response);
            },error: function(response){
                                    //alert(response);
                            }
    });
    
    
});


</script>
<div class="container">
    <div class="table-wrapper">			
        <div class="table-title">
            <div class="row">
                    <div class="col-sm-8">
                            <h2>Customer <b>Details</b></h2>
                    </div>
                <div class="col-sm-2">
                    <div class="search-box">
                        <div class="input-group">								
                            <input type="text" id="search" class="form-control" placeholder="Search by Name">
                            <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#INSERT">
                        Agregar
                    </button>
                </div>
            </div>
        </div>
        <?php include_once(__ROOT__.'/Views/'.$aplicacion.'/Table.php');?>

    </div>
</div>

<div id="BaseModalInsert">
    
</div>

<div id="BaseModalUpdate">
    
</div>
<div id="BaseModalDelete">
    
</div>
