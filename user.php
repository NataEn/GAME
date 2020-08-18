<div id="friends">
        <?php
            //image of posts user -  defult avatar
            $image = "./image/images (1).jpg";
            if($FRIEND_ROW['gender'] == "Female")
            {
                $image = "./image/images.jpg";
            }
            ?>
        <img id="friends_img" src="<?php echo $image ?>">
        <br>
        <?php
            echo $FRIEND_ROW['first_name'] . " " . $FRIEND_ROW['last_name'] 
        ?>
</div>