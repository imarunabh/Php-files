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
            <h1>Out Stock Blood List</h1>
            <center>
            <div id="form">
                <table>
                    <tr>
                        <td><center><b><font color="blue"> Name </font></b></center></td>
                        <td><center><b><font color="blue"> <font> Mobile No</font></b></center></td>
                        <td><center><b><font color="blue"> Blood Group</font></b></center></td>
                     </tr>
                    <?php
                    $q=$db->query("SELECT * FROM out_stock_b");
                    while($r1=$q->fetch(PDO::FETCH_OBJ))
                    {
                        ?>
                    <tr>
                         <td><center><?=$r1->name; ?></center></td>
                         <td><center><?=$r1->mno;?></center></td>
                         <td><center><?=$r1->bname;?></center></td>
                         
                    </tr>
                        <?php
                    }
                    ?>
                </table>    


            </div></center>
            
            
        </div>
        
     
      </p>
    </div>
    </div>
    </div>
</body>
</html>