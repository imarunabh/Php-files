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
    <title>Donor Registration</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=1">
    <style type="text/css">
        td{
            width:200px;
            height:40px;
        }
        #full{
            margin: 0;
            padding: 0;
            background:url("blood.jpg");
            -webkit-background-size:cover;
            background-size: cover;
            position:absolute;
        }
        *{
    padding: 0;
    margin: 0;
       }

       #header{
        align-items:center;
        padding-left:5px;
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
            <h1>Stock Blood List</h1>
            <center>
            <div id="form" style="height:450px;position:absolute;">
                <table>
                    <tr>
                        <td><center><b><font color="blue">Name</font></b></center></td>
                        <td><center><b><font color="blue">Qty</font></b></center></td>
                    </tr>
                    
                    <tr>
                         <td><center>A+</center></td>
                         <td><center>
                            <?php
                            $q=$db->query("SELECT * FROM donor_registration  WHERE bgroup='A+'");
                             echo $row=$q->rowcount();
                            ?>

                         </center></td>
                    </tr>
                    <tr>
                         <td><center>A-</center></td>
                         <td><center>
                         <?php
                            $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='A-'");
                             echo $row=$q->rowcount();
                            ?>
                         </center></td>
                    </tr>
                    <tr>
                         <td><center>B+</center></td>
                         <td><center>
                         <?php
                            $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='B+'");
                             echo $row=$q->rowcount();
                            ?>
                         </center></td>
                    </tr>
                    <tr>
                         <td><center>B-</center></td>
                         <td><center>
                         <?php
                            $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='B-'");
                             echo $row=$q->rowcount();
                            ?>
                         </center></td>
                    </tr>
                    <tr>
                         <td><center>AB+</center></td>
                         <td><center>
                         <?php
                            $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB+'");
                             echo $row=$q->rowcount();
                            ?>
                         </center></td>
                    </tr>
                    <tr>
                         <td><center>AB-</center></td>
                         <td><center>
                         <?php
                            $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB-'");
                             echo $row=$q->rowcount();
                            ?>
                         </center></td>
                    </tr>
                    <tr>
                         <td><center>O+</center></td>
                         <td><center>
                         <?php
                            $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='O+'");
                             echo $row=$q->rowcount();
                            ?>
                         </center></td>
                    </tr>
                    <tr>
                         <td><center>O-</center></td>
                         <td><center>
                         <?php
                            $q=$db->query("SELECT * FROM donor_registration WHERE bgroup='O-'");
                             echo $row=$q->rowcount();
                            ?>
                         </center></td>
                    </tr>
                        
                </table>    


            </div></center>
            
            
        </div>
        
      <p align="center"><a href="logout.php"><font color="white">Logout</a>
      </p>
    </div>
    </div>
    </div>
</body>
</html>