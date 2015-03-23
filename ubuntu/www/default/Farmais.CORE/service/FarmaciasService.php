<?php
  include_once($_SERVER['DOCUMENT_ROOT']."/demo_farmais/Farmais.CORE/dao/FarmaciasDAO.php");
  include_once($_SERVER['DOCUMENT_ROOT']."/demo_farmais/Farmais.CORE/service/IFarmaciasService.php");
  include_once($_SERVER['DOCUMENT_ROOT']."/demo_farmais/Farmais.CORE/domain/Farmacias.class.php");

  class FarmaciasService implements IFarmaciasService{
      public function getTodasFarmaciasPorLatitudeLongitude($latitude,$longitude){
        $dao = new FarmaciasDAO();
        
        return $dao->getTodasFarmaciasPorLatitudeLongitude($latitude,$longitude);
      }
  }
?>
