<?php
  include_once($_SERVER['DOCUMENT_ROOT']."Farmais.CORE/service/FarmaciasService.php");
  
  $farmaciasService = new FarmaciasService();
  $parametrosTemp = json_decode(stripslashes($_POST['parametros']), true);
  
  echo json_encode(
    $farmaciasService ->getTodasFarmaciasPorLatitudeLongitude(
      floatval($parametrosTemp['latitude']), 
      floatval($parametrosTemp['longitude'])));
  
?>
