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
                
                echo "mail sent";
               // header("Location: contactussent.php");
            }

        
            /*
                //SUBJECT
                $sub = 'DoorBan regestration verification - no-reply';
                //from
                $msg = "<p style='color:black;text-align:center;'>Hi <b>$first_name $last_name</b><br></p>
                <p style='color:black;text-align:center;'>Welcome to DoorBan game<br><br>
                Click on the link to verify your account <br>
                http://localhost/d_b%20-%20Copy/verify.php?vkey=$vkey<br><br>
                Enjoy the game, 
                d_b team
                </p>";
                     //<img src='./image/dblogo1234.png' style='width:70px;float:left;'>
                 

             
                //from
                $hed = "from: doorban.virifimail@gmail.com \r\n";
                $hed .= "MIME-Version: 1/0" . "\r\n";
                $hed .= "Content-type:text/html;charest=UTF-8" . "\r\n";

                mail($rec,$sub,$msg,$hed);
                echo "email sent";
            }
*/