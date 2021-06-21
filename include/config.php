<?php
 $dbname = "schpay";

try {
    $con = new PDO("mysql:host=localhost;dbname=".$dbname, "root", "");
//    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERR_NONE);
}catch (PDOException $e){
   echo $e->getMessage();
    CreateScript();
}

function CreateScript(){
    global $dbname;
    //Connection
    $mysq = new mysqli("localhost","root","");
    $sql= "CREATE DATABASE IF NOT EXISTS ".$dbname;
    $run = $mysq->query($sql);

    if ($run){
        header("location:index.php");
    }else{
        return "Failed".mysqli_error($mysq);
    }
}