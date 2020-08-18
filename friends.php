<?php 
            session_start();

            //conect  2 DB (members & posts) with classes
            include("classes/connect.php");
            include("classes/signin.php");
            include("classes/user.php");
            include("classes/post.php");

            // check if user signin 
            $signin = new Signin();
            $user_data = $signin->check_signin($_SESSION['doorban_userid']);
            

                //collect friends
                $user = new User();
                $id = $_SESSION['doorban_userid'];
                $friends = $user->get_friends($id);

            
           ?> 
            
            
            <html>
            <head>
                <title>Profile | Doorban</title>
                <meta name="viewport" content="width=device-width"/>
                <link rel="stylesheet" type="text/css "href="./css/profile.css">
                
            </head>
         <body>
    

            <!--top bar-->
            <div>
            <?php include("header.php");?>

            </div>
                 
            <!--friends area-->

            <div style="min-height:400px;flex:1;">
                <div id="friends_bar">
                Friends<br>

                <!--friends-->
                <?php
                
                    // use class user displayes all other users for now !!
                    if($friends)
                    {
                        foreach($friends as $FRIEND_ROW)
                        {
                             include("user.php");
                        }
                    }
                   
                ?> 
                </div>
            </div>

         </body>
            </html>