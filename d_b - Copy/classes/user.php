<?php

class User
{
    // get user data to parofile
    public function get_data($id)
    {
        $query = "select * from members where userid = '$id' limit 1";
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
    // retrive user data to posts 
    public function get_user($id)
    {
        $query = "select * from members where userid = '$id' limit 1";
        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            return $result[0];
        }
        else
        {
            return false;
        }
    }
    //retrive friends 
    public function get_friends($id)
    {
        $query = "select * from members where userid != '$id' ";
        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
}

?>