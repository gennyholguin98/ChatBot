<?php


    $host = 'localhost';
        $dbname = 'phpdb';
        $usuario = 'root';
        $contrasena= '';
    

        $conectar = mysql_connect($host,$usuario,$contrasena,$dbname);

        if(!$conectar){
            die("no hay conexion ".mysqli_connect_error());
        }else{
            echo "conexion exitosa";
        }
    


?>