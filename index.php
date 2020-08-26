<?php
session_start();
include_once "connection.php";
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
        <div class="container">
            <div class="row">
                <div class="col-sm-8"><h1>BLOODLINE</h1></div>
                <div class="col-sm-4">
                    <?php
                        if(isset($_SESSION['user'])){
                            echo '<a class="btn btn-primary" href="profile.php" role="button">Your Profile</a>';
                            echo '<a class="btn btn-primary" href="logout.php" role="button">Logout</a>';
                        }else{
                            echo '<a class="btn btn-primary" href="registration.php" role="button">Donor Register</a>';
                            echo '<a class="btn btn-primary" href="login.php" role="button">Donor Login</a>';
                       
                        }
                    ?>
                
               
                </div>
            </div>
  
        </div>
        

    </div>

    <div class="mid">

        <div class="container">
            <form action="" method="post">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="bloodgroup">Blood Group</label><br>
                        <select  class="btn btn-outline-primary dropdown-toggle" name="bloodgroup">
                            <option value="1" name="1">All</option>
                            <option value="bloodgroup='A+'" name="bloodgroup='A+'">A+</option>
                            <option value="bloodgroup='A-'" name="bloodgroup='A-'">A-</option>
                            <option value="bloodgroup='B+'" name="bloodgroup='B+'">B+</option>
                            <option value="bloodgroup='B-'" name="bloodgroup='B-'">B-</option>
                            <option value="bloodgroup='O+'" name="bloodgroup='O+'">O+</option>
                            <option value="bloodgroup='O-'" name="bloodgroup='O-'">O-</option>
                            <option value="bloodgroup='AB+'" name="bloodgroup='AB+'">AB+</option>
                            <option value="bloodgroup='AB-'" name="bloodgroup='AB-'">AB-</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="city">City</label><br>
                        <select  class="btn btn-outline-primary dropdown-toggle" name="location">
                            <option value="1" name="1">All</option>
                            <option value="location='Dhaka'" name="location='Dhaka'">Dhaka</option>
                            <option value="location='Barishal'" name="location='Barishal'">Barishal</option>
                            <option value="location='Khulna'" name="location='Khulna'">Khulna</option>
                            <option value="location='Rajshahi'" name="location='Rajshahi'">Rajshahi</option>
                            <option value="location='Chattogram'" name="location='Chattogram'">Chattogram</option>
                            <option value="location='Rangpur'" name="location='Rangpur'">Rangpur</option>
                            <option value="location='Sylhet'" name="location='Sylhet'">Sylhet</option>
                            <option value="location='Mymensingh'" name="location='Mymensingh'">Mymensingh</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                            <button type="submit" name="submit" id="submit" class="btn btn-success mr-2">Search Donors</button>
                </div>
            </div>
            </form>

                <table class="table table-striped" style="margin-top:10px">
                    <tr>
                        <th>name</th>
                        <th>age</th>
                        <th>location</th>
                        <th>lastdonate</th>
                        <th>bloodgroup</th>
                        <th>Phone</th>
                        <th>weight</th>
                    </tr>

                        <?php

                            if (isset($_POST['bloodgroup']) && isset($_POST['location'])) {
                                    $bloodgroup = $_POST['bloodgroup'];
                                    $location = $_POST['location'];
                                    $sql_2 = "SELECT * FROM donor_info WHERE $bloodgroup AND $location";
                                    $result_2 = mysqli_query($conn,$sql_2);

                                    if (mysqli_num_rows($result_2) > 0) {
                         
                                        while($row = mysqli_fetch_assoc($result_2)) {
                                            echo "<tr>";
                                                echo "<td>".$row['name']."</td>";
                                                echo "<td>".$row['age']."</td>";
                                                echo "<td>".$row['location']."</td>";
                                                echo "<td>".$row['lastdonate']."</td>";
                                                echo "<td>".$row['bloodgroup']."</td>";
                                                echo "<td>".$row['phone']."</td>";
                                                echo "<td>".$row['weight']."</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                            }
                        ?>
        
        
                </table>
        
        </div>


    </div>




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>