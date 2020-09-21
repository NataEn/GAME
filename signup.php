<?php

//conect to DB with classes
  
    include("classes/signup.php");
 

?>

    <html>

    <head>
        <title>Doorban | Sign Up</title>
        <link rel="stylesheet" type="text/css "href="./css/sign.css">
        <meta name="viewport" content="initial-scale=1.0, width=device-width"/>
    
    </head>

    <body>
        <div id="grid" >
    
        <!-- top bar-->
        <div id="bar1" style="background-color: cornflowerblue;"> 
            <div>
                <div id="logo" ><img src="./image/dblogo1234.png" style="width:100px;float:left;"></div>
            
                <a href="signin.php" style="text-decoration: none;color:white;"><div id="singin_button"> Sign in</div> </a>
            </div>
        </div>

        <!-- sign up form-->
        <div id="bar2"><br>

            Sign up to Doorban <br><br>

                <form method="post" action="signup.php">

                <input value="<?php echo $first_name ?>" name="first_name" type="text" id="text" placeholder="First name">
                <br><br>
                <input value="<?php echo $last_name ?>"name="last_name" type="text" id="text" placeholder="Last name">
                <br><br>
                <input value="<?php echo $age ?>"name="age" type="number" id="text" placeholder="age">
                <br><br>
                <span style="font-weight: normal;" >Gender :</span> 
                <br>
                <select id="text" name="gender">
                    <option ><?php echo $gender ?></option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
                <br><br>
                <input value="<?php echo $email ?>"name="email" type="text" id="text" placeholder="Email">
                <br><br>
                <input name="password" type="password" id="text" placeholder="Passsword">
                <br><br>
                <input name="password2" type="password" id="text" placeholder="Retype password">
                <br><br>
                <input type="submit" id="button" value="Sign up">
                <br><br>

                </form>
            
        </div>
        


        </div>
    </body>

    </html>