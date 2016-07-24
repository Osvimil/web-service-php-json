<?php

 include_once('confi.php');
 
 $uid = isset($_GET['uid']) ? mysql_real_escape_string($_GET['uid']) :  "";
 if(!empty($uid)){
 $qur = mysql_query("SELECT nombre, email, status FROM `usuarios` WHERE ID='$uid'");
 $result =array();
 while($r = mysql_fetch_array($qur)){
 extract($r);
 $result[] = array("name" => $nombre, "email" => $email, 'status' => $status); 
 }
 $json = array("status" => 1, "info" => $result);
 }else{
 $json = array("status" => 0, "msg" => "ID de usuario no encontrado");
 }
 @mysql_close($conexion);
 
 
 header('Content-type: application/json');
 echo json_encode($json);
 ?>