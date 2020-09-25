<?php  

                //check if signin
                $signin = new Signin();
                $user_data = $signin->check_signin($_SESSION['doorban_userid']);
                
    ?>
         
         
<html>
 <head>

    <style>
                body{
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 14px;
                    color: black;
                }
                 #upper_bar{
                height: 45px;
                background-color: cornflowerblue;
                color: white;
                min-width: 150px;
                border-radius:1px;
                border-color: #a4c0f4;
                box-shadow: 1px 1px 2px;
          
            }
            #search_box{
                width: 100px;
                height: 16px;
                margin:auto;
                border-radius: 4px;
                border: none;
                padding: 2px;
                margin-top: 2px;
                margin-left: 2px;
               
                box-shadow: 1px 1px 2px;
                display: block;
               
            }
     
   
   
            #menu_button{
               
                display: inline;
                margin:0px;
                border:none;
                background-color: cornflowerblue;
          
           }

            .dropdown {
            position: relative;
            display: inline-block;

            }

            .dropdown-content {
            display: none;
            position:fixed;
            background-color:#d1dffa;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            float: left;
            border-radius: 3px;
            }

            .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            }
            .dropdown:hover { border:none;}
            .dropdown-content a:hover {background-color: #ddd;}

            .dropdown:hover .dropdown-content {display:block;}

        </style>
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
                        <a href="about.php" style="text-decoration: none;color:black;">About    <i class="fas fa-info-circle"></i></a>
                        <a href="friends.php" style="text-decoration: none;color:black;">Rank   <i class="fas fa-university"></i></a>
                        <a href="add.php" style="text-decoration: none;color:black;">Add     <i class="fas fa-user-plus"></i></a>
                        <a href="contactus.php" style="text-decoration: none;color:black;">Contact Us    <i class="fas fa-info-circle"></i></a>
                        <a href="logout.php" style="text-decoration: none;color:black;">Logout  <i class="fas fa-wrench"></i></a>                            
                </div>          
            </div>



               <!--logo-->
               <a href="user-map.php">
                    <img src="./image/dblogo1234.png" style="width:70px;float:left;">
                </a>


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
                    <img src="<?php echo $image ?>" style="padding-top:4px;width:30px;min-height:25px;float:right;">
                </a>
             
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