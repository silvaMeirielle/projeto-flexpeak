<?php

class ProducaoController
{
    public function index()
    {
        $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('Home.html');
        
        $parametros = array();
        
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
    
    public function cadastro()
    {
         $loader = new \Twig\Loader\FilesystemLoader('app/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('Producao.html');
        
        $objIngredientes = Producao::selecionaTodos();
        
        $parametros = array();
        $parametros['ingerdiente'] = $objIngredientes;
        
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
    
    public function insert()
    {
        try{
            Producao::insert($_POST);
            
            echo '<script>alert("Produzido");</script>';
        } catch (Exception $e) {
            echo '<script>alert("'.$e->getMessage().'");</script>';
        }
       
    }
}
    

