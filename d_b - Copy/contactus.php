<?php
 session_start();

 include("classes/contactus.php");



?>


<html>
            <head>
                <title>Contact Us | Doorban</title>
                <meta name="viewport" content="width=device-width"/>
                <link rel="stylesheet" type="text/css "href="./css/contactus.css">
                
            </head>
         <body>
    

            <!--top bar-->
            <div>
            <?php include("header.php");?>

            </div>
                 
                 <div style="padding: 3px;">
                    
                    <h3>Contact Us Form</h3>

                    <div class="container">
                    <form action="" method="POST">
                        <label for="name">Name</label>
                        <input  type="text" id="name" name="name" placeholder="<?php echo $first_name ." ".$last_name;?>">

                        <label for="email">Email</label>
                        <input  type="text" id="email" name="email" placeholder="<?php echo $email;?>">

                        <label for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="Write something.." required/>

                        
                        <label for="msg">Message</label>
                        <textarea id="msg" name="msg" placeholder="Write something.." style="height:200px" required></textarea>

                        <input type="submit" value="Submit" name="submit">
                    </form>
                    </div>


                 </div>
         </body>
