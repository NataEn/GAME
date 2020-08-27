

<!--post strasture -->
    <div id="post">
        <div>
            <?php
            //image of posts user -  defult avatar
            $image = "./image/images (1).jpg";
            if($ROW_USER['gender'] == "Female")
            {
                $image = "./image/images.jpg";
            }
            ?>

            <img src="<?php echo $image ?>" style="width: 75px;margin-right:4px;">
        </div>

        <div >
            <!--user name-->
            <div style="font-weight: bold;color:black;">first user</div>
                <?php   echo $ROW['post']  ?>

                <br><br>
                <a href="">Like</a>.<a href="">Comment</a>.

                 <!--date of post-->
                <span style="color:#999;">
                <?php echo $ROW['date'] ?> 
                </span>
        </div>
    </div>