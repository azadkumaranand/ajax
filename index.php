
<?php

require './connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'][0];

    $sql = "INSERT INTO courses (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";
    $conn->query($sql);
}


?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <!-- <form action="" method="post"> -->
            <div class="rounded-2 px-3 py-2 bg-success text-light" id="success">

            </div>
        <form class="myform">
        <div class="form-group">
            <div class="my-2">
                <label for="">Name</label>
                <input type="text" class="form-control name" name="name">
            </div>
            <div class="my-2">
                <label for="">Email</label>
                <input type="email" class="form-control email" name="email">
            </div>
            <div class="my-2">
                <label for="">Phone</label>
                <input type="number" class="form-control phone" name="phone">
            </div>
            <div class="my-2">
                <input type="checkbox" name="course[]" value="html">HTML<br>
                <input type="checkbox" name="course[]" value="css">CSS<br>
                <input type="checkbox" name="course[]" value="javascript">JAVASCRIPT<br>
                <input type="checkbox" name="course[]" value="php">PHP<br>
                <input type="checkbox" name="course[]" value="laravel">LARAVEL<br>
            </div>
        </div>
        <button class="btn btn-primary">
            Submit
        </button>
        </form>
        
    </div>
    <script>
        const myform = document.querySelector('.myform');
        const name = document.querySelector('.name');
        const email = document.querySelector('.email');
        const phone = document.querySelector('.phone');
        const successMessage = document.querySelector('#success');
        console.log(myform);
        // successMessage.innerText = "hello ";
        myform.addEventListener('submit', (e)=>{
            e.preventDefault();

            const xhr = new XMLHttpRequest();

            xhr.open('POST', 'http://localhost/formhandling/data/ajaxsubmit.php');

            xhr.onload = function(){
                if(xhr.status == 200){
                    name.value = "";
                    email.value = "";
                    phone.value = "";
                    console.log(xhr.responseText);
                    successMessage.innerText = xhr.responseText;
                }
            }

            const formData = new FormData(myform);
            console.log(Array.from(formData));
            xhr.send(formData);
        })
        console.log(myform);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>