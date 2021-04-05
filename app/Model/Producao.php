<?php

class Producao
{
    public static function selecionaTodos(){
        $con = Connection::getConn();
    
        $sql = "Select * from inredientes";
        $sql = $con->prepare($sql);
        $sql->execute();
        
        $resultado = $sql->fetchObject('Producao');
     
        if(!$resultado){
            throw new Exception("Não foi encontrado nenhum resgistro");
            
        } else {
            $resultado->ingredientes = Ingredientes::selecionarIngredientes;
        }
        
        return $resultado;
    }
    
    public static function selecionaTodosFragancias(){
        $con = Connection::getConn();
    
        $sql = "Select * from fragancias";
        $sql = $con->prepare($sql);
        $sql->execute();
        
        $resultado = $sql->fetchObject('Producao');
     
        if(!$resultado){
            throw new Exception("Não foi encontrado nenhum resgistro");
            
        } else {
            $resultado->fragancias = Fragancias::selecionarFragancias;
        }
        
        return $resultado;
    }
    
    public static function selecionaPorID($idPost){
        $con = Connection::getConn();
    
        $sql = "Select * from fragancias where id = :frag_cod";
        $sql = $con->prepare($sql);
        $sql->bindValue(':frag_cod', $idPost, PDO::PARAM_INT);
        $sql->execute();
        
        $resultado = $sql->fetchObject('Producao');
     
        if(!$resultado){
            throw new Exception("Não foi encontrado nenhum resgistro");
            
        } else {
            $resultado->fragancias = Fragancias::selecionarFragancias($resultado->frag_id);
        }
        
        return $resultado;
    }
    
     public static function selecionaPorIDIgre($idPost){
        $con = Connection::getConn();
    
        $sql = "Select * from ingredientes where id = :ing_cod";
        $sql = $con->prepare($sql);
        $sql->bindValue(':ing_cod', $idPost, PDO::PARAM_INT);
        $sql->execute();
        
        $resultado = $sql->fetchObject('Producao');
     
        if(!$resultado){
            throw new Exception("Não foi encontrado nenhum resgistro");
            
        } else {
            $resultado->ingredientes = Ingredientes::selecionarIngredientes;
        }
        
        return $resultado;
    }
    
    public static function insert($dadosPost)
    {
        if(empty($dadosPost['per_nome'])OR empty($dadosPost['per_ml'])){
            throw new Exception("Preencha todos os campos");
            
            return false;
        }
        
        $com = Connection::getConn();
        
        $sql = $com->prepare('insert into perfume (per_nome, per_ml,per_ing_id, per_frag_cod) values (:tit, :cont)');
        $sql->bindValue(':tit', $dadosPost['per_nome']);
        $sql->bindValue(':tit', $dadosPost['per_ml']);
        $sql->bindValue(':tit', $dadosPost['per_ing_id']);
        $sql->bindValue(':tit', $dadosPost['per_frag_cod']);
        $res = $sql->execute();
        
        if($res == 0){
             throw new Exception("Falha ao inserir dados");
            
            return false;
        }
        return true;
    }   
} 
