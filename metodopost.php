<?php 


include_once('confi.php');
 
if($_SERVER['REQUEST_METHOD'] == "POST"){

 $name = isset($_POST['name']) ? mysql_real_escape_string($_POST['name']) : "";
 $email = isset($_POST['email']) ? mysql_real_escape_string($_POST['email']) : "";
 $password = isset($_POST['pwd']) ? mysql_real_escape_string($_POST['pwd']) : "";
 $status = isset($_POST['status']) ? mysql_real_escape_string($_POST['status']) : "";
 

 $sql = "INSERT INTO `Prueba`.`usuarios` (`ID`, `nombre`, `email`, `password`, `status`) VALUES (NULL, '$name', '$email', '$password', '$status');";
 $qur = mysql_query($sql);
 if($qur){
 $json = array("status" => 1, "msg" => "USUARIO AGREGADO CORRECTAMENTE");
 }else{
 $json = array("status" => 0, "msg" => "ERROR AL AGREGAR USUARIO");
 }
}else{
 $json = array("status" => 0, "msg" => "METOD DE RESPUESTA NO ACEPTADO");
}
 
@mysql_close($conexion);
 

 header('Content-type: application/json');
 echo json_encode($json);

?>