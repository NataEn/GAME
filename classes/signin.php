    <?php
    
    class Signin
    {
        private $error = "";

    
            // create user 
        public function evaluate($data)
        {
            
            $email = addslashes($data['email']);
            $password = addslashes($data['password']);


            // select email from db
            $query="select * from members where email = '$email' limit 1";


            // read from db
            $DB = new Database();
            $result = $DB->read($query);
            
            // check password and security 
            if($result)
            {

                $row = $result[0];
                if($password == $row['password'])
                {

            // create session data 
                $_SESSION['doorban_userid'] = $row['userid'];
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

        public function check_signin($id)
        {
            if(is_numeric($id))
             {
            // select email from db
                $query="select * from members where userid = '$id' limit 1";


            // read from db
                $DB = new Database();
                $result = $DB->read($query);
                
                
                if($result)
                {
                    $user_data = $result[0];
                    return $user_data;

                }

                else
                {
                    header("Location: signin.php");
                    die;
                }
            }
            else
            {
                    header("Location: signin.php");
                    die;
            }
        }



    }



    ?>