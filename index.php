<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);
    if(!$con)
    {
        die("connection to this database failed due to " . mysqli_connect_error());
    }
    //echo "Succesfully connected to database.";
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];
    $sql= "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;
    if($con->query($sql) == true)
    {
        //echo "Successully inserted";
        $insert=true;
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
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="IIIT">
    <div class="container">
        <h1>Welcome to IIIT USA Trip Form</h1>
        <p>Enter your Detials to confirm your participation</p>
        <?php
        if($insert==true)
        {
        echo "<p class='msg'>Thanks for Submitting and joining Us.</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Name">
            <input type="text" name="age" id="age" placeholder="Enter age">
            <input type="text" name="gender" id="gender" placeholder="Enter Gender">
            <input type="email" name="email" id="email" placeholder="Enter email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Phone Number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Description and Year"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="java.js"></script>
    
</body>
</html>