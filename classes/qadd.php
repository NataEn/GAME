<?php
   
    include("q-database.php");

   
 if(isset($_POST['submit'])){
  
    //get post variabels
    $question_number = $_POST['question_number'];
    $question_text = ucfirst($_POST['question_text']);
    $correct_choice = $_POST['correct_choice'];
    $city =ucfirst($_POST['city']);
    $info =ucfirst($_POST['info']);
    //choicess arrey
    $choices = array();
    $choices[1] =ucfirst( $_POST['choice1']);
    $choices[2] =ucfirst( $_POST['choice2']);
    $choices[4] =ucfirst( $_POST['choice4']);
    $choices[3] =ucfirst( $_POST['choice3']);
    $choices[5] =ucfirst( $_POST['choice5']);
    //question query
    $query = "INSERT INTO `questions`(question_number, text,city,info) VALUES('$question_number','$question_text','$city','$info')";
    //run query
    $insert_row = $mysqli->query($query) or die ($mysqli->error.__LINE__);
    //validate insert to question
    if($insert_row){
        //get choices
        foreach($choices as $choice => $value){
            //check if value existe
            if($value != ''){
                //check for right answer
                if($correct_choice == $choice){
                    //asgin 1 to correct choice
                    $is_corect = 1;
                }
                else{
                    $is_corect = 0 ; 
                }
                //choice query
                $query = "INSERT INTO `choises` (question_number,is_corect,text) VALUES ('$question_number','$is_corect','$value')";
                //run query
                $insert_row = $mysqli->query($query) or die ($mysqli->error.__LINE__);
                //validate insert 
                if($insert_row){
                    continue;
                }
                else{
                    die('Error : ('.$mysqli->errno .') '.$mysqli->error);
                }
            }
        }
      
       // $msg = 'Question has been submited for admin confirm';
    }

}

    // get total questions
    $query = "SELECT * FROM `questions`";
    //get results
    $results = $mysqli->query($query) or die ($mysqli->error.__LINE__);
    $total = $results->num_rows;
    $next = $total+1;