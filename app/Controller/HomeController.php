<?php

 class HomeController
 {
     public function index()
     
     {        
         try {
             $colecProducao = Producao::selecionaTodos();
             
            $loader = new \Twig\Loader\FilesystemLoader('app/View');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('home.html');
            
            $parametros = array();
            $parametros['producao'] = $colecProducao;
            
            $template->render($parametros);
            echo $conteudo;
            
            $colecProducao = Producao::selecionaTodos();
         
       
             
         } catch (Exception $e) {
          echo $e->getMenssage();   
         }
         
     }
 }
