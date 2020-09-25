<?php
session_start();
if(isset($_SESSION['doorban_userid']))
{
    
    unset($_SESSION['doorban_userid']);

}

header("Location: signin.php");
die;
