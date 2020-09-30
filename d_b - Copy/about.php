<?php
session_start();

 include("classes/about.php");



?>

<html>
            <head>
                <title>How to Play | Doorban</title>
                <meta name="viewport" content="width=device-width"/>
                <link rel="stylesheet" type="text/css "href="./css/contactus.css">
                <style>
            
            /*slider*/
          
          
          /* The grid: Four equal columns that floats next to each other */
          .column {
              float: left;
              width: 25%;
              padding: 0.5px;
            padding:5px;
            margin: auto;
           
            }
            
            /* Style the images inside the grid */
            .column img {
              opacity: 0.8; 
              cursor: pointer; 
            }
            
            .column img:hover {
              opacity: 1;
            }
            
            /* Clear floats after the columns */
            .slid:after {
              content: "";
              display: table;
              clear: both;
            }
            
            /* The expanding image container */
            .containern {
              position: relative;
              display: none;
            }
            
            /* Expanding image text */
            #imgtext {
              position: absolute;
              bottom: 15px;
              left: 15px;
              color: white;
              font-size: 20px;
            }
            
            /* Closable button inside the expanded image */
            .closebtn {
              position: absolute;
              top: 10px;
              right: 15px;
              color: white;
              font-size: 35px;
              cursor: pointer;
            }
          
                  </style>
            </head>
         <body>
    

            <!--top bar-->
            <div>
            <?php include("header.php");?>
            </div>
                 

                    <!--maiin-->
                 <div style="padding: 3px;">

                    <div class="container" style=" background-color: #d1dffa;">
                    <h3>How To Play</h3>

                        <p>
                            Welcome to the DoorBan game , <br><br>

                            <b>* Start to Play - </b>Click the Logo or the Play botton in the menu bar.<br>
                            Choose a point and start exploring.<br><br>
                            
                            <b>* Unlock new features -</b> Answer questions and challenge rounds to win points and badges!<br><br>
                            <b>* Document your steps with DoorBan  - </b> Create a notebook 
                            where you can complete the DoorBan game tasks<br>  
                        </p>

                    </div>

                                                                
                        <!-- The four columns image slider-->
                        <div class="slid">
                            <div class="column">
                            <img src="image/IMG_20180119_140806_HDR.jpg" alt="Alps" style="width:100%" onclick="myFunction(this);">
                            </div>
                            <div class="column">
                            <img src="image/IMG_20180120_104809_HDR.JPG" alt="Alps" style="width:100%" onclick="myFunction(this);">
                            </div>
                            <div class="column">
                            <img src="image/20180904_092335.JPG" alt="Beach" style="width:100%" onclick="myFunction(this);">
                            </div>
                            <div class="column">
                            <img src="image/IMG-20200209-WA0069.jpg" alt="Rome" style="width:100%" onclick="myFunction(this);">
                            </div>
                        </div>
                        
                        <div class="containern">
                            <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                            <img id="expandedImg" style="width:100%">
                            <div id="imgtext"></div>
                        </div>
                 </div>



                 <script>


                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }

                    //slider
                    function myFunction(imgs) {
                        var expandImg = document.getElementById("expandedImg");
                        var imgText = document.getElementById("imgtext");
                        expandImg.src = imgs.src;
                        imgText.innerHTML = imgs.alt;
                        expandImg.parentElement.style.display = "block";
                    }
                    </script>
        <?php
include_once 'footer.php';

?>



<script>