<?php
// posting with post button 
class Post
{
        public $error = "";
        // create post from textarea
        public function create_post($userid, $data)
        {
            if(!empty($data['post']))

            {   //security for malitios posts
                $post = addslashes($data['post']);

                //create post id
                $postid = $this->create_postid();

                //insert values
                $query = "insert into posts (userid,postid,post) values ('$userid','$postid','$post')";

                //insert & save to db 
                $DB = new Database();
                $DB->save($query);
                }
            else
            {
                //this line is not working ! error is not difiend properly
               //return $this->$error .= "Please type somthing to post<br>";
            }
          
        }
        //show post in posts area
    public function get_posts($id)
    {
        //search for user id from members db to match id in posts db 
        $query = "select * from posts where userid = '$id' order by id desc limit 10";
                
        $DB = new Database();
        //read from posts db 
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

         // generate random number to asign for new postid 
         private function create_postid()
         {
             $length = rand(4,19);
             $number = "";
             for ($i=0; $i < $length; $i++){
                 $new_rand = rand(0,9);
 
                 $number = $number . $new_rand;
             }
 
             return $number;
         }
 
}