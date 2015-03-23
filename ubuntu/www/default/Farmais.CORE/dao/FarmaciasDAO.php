<?php

  include_once($_SERVER['DOCUMENT_ROOT']."/demo_farmais/Farmais.CORE/dao/IFarmaciasDAO.php");
  include_once($_SERVER['DOCUMENT_ROOT']."/demo_farmais/Farmais.CORE/domain/Farmacias.class.php");

  class FarmaciasDAO implements IFarmaciasDAO{
      
      public function getTodasFarmaciasPorLatitudeLongitude($latitude,$longitude){
        include_once($_SERVER['DOCUMENT_ROOT']."/demo_farmais/Farmais.CORE/config/Connection.inc.php");   
      
        $sql = "SELECT *,"; 
        $sql = $sql . "((3956 *"; 
        $sql = $sql . "2 *"; 
        $sql = $sql . "ASIN(";
        $sql = $sql . "SQRT(POWER(SIN((? - abs(dest.latitude)) * "; 
        $sql = $sql . "pi()/180 / 2),2) + "; 
        $sql = $sql . "COS(? * pi()/180 ) * "; 
        $sql = $sql . "COS(abs(dest.latitude) * pi()/180) * ";        
        $sql = $sql . "POWER(SIN((? - abs(dest.longitude)) * ";  
        $sql = $sql . "pi()/180 / 2), 2)) ";
        $sql = $sql . ") "; 
        $sql = $sql . ") * 1.609344) as distancia ";
        $sql = $sql . "FROM tb_farmacias dest ";
        $sql = $sql . "having distancia < ? ";
        $sql = $sql . "ORDER BY distancia "; 
        $sql = $sql . "limit 100;";
        
        $stmt = $con->prepare($sql);
        $stmt->bind_param('dddi', abs($latitude), abs($longitude),abs($longitude),$raioKM);
        $stmt->execute() or die(mysqli_error());  

       $stmt->store_result();
       $num_of_rows = $stmt->num_rows;
   
       $stmt->bind_result($id_loja, $razaosocial, $cnpj, $unidade,$endereco,$numero,$bairro,$cidade,$uf,$cep,$ddd,$telefone,$contato,$email,$ie,$latitudeR,$longitudeR,$distancia);   
        
       $array = array();
        
       while ($stmt->fetch()) {
          $farmacias = new Farmacias();
          
          $farmacias -> codigo = $id_loja;
          $farmacias -> razaoSocial = $razaosocial;
          $farmacias -> cnpj = $cnpj;
          $farmacias -> unidade = $unidade;
          $farmacias -> endereco = $endereco;
          $farmacias -> numero = $numero;
          $farmacias -> bairro = $bairro;
          $farmacias -> cidade = $cidade;
          $farmacias -> uf = $uf;
          $farmacias -> cep = $cep;
          $farmacias -> ddd = $ddd;
          $farmacias -> telefone = $telefone;
          $farmacias -> contato = $contato;
          $farmacias -> email = $email;
          $farmacias -> ie = $ie;
          $farmacias -> latitude = $latitudeR;
          $farmacias -> longitude = $longitudeR;
          $farmacias -> distancia = $distancia;
          
        
           array_push($array,  $farmacias);                               
        }
        
        return $array;  
  
      }
  }
?>
