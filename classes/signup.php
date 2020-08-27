<?php

    class Signup
    {
        private $error = "";

        public function evaluate($data) // check form for errors
        {
            foreach ($data as $key => $value){
                
                if(empty($value)) // empty error
                {
                    $this->error = $this->error . $key . "is empty!<br>";
                }

                if($key == "email") // ivalid email error
                {
                    if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)){
                        $this->error = $this->error . "in valid email<br>";
                    }
                }

                if($key == "first_name"){ //numeric error
                    if (is_numeric($value)){
                        $this->error = $this->error . "first name cant be a number<br>";
                    }
                    if (strstr($value," ")){ //space error
                        $this->error = $this->error . "first name cant have spaces<br>";
                    }
                    
                } 

                if($key == "last_name"){//numeric error
                    if (is_numeric($value)){
                        $this->error = $this->error . "Last name cant be a numbe<br>r";
                    }
                    if (strstr($value," ")){//space error
                        $this->error = $this->error . "Last name cant have spaces<br>";
                    }
                } 

               
            }
            if($this->error == "") // no error = create user
            {
                $this->create_user($data);
            }
            else
            {
                return $this->error;
            }
        }
            // create user 
        public function create_user($data)
        {
            $first_name = ucfirst($data['first_name']);
            $last_name = ucfirst($data ['last_name']);
            $age = $data['age'];
            $gender = $data['gender'];
            $email = $data['email'];
            $password = $data['password'];

            //create these new categoires 

            $url_adress = strtolower($first_name) . "." . strtolower($last_name);
            $userid = $this->create_userid();

            // insert data to values
            $query="insert into members(userid,first_name,last_name,age,gender,email,password,url_adress)
            VALUES('$userid','$first_name','$last_name','$age','$gender','$email','$password','$url_adress')";


            // save to db
            $DB = new Database();
            $DB->save($query);

        }
            // generate random number for userid 
        private function create_userid()
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




?>