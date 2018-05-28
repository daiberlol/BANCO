<?php 
 require_once("../Controllers/MenuRolController.php");
 $config = include ('../../config.php');

?>
<div class="leftside-navigation">
    <ul class="sidebar-menu" id="nav-accordion">
       <?php 
            $menuRolController = new MenuRolController($_SESSION['rol']);
            $menuJson = json_decode($menuRolController->Buscar());

             foreach ($menuJson as $listMenu ) {
              $submenu = json_decode($menuRolController->BuscarSubMenu($listMenu->menu_id));
              if(count($submenu)==0){
            ?>
        <li>
            <a class="active" href="javascript:;" onClick="cargarPagina('<?php echo "http://" . $_SERVER['HTTP_HOST'].$config['APPLICATION'].'/'.$listMenu->menu_link;?>','wrapper','<?php echo $listMenu->menu_aplicacion?>')">
               <span><?php echo  $listMenu->menu_item; ?></span>
            </a>
        </li>
        <?php 
                         }else{
                    ?>

       <li class="sub-menu">
            <a href="javascript:;">
                <i class="fa fa-book"></i>
                <span><?php echo  $listMenu->menu_item; ?></span>
            </a>

            <ul class="sub">
                
            <?php 
            foreach ($submenu as $SubMenuItem ) {

                                        ?>

                                        <li><a href="javascript:;" onClick="cargarPagina('<?php echo "http://" . $_SERVER['HTTP_HOST'].$config['APPLICATION'].'/'.$SubMenuItem->menu_link; ?>','wrapper','<?php echo $SubMenuItem->menu_aplicacion?>')"><?php echo $SubMenuItem->menu_item;?></a></li>
            <?php }
?>
            </ul>
        </li>
        <?php 
                          } // fin del si
                         } // fin del foreach
                        ?>



    </ul>            
</div>