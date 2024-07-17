<?php
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=1">
    <style>
        #full{
            margin: 0;
            padding: 0;
            background:url("blood.jpg");
            -webkit-background-size:cover;
            background-size: cover;
            position:absolute;
        }
        #exchange{
            
            margin-top: 100px;
            margin-bottom:5px;
        }
        *{
    padding: 0;
    margin: 0;
}
#header{
        border-radius:4px;
        margin:10px;
       }

     #footer{
        border-radius:10px;
     }  
    </style>
</head>
<body>
    <div id="full">
     <div id="inner_full">
        <div id="header"><h2><a href="admin-home.php" style="text-decoration:none;color:white;"> Blood Donation Management System</a></h2></div>
        <div id="body">
            <br>
            <?php
             $un=$_SESSION['un'];
            if(!$un){
                header("Location:index.php");
            }
            ?>
            <h1>Welcome Admin</h1><br><br>
            
            <ul>
                <li><a href="donor-red.php">Donor Registration</a></li>
                <li><a href="donor-list.php">Donor List</a></li>
                <li><a href="stock-blood.php">Stock Blood List</a></li>
            </ul><br><br><br><br><br>
            <ul>
                <li><a href="exchange-blood-registration.php">Blood Exchange Registration</a></li>
                <li><a href="exchange-blood-list.php">Exchanger List</a></li>
                <li><a href="out-stock-blood-list.php">Out Stock Blood List</a></li>
            </ul>

            <ul id="exchange">
                <li><a href="exchange-blood.php">Exchanged Blood List</a></li>
               
            </ul>
            
        </div>
        <div id="footer"><h4 align="center">Copyright@DBMS</h4>
      <p align="center"><a href="logout.php"><font color="white">Logout</a>
      </p>
    </div>
    </div>
    </div>
</body>
</html>