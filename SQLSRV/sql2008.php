<?php

$serverName = "srvsqlvm\wave"; //serverName\instanceName
$connectionInfo = array( "Database"=>"wave", "UID"=>"sa", "PWD"=>"maria");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>
