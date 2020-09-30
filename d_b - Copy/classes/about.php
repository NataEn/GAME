<?php
 //conect  2 DB (members & posts) with classes
 include("connect.php");
 include("signin.php");
 include("user.php");

// include("classes/post.php");

 // check if user signin 
 $signin = new Signin();
 $user_data = $signin->check_signin($_SESSION['doorban_userid']);
