<?php

include("classes/connect.php");

class Play
{
    private $error = "";

    public function play($id)
    {
        $location_id = $_GET['location_id'];
        $question = addslashes($id['question']);
  

        // select email from db
        $query="select question from locations where locatin_id = '$location_id' limit 1";


        // read from db
        $DB = new Database();
        $result = $DB->read($query);
        
        // check password and security 
        if($result)
        {

            $row = $result[0];
            if($location_id == $row['loca$location_id'])
            {

        // create session data 
            $_SESSION['doorban_location_id'] = $row['location_id'];
            }
            else
            {
                $this->error .= "Wrong password <br> "; // to prevent attack write both errors the same (Wrong password/email)
            }
        }
        else
        {
                 $this->error .= "Wrong email<br> "; // to prevent attack write both errors the same (Wrong password/email)
        }
    
        return $this->error;
            
        
    }
}
