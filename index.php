<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
        <?php
        
        require_once 'app/Core/Core.php';
        
        require_once 'lib/DataBase/Connection.php';
        
        require_once 'app/Controller/HomeController.php';
        require_once 'app/Controller/ErroController.php';
        
        require 'app/Model/Producao.php';
        
        require 'vendor/autoload.php';
        
        
        $template = file_get_contents('app/Template/');
        
        ob_start();
            $core = new Core; 
            $core->start($_GET);

            $saida = ob_get_contents();
        ob_end_clean();
  
        $tplpronto = str_replace('{{area_dinamica}}', $saida, $template);
        echo $tplpronto;
        
        ?>
   
