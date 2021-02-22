<?php
$insert = false;

if(isset($_POST['name'])){
  $server = "localhost";   
  $username = "root";
  $password = "";

  $con = mysqli_connect($server,$username,$password);

  if(!$con){
      die("connection to this database failed due to".
      mysqli_connect_error());
  }
//   echo "Success connecting to the db";

$name= $_POST['name'];
$age= $_POST['age'];
$gender= $_POST['gender'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$desc= $_POST['desc'];

$sql= "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

if($con->query($sql) == true){
    // echo "successfully inserted";
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
</head>
<body>
    <img src="B Devras Saraswati Vidya Mandir-Garden.jpg" alt="" class="bg">
    <div class="container">
        <h3>Welcome to B.D.S.V.M US Trip Form</h3>
        <br>
        <p>Enter your details and Submit the Form to Confirm your Participation 
            In the Trip</p>
        <?php 
        if($insert == true){
        echo "<p class='submitMsg'>ThankYou for submitting your form.we are very happy to see you joining us.</p>";
        }
   ?>
        </p>
            <form action="index.php" method="POST">
                <input type="text" name="name" id="name" placeholder="Enter your name">
                <input type="text" name="age" id="age" placeholder="Enter your Age ">
                <input type="text" name="gender" id="gender" placeholder="Enter your gender" >
                <input type="email" name="email" id="email" placeholder="Enter your email">
                <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
                <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other Information Here"></textarea>
                <button class="btn">Submit</button>
                
            </form> 
    </div>



    

</body>
</html>