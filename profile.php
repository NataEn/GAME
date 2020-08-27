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
            

 
                //collect posts  

                $post = new Post();
                $id = $_SESSION['doorban_userid'];
                $posts = $post->get_posts($id);

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
                 


             
                <!-- menu buttons-->
             
                <div>
                <a href="user-map.php" style="text-decoration: none;color:black;"><div id="menu_button">Play    | </div></a>
                <a href="friends.php" style="text-decoration: none;color:black;"><div id="menu_button">Friends    | </div></a>
                <a href="add.php" style="text-decoration: none;color:black;"><div id="menu_button">Add     | </div></a>
                <a href="about.php" style="text-decoration: none;color:black;"><div id="menu_button">About    |  </div></a>
                 <div id="menu_button">Settings</div>
                </div>

                
            <div style="display:flex;">

                <!-- profile pic-->
                <div style="flex: 1;" >
                <span style="font-size: 12px;">

                    <?php 
                    //set variable & value for image
                    $image = "";
                    //check if user file found in db 
                    if(file_exists($user_data['profile_image']))
                    {
                        $image = $user_data['profile_image'];
                    }
                    else{         
                        $image = "./image/boy.png";
                        if($user_data['gender'] == "Female")
                        {
                            $image = "./image/girl.png";
                        }
                    }

                    
                    ?>
                    <!--show image-->
                    <img id="profile_pic" src="<?php echo $image ?> ">
                    <br>
                    <!--change profile image redirect to page - link encryption : c = change | pi1 = profile-->
                    <a href="change_profile_image.php?c=pi1" style="text-decoration: none;">Change Profile Image</a> 
                   
                    
                </span>
                
                <br>
                <!--user name from db-->
                <div style="font-size: 30px;"><?php echo $user_data['first_name'] . " " . $user_data['last_name']; ?></div>
                <br>
                </div>


                    <!-- points earned -->
                <div id="points_badges" style="flex: 5;background-color:cornflowerblue;text-align:center;font-size:25px;background-size:100%;margin-left:10px;padding-top:20px;" >
               
               
                    <!--show points_earned-->
                    <span id="points_earned" src="<?php echo $points_earned ?> ">200 points  </span> 
                    <br>
                    <br>
                    <!--show badges_earned-->
                    <span id="badges_earned" src="<?php echo $badges_earned ?> "> 3 badges </span>
                    <br>
              

                <br>
                <br>                
                </div>
                    <br>
                
                </div>

         
          
             
          
    
    
            <!--below cover posts -->




           
            <div id="post_bar">
                    <!--posts are posted here-->

                <?php
            
                // use class User with get _user function  & Post to post from db
                if($posts)
                {
                    foreach($posts as $ROW)
                    {
                        //conect between members and posts db 
                        $user = new User();
                        $ROW_USER = $user->get_user($ROW['userid']);
                        include("post.php");
                    }
                }
                

                ?>

            </div>


            
        
        


        </body>
    </html>