<?php

include_once('confi.php');
 
if($_SERVER['REQUEST_METHOD'] == "PUT"){
 $uid = isset($_SERVER['HTTP_UID']) ? mysql_real_escape_string($_SERVER['HTTP_UID']) : "";
 $status = isset($_SERVER['HTTP_STATUS']) ? mysql_real_escape_string($_SERVER['HTTP_STATUS']) : "";
 
 
 if(!empty($uid)){
 $qur = mysql_query("UPDATE  `Prueba`.`usuarios` SET  `status` =  '$status' WHERE  `usuarios`.`ID` ='$uid';");
 if($qur){
 $json = array("status" => 1, "msg" => "Status actualizado");
 }else{
 $json = array("status" => 0, "msg" => "Error al actualizar status");
 }
 }else{
 $json = array("status" => 0, "msg" => "Id de usuario no identificado");
 }
}else{
 $json = array("status" => 0, "msg" => "Id de usuario no definido");
 }
 @mysql_close($conexion);
 
 
 header('Content-type: application/json');
 echo json_encode($json);
?>