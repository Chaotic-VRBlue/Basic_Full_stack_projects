<?php
$insert = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $useranme = "root";
    $password = "";

    $con = mysqli_connect($server, $useranme, $password);

    if (!$con) {
        die("failed to connect with the database ". mysqli_connect_error());
    }
    // echo "The connection with the DataBase is successful"

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $other = $_POST['other'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$other', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        $insert = true;
        // echo "Successfully inserted";
    }
    else {
        // echo "ERROR: $sql <br> $con->error";
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
    <title>College Trip</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="https://hkbk.edu.in/backend/backend/About%20US_Slider2.png" alt="HKBK COLLEGE OF ENGINEERING" class="img">
    <div class="container">
        <h1>Welcome to the travel trip to BEL from HKBK</h1>
        <p>enter your details to confirm your participation in the trip</p>
        <?php
        if ($insert == true) {
            echo "<p class='submitmsg'>Thank You for joining us in this Trip</p>";
        }
        ?>

        <form action="index.php" method="post" class="form">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="email" name="email" id="email" placeholder="Enter Your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your phone">
            <textarea name="other" id="other" cols="30" rows="10" placeholder="Enter any other Information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
