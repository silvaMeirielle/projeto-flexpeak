<?php

 class Core
 {
     public function start($urlGet)
     {
         if(isset($urlGet['metodo'])){
             $acao = $urlGet['metodo'];
         }else {
             $acao = 'index';
         }
         
         if(isset($urlGet['pagina'])){
           $controller = ucfirst($urlGet['pagina'].'Controller');    
         } else {
           $controller = 'HomeController';    
         }
         
         
         if(!class_exists($pagina)){
             $controller = 'ErroController';
         }
         
         if(isset($urlGet['id']) && $urlGet['id'] != NULL){
             $id = $urlGet['id'];
         } else {
             $id = NULL;
         }
         
         call_user_func_array(array(new $controller, $acao), array('id' => $id));
     }
 }

