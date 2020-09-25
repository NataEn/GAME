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


?>


<html>

    <head>
        <title>Doorban | check email </title>
        <link rel="stylesheet" type="text/css "href="./css/sign.css">
        <meta name="viewport" content="initial-scale=1.0, width=device-width"/>
    <style>
        a{
        display: inline-block;
        color: black;
        background: cornflowerblue;
        border: 1px dotted #ccc;
        padding: 6px 13px;
        }
    </style>
    </head>

    <body>
    <div id="grid" style="text-align: center;" >
    
    <!-- top bar-->
    <div id="bar1" style="background-color: cornflowerblue;"> 
        <div>
            <div id="logo" ><img src="./image/dblogo1234.png" style="width:100px;float:left;"></div>
            </div>
    </div>
<div>
    <h2 > Your account is verified.</h2>
    <p> <a href="signin.php" style="text-decoration:none ;">Sign in</a>
    
     </p>
     </div>
    </div>