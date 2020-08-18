<?php

session_start();

            //conect  2 DB (members & posts) with classes
            include("classes/connect.php");
            include("classes/signin.php");
            include("classes/user.php");
            include("classes/post.php");
            include("classes/image.php");

            //check if signed in 
            $signin = new Signin();
            $user_data = $signin->check_signin($_SESSION['doorban_userid']);
            
            // echo "<pre>";
            //print_r($_GET);
            //echo "</pre>";

            // posting - if push post button use class post
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                
                if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "")
                {
                    // check file type
                    if($_FILES['file']['type'] == "image/jpeg")
                    {   
                        //check file size max 3mb
                        $allowed_size = (1024 * 1024) * 3 ;
                        if($_FILES['file']['size'] < $allowed_size)
                        {   
                            //name  file save to folder uplouds
                            $filename = "uplouds/" . $_FILES['file']['name'];
                            move_uploaded_file($_FILES['file']['tmp_name'], $filename);

                            //change images for cover 
                            $change = "profile";

                            if(isset($_GET['change']))
                            {
                                $change = $_GET['change'];
                            }
                            // crop image with class
                            $image = new Image();

                                if($change == "cover")
                                {   //crop cover image
                                    $image->crop_image($filename,$filename,1366,488);
                                }
                                else
                                {   //else crop profile image
                                    $image->crop_image($filename,$filename,800,800);
                                }

                            //check if exsist
                            if(file_exists($filename))
                            {   
                                //insert to db
                                $userid = $user_data['userid'];

                                if($change == "cover")
                                {
                                    //save cover image
                               
                                    $query = "update members set cover_image = '$filename' where userid = '$userid' limit 1";

                                }
                                else
                                {   // save profile image
                                    $query = "update members set profile_image = '$filename' where userid = '$userid' limit 1";
                                }

                                $DB = new Database();
                                $DB->save($query);

                                //redirect if not
                                header("Location: profile.php");
                                die;
                            }
                        }
                        else
                        {   //error file to big
                            echo "<div style='text-align:center;font-size:12;color:white;background-color:grey;'>";
                            echo "<br>The following errors have occured:<br><br>";
                            echo "please add amaler then 3mb file";
                            echo "</div>";
                        }
                    }
                    else 
                    {   //error file not jpg
                        echo "<div style='text-align:center;font-size:12;color:white;background-color:grey;'>";
                        echo "<br>The following errors have occured:<br><br>";
                        echo "please add a jpg file";
                        echo "</div>";
                    }
                    
                }
               else
               {
                    //if error echo in valid image
                    echo "<div style='text-align:center;font-size:12;color:white;background-color:grey;'>";
                    echo "<br>The following errors have occured:<br><br>";
                    echo "please add a valid image";
                    echo "</div>";
               }
            }

?>

<!DOCTYPE html>
<html>
    <head>

        <title>Change profile image | Doorban</title>
        <meta name="viewport" content="initial-scale=1.0, width=device-width"/>
        <link rel="stylesheet" type="text/css "href="./css/index.css">
                   
    </head>
    <body>


        <!--top-->
                
        <?php include("header.php");?>

        <!--main -->

        <div style="display: flex;">

            <div  style="min-height:400px;flex:2.5;padding:20px;padding-right:0px;">

                <form method="post" enctype="multipart/form-data">
                    <div style="border: solid thin #aaa; padding:10px;background-color:white;">

                    <input type="file" name="file">

                    <input id="post_button" type="submit" value="Change">
                    <br>
                    </div>
                </form>
            </div>
        </div>




        


    </body>
</html>