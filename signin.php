<?php

//session
    session_start();

//conect to DB with classes
    include("classes/connect.php");
    include("classes/signin.php");

    $email="";
    $password="";
  


    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $signin = new Signin();
        $result = $signin->evaluate($_POST);

        if($result != "")
        {
            //if error echo 
            echo "<div style='text-align:center;font-size:12;color:white;background-color:grey;'>";
            echo "<br>The following errors have occured:<br><br>";
            echo $result;
            echo "</div>";
        }
        else { //else redirect to login page 
            header("Location: user-map.php");
            die;
        }
        // save progress if post uncomplite form
        $email = $_POST['email'];
        $password = $_POST['password'];
        
           
    }
   


?>

    <html>

    <head>
        <title>Doorban | Log In</title>
        <link rel="stylesheet" type="text/css "href="./css/sign.css">
        <meta name="viewport" content="initial-scale=1.0, width=device-width"/>
    </head>

    <body>
        <div id="grid" >
    
        <div id="bar1" > 
            
            <div id="logo" ><img src="./image/dblogo1234.png" style="width:100px;float:left;"></div>
        
           <a href="signup.php" style="text-decoration: none;color:white;"> <div id="singup_button"> Sign up</div></a>
          
        </div>


        <div id="bar2" ><br>
            <form method="post"  >
                Log in to Doorban <br><br>
                <input name="email" value="<?php echo $email ?>" type="text" id="text" placeholder="Email"><br><br>
                <input name="password" value="<?php echo $password ?>"type="password" id="text" placeholder="Passsword"><br><br>

                <input type="submit" id="button" value="Log In"><br><br>
                
            </form>
        </div>
        


        </div>
    </body>

    </html>