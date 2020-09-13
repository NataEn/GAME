<?php

class Play
{
    // get user data to parofile
    public function get_location_id($id)
    {
        $query = "select location_id from locations where location_id = '$id' limit 1";
        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {

            $row = $result[0];
            return $row;

        }else{
            return false;
        }
    }
}
