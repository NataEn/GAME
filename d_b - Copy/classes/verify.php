<?php
if(isset($_GET['vkey'])){
    //process verification
    $vkey = $_GET['vkey'];

    $mysqli = NEW MySQLI('localhost','root','','doorban');
    $resultSet = $mysqli->query("SELECT verified,vkey FROM members where verified = 0 AND vkey = '$vkey' limit 1 ");

    if($resultSet->num_rows == 1){
        //validate the email
        $update = $mysqli->query("UPDATE MEMBERS SET verified = 1 where vkey = '$vkey' limit 1");

    
    }
}else{
    die("Somthing went wrong");
}