<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once ("../../Controllers/SolInformacionController.php");

if(isset($_POST['mode']))
{
    $mode = $_POST['mode'];
    $code = $_POST['code'];
}

?>

<div class="modal fade" id="<?php echo $mode ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Insert modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form name="formInsert" action="../Admisiones/Controllers/Process.php" method="POST">
                <?php 
                    if($mode == 'INSERT'){
                        require_once ('/Insert.html');
                    }
                    if($mode == 'DELETE'){
                        require_once ('/Delete.html');
                    }
                    if($mode == 'UPDATE'){
                        require_once ('/Update.php');
                    }
                ?>
            </form>
        </div>
      </div>
    </div>
</div>