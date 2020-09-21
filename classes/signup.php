<?php

  include("classes/connect.php");

 $first_name="";
 $last_name="";
 $gender="";
 $email = "";


 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
     $signup = new Signup();
     $result = $signup->evaluate($_POST);

     if($result != "")
     {
         //if error echo 
         echo "<div style='text-align:center;font-size:12;color:white;background-color:grey;'>";
         echo "<br>The following errors have occured:<br><br>";
         echo $result;
         echo "</div>";
     }
     else { //else redirect to login page 
         header(("Location: signin.php"));
         die;
     }
     // save progress if user post uncomplite form
          $first_name = $_POST['first_name'];
          $last_name = $_POST['last_name'];
          $age = $_POST['age'];
          $gender = $_POST['gender'];
          $email = $_POST['email'];
 }


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
                //check for password retype error 
                 //   if($key == "password"){
                 //   if(!preg_match("password2",$value)){
                  //  $this->error = $this->error. "password incorect<br>";
              // }
               //     }
               
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

            $vkey = time().$userid;
     

            // insert data to values
            $query="insert into members(userid,first_name,last_name,age,gender,email,password,url_adress,vkey)
            VALUES('$userid','$first_name','$last_name','$age','$gender','$email','$password','$url_adress','$vkey')";


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