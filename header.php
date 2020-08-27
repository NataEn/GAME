<?php  
           
          
  
        
            //check if signin
            $signin = new Signin();
            $user_data = $signin->check_signin($_SESSION['doorban_userid']);
            
?>
         
         
         <html>
             <head>

            <style>
                 #upper_bar{
            height: 120px;
            background-color: cornflowerblue;
            color: white;
            min-width: 150px;
            }
            #search_box{
                width: 100px;
                height: 15px;
                margin:auto;
                border-radius: 4px;
                border: none;
                padding: 4px;
                margin: 4px;
                font-size:12px;
                float: right;
               
               
            }
            </style>
            
             </head>
             <body>
         <div id="upper_bar"  class="col-12 col-s-12">

                <div style="padding:4px;">

                <!--logo-->
                <a href="user-map.php">
                    <img src="./image/dblogo1234.png" style="width:100px;float:left;">
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
                    <img src="<?php echo $image ?>" style="width:30px;height:30px;float:right;border-radius:50%;">
                </a>
                <br>
                <br>
                <br>
                

                <!--logout-->
                <a href="logout.php">
                <span style="float: left;font-size:11px;margin:5px;color:white;">Logout</span>
                </a>
                </div>
              
                
                
                <!--search-->
                <input type="text" id="search_box" placeholder="search city">
                <br>
                <br>
                <br>

            </div>
             </body>