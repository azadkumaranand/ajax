<?php

require '../connect.php';
// echo "hello guys";
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    function santize_input($x){
        $y = trim($x);
        $y = stripslashes($y);
        $y = htmlspecialchars($y);
        return $y;
    }
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $name = santize_input($_POST['name']);
    $email = santize_input($_POST['email']);
    $phone = santize_input($_POST['phone']);
    $course = santize_input($_POST['course'][0]);

    $sql = "INSERT INTO courses (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";
    if($conn->query($sql)){
        echo "Data Inserted Successfully!";
    }else{
        echo "Something went wrong";
    }
    
    
}


?>
