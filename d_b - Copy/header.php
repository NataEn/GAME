<?php  

                //check if signin
                $signin = new Signin();
                $user_data = $signin->check_signin($_SESSION['doorban_userid']);
                $score = $user_data['score'];
    ?>
         
         
<html>
 <head>
        <link rel="stylesheet" href="css/header.css" type="text/css"/>
        <script src="https://kit.fontawesome.com/1b03809da0.js" crossorigin="anonymous"></script>
</head>
<body>
        <div id="upper_bar"  class="col-12 col-s-12">

            <div style="padding:4px;">

                <!-- menu button-->
                <div class="dropdown" style="float:left;padding:0px;margin:5px;">
                    <button class="dropbtn" style="box-shadow:black ;" id="menu_button"><i class="fas fa-bars fa-2x" style="color:cornflowerblue;background-color: #d1dffa;padding:1px;" ></i></button>
                    <div class="dropdown-content">
                    <!-- <i class="fas fa-search-location" style="color: black;margin:14px;margin-left:4px;"></i>-->
                        <a href="user-map.php" style="text-decoration: none;color:black;">Play    <i class="fas fa-map-marked-alt"></i></a>
                        <a href="about.php" style="text-decoration: none;color:black;">How To Play    <i class="fas fa-info-circle"></i></a>
                        <a href="friends.php" style="text-decoration: none;color:black;">Rank   <i class="fas fa-university"></i></a>
                        <a href="add.php" style="text-decoration: none;color:black;">Pro Add     <i class="fas fa-user-plus"></i></a>
                        <a href="pro-map.php" style="text-decoration: none;color:black;">Pro Map    <i class="fas fa-map-marked-alt"></i></a>
                        <a href="contactus.php" style="text-decoration: none;color:black;">Contact Us    <i class="fas fa-info-circle"></i></a>
                        <a href="logout.php" style="text-decoration: none;color:black;">Logout  <i class="fas fa-wrench"></i></a>                            
                    </div>          
                </div>



            <!--logo-->
            <a href="user-map.php">
                <img src="./image/dblogo1234.png" style="width:70px;float:left;"> </a>
               


                <!-- profile pic-->
                <a href="profile.php" >
                <?php 
                    $image = "";
                    if(file_exists($user_data['profile_image']))
                    {
                        $image = $user_data['profile_image'];
                    }
                              //image of posts user -  defult avatar
                              else{         
                                $image = "./image/boy.png";
                                if($user_data['gender'] == "Female")
                                {
                                    $image = "./image/girl.png";
                                }
                            }
                
                    ?>
                    <img src="<?php echo $image ?>" style="width:30px;max-height:35px;float:right;padding-top:4px;">
                </a>
             
                 <!--show points_earned-->
                 <span id="points_earned" style="float: right;padding:5px; " > <?php echo $score; ?></span>
            </div>
            


        </div>
                      
</body>
</html>






                <!--search
                <div class="dropdown" style="float:left;padding:0px;margin:5px;">
                    <button class="dropbtn"  id="menu_button"> <i class="fas fa-search-location fa-2x" style="color: white;margin-top:0px;margin-left:4px;"></i></button>
                    <div class="dropdown-content">
                    
                        <input type="text" id="search_box" style="color:black" placeholder="search city"/>
                    </div>          
                </div>
        -->