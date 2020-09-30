<?php
 //conect  2 DB (members & posts) with classes
 include("connect.php");
 include("signin.php");
 include("user.php");

// include("classes/post.php");

 // check if user signin 
 $signin = new Signin();
 $user_data = $signin->check_signin($_SESSION['doorban_userid']);

$first_name = $user_data['first_name'];
$last_name = $user_data['last_name'];
$email = $user_data['email'];
$name = $first_name .$last_name;


 //send verification mail
 
    if (isset($_POST['subject'])) {
                    $subject = $_POST['subject'];
                
                }
    if (isset($_POST['email'])) {
                    $mailFrom =$_POST['email'];
                }
    if (isset($_POST['msg'])) {
                    $msg = $_POST['msg'];
                }


    if(isset($_POST['submit'])){
                $mailTo = "doorban.verifimail@gmail.com";
                $hed = "from: doorban.virifymail@gmail.com \r\n";
                $hed .= "MIME-Version: 1/0" . "\r\n";
                $hed .= "Content-type:text/html;charest=UTF-8" . "\r\n";
                $txt = " <p>You have received an email from:<br> ".$email."\n\n".$name."\n\n"."</p><br>".$msg;

                mail($mailTo,$subject,$txt,$hed);
                
                header("Location: contactustnx.php") ;
               // header("Location: contactussent.php");
            }

        