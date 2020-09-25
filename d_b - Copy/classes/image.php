<?php
// class - crop image

    class Image
    {
        
        public function crop_image($original_file_name,$cropped_file_name,$max_height,$max_width)
        {
            //check for duplicates
            if(file_exists($original_file_name))
            {
                    //make a copy 
                    $original_image = imagecreatefromjpeg($original_file_name);

                    //save size to variabels x & y 
                    $original_width = imagesx($original_image);
                    $original_height = imagesy($original_image);

                    //if not in size 
                    if($original_height > $original_width)
                    {
                        // make width equal to max width 800

                        $ratio = $max_width / $original_width;

                        $new_width = $max_width;
                        $new_height = $original_height * $ratio;
            
                    }
                    else
                    {     // make height equal to max height 800
                        $ratio = $max_height / $original_height;

                        $new_height = $max_height;
                        $new_width = $original_width * $ratio;
                        
                    }
            }
            //save new image size
            $new_image = imagecreatetruecolor($new_width,$new_height);

            //copy original image to new image
            imagecopyresampled($new_image,$original_image,0,0,0,0,
                 $new_width,$new_height,$original_width,$original_height);

            //destroy original image - save place in memory
            imagedestroy($original_image);

            //resize by height + create destination y
            if($new_height > $new_width)
            {
                $diff = ($new_height - $new_width);
                $y = round($diff / 2);
                $x = 0;
            }
            else
            {
            //resize by width + create destination x
                $diff = ($new_width - $new_height);
                $x = round($diff / 2);
                $y = 0;
            }

            //create cropped image size
            $new_cropped_image = imagecreatetruecolor($max_width, $max_height);
            // copy new image to cropped image
            imagecopyresampled($new_cropped_image,$new_image,0,0,$x,$y,$max_width,$max_height,$max_width,$max_height);
            
            // delete new image 
            imagedestroy($new_image);

            //save cropped image to file 
            imagejpeg($new_cropped_image,$cropped_file_name,90);
            
            //delete cropped image
            imagedestroy($new_cropped_image);
        }

    }

