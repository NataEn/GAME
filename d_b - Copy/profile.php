    <?php 
            session_start();

            //conect  2 DB (members & posts) with classes
            include("classes/connect.php");
            include("classes/signin.php");
            include("classes/user.php");
           // include("classes/post.php");

            // check if user signin 
            $signin = new Signin();
            $user_data = $signin->check_signin($_SESSION['doorban_userid']);
           
            $score = $user_data['score'];
                //collect posts  

            //  $post = new Post();
            // $id = $_SESSION['doorban_userid'];
            // $posts = $post->get_posts($id);

    ?>

    <html>
            <head>
                <title>Profile | Doorban</title>
                <meta name="viewport" content="width=device-width"/>
                <link rel="stylesheet" type="text/css "href="./css/profile.css">
        
            </head>
         <body >
    

            <!--top bar-->
            <div>
            <?php include("header.php");?>

            </div>
                 
                 <div style="padding: 3px;">
          
                
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
                <br>
             
                </div>


                    <!-- points earned -->
                <div id="points" style="flex: 5;box-shadow: black 1px 1px;background-color:#a4c0f4;text-align:center;
                        font-size:25px;background-size:100%;margin-left:10px;padding-top:8px;border-radius:3px;" >

                    <!--show points_earned-->
                           <!--user name from db-->
                     <div style="font-size: 30px;margin:1px;margin-bottom:1px;text-shadow: white 0px 1px;color:black;"><b><?php echo $user_data['first_name'] . " " . $user_data['last_name']; ?></b></div>
               
                    <span id="points_earned" style="font-size: 16px;" >Points achieved <br><br>
                    <span style="font-family:Arial, Helvetica, sans-serif;font-size:28px;color:white;box-shadow: black 1px 1px;
                        text-shadow: black 0px 1px;background-color:cornflowerblue;padding:10px;border-radius:3px;">
                     <b><?php echo $score; ?></b></span> </span> 
                   
                    <!--show badges_earned-->
                    <span id="badges_earned">  <br><?php //echo $badges_earned ?>   </span>
                    <br>
              

                               
                </div>
                    <br>
                
                </div>

         
          
                <br>
           <!-- badges earned -->
           <div id="points_badges" style="box-shadow: black 1px 1px;background-color:white;text-align:center;
                        font-size:25px;width:100%;padding-top:8px;display:inline-block;border-radius:3px;" >
               
                    <!--show basges_earned-->
                    <span id="points_earned" style="font-size: 20px;" >Badges collection <br></span>
                    <span style="font-size:38px;color:white;
                        text-shadow: black 0px 1px;">

                   <img id="badges" src="image/Screenshot (207).png" style="width: 40%;padding-top:0px;">
                    </span>
                    <br>
                    <br>


            <!--below cover posts -->

           <!--
            <div id="post_bar">
                    posts are posted here

                <?php
            
                // use class User with get _user function  & Post to post from db
               // if($posts)
                //{
                 //   foreach($posts as $ROW)
                 //   {
                        //conect between members and posts db 
                 //       $user = new User();
                  //      $ROW_USER = $user->get_user($ROW['userid']);
                  //      include("post.php");
                 //   }
            //    }
                

                ?>

            </div>
                 -->

            </div>
        
            <br>
            <br>
            <br>
            <br>
<?php
include_once 'footer.php';

?>