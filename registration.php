<?php
        
        $conn = mysqli_connect("localhost", "root", "", "bloodline");
        
        if($_REQUEST){

            $name = $_POST['name'];
            $age = $_POST['age'];
            $location = $_POST['location'];
            $bloodgroup = $_POST['bloodgroup'];
            $phone = $_POST['phone'];
            $lastdonate = $_POST['lastdonate'];
            $weight = $_POST['weight'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql_2 = "SELECT * FROM donor_info WHERE username='$username'";
            $result_2 = mysqli_query($conn,$sql_2);

                if (mysqli_num_rows($result_2) > 0) {                        
                    echo "Username taken";
                } else {
                    $sql = "INSERT INTO donor_info(name,age,location,bloodgroup,phone,lastdonate,weight,username,password) VALUES('$name','$age','$location','$bloodgroup','$phone','$lastdonate','$weight','$username','$password')";
                    if(mysqli_query($conn,$sql)){
                        session_start();
                        $_SESSION['user']=$username;
                        header("Location:profile.php");
                    }            
                }
        }
                
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloodline- Search Donors</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="header">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="index.php">BLOODLINE</a>
        </nav>
    </div>

    <center>
    <form action="" method="POST">
        <input type="text" name="name" pattern="[[a-zA-Z]+[ ][a-zA-Z]+"  placeholder="Name"required><br>
        <input type="number" name="age" pattern="[0-9]" placeholder="Age" required><br>
        <input type="text" name="location" pattern="[a-zA-Z]+" placeholder="Your City Name" required><br>
        <input type="text" name="bloodgroup" pattern="(A|B|AB|O)[+-]" placeholder="Blood Group(A+/A-/B+/B-/O+/O-/AB+/AB-)" required><br>
        <input type="number" name="phone"  placeholder="Phone number" required><br>
        <label for="lastdonatedate">Last Donate Date</label><br>
        <input type="date" name="lastdonate" placeholder="Last Donate date" required><br>
        <input type="number" name="weight"   placeholder="Weight(in kg)"required><br>
        <input type="text" name="username" pattern="[A-Za-z0-9]+"  placeholder="Username(Numbers and/or letters)"required><br>
        <input type="password" name="password" pattern=".{6,}" placeholder="minimum 6 characters" required><br>
        <input type="submit" value="Login">
    </form>     
    </center>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>