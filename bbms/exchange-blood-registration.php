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
    <title>Exchange Blood Registration</title>
    <link rel="stylesheet" type="text/css" href="css/style.css?v=1">
    <style>
        #form1{
            width:80%;
            height:320px;
            background-color:red;
            color:white;
            border-radius:10px;
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
            <?php
             $un=$_SESSION['un'];
            if(!$un){
                header("Location:index.php");
            }
            ?>
            <h3>Exchange Blood Donor Registration</h3>
            <center>
            <div id="form1">
                <form action="" method="post">
            <table>
                 <tr>
                    <td width="200px" height="50px">Enter Name</td>
                    <td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name"></td>
                    <td width="200px" height="50px">Enter Father's Name</td>
                    <td width="200px" height="50px"><input type="text" name="fname" placeholder="Enter Father's Name"></td>
                 </tr>
                 <tr>
                    <td width="200px" height="50px">Enter Address</td>
                    <td width="200px" height="50px"><textarea name="address"></textarea></td>
                    <td width="200px" height="50px">Enter City</td>
                    <td width="200px" height="50px"><input type="text" name="city" placeholder="Enter City"></td>
                 </tr>
                 <tr>
                    <td width="200px" height="50px">Enter Age</td>
                    <td width="200px" height="50px"><input type="text" name="age" placeholder="Enter Age"></textarea></td>
                    <td width="200px" height="50px">Enter E-Mail</td>
                    <td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-Mail">
                 </tr>
                 <tr>
                    <td width="200px" height="50px">Enter Mobile Number</td>
                    <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile Number"></td>
                 </tr>
                  <tr>
                    <td width="200px" height="50px">Select Blood Group</td>
                    <td width="200px" height="50px">
                          <select name="bgroup" >
                        <option >A+</option>
                        <option >A-</option>
                        <option >B+</option>
                        <option >B-</option>
                        <option >AB+</option>
                        <option >AB-</option>
                        <option >O+</option>
                        <option >O-</option>
                    </select>
                  </td>
                  <td width="200px" height="50px">Exchange Blood Group</td>
                    <td width="200px" height="50px">
                        <select name="exbgroup" >
                        <option >A+</option>
                        <option >A-</option>
                        <option >B+</option>
                        <option >B-</option>
                        <option >AB+</option>
                        <option >AB-</option>
                        <option >O+</option>
                        <option >O-</option>
                    </select>
                  </td>
                </tr>
                <tr>
                    <td><input type="submit" name="sub" value="Save"></td>
                 </tr>

            </table>
            </form>
            <?php
            if(isset($_POST['sub'])){

                //front end data input 
                $name=$_POST['name'];
                $fname=$_POST['fname'];
                $address=$_POST['address'];
                $city=$_POST['city'];
                $age=$_POST['age'];
                $bgroup=$_POST['bgroup'];   
                $mno=$_POST['mno'];
                $email=$_POST['email'];
                $exbgroup=$_POST['exbgroup'];
                //front end data input end 

                //select and insert 
                $q="select * from donor_registration where bgroup='$bgroup'";
                $st=$db->query($q);
                $num_row=$st->fetch();
                $id=$num_row['id'];
                $name=$num_row['name'];
                $b1=$num_row['bgroup'];
                $mno=$num_row['mno'];
                $q1="INSERT INTO out_stock_b (bname,name,mno) values(?,?,?)";
                $st1=$db->prepare($q1);
                $st1->execute([$b1,$name,$mno]); 
                //select and insert end 

                //delete code
                $q2="delete from  donor_registration where id='$id' ";
                $st1=$db->prepare($q2);
                $st1->execute();
                //delete

                //exchange ingo insert
                $q=$db->prepare("INSERT INTO exchange_b(name,fname,address,city,age,bgroup,mno,email,ebgroup) VALUES(:name,:fname,:address,:city,:age,:bgroup,:mno,:email,:ebgroup)");
                $q->bindValue('name',$name);
                $q->bindValue('fname',$fname);
                $q->bindValue('address',$address);
                $q->bindValue('city',$city);
                $q->bindValue('age',$age);
                $q->bindValue('bgroup',$bgroup);
                $q->bindValue('mno',$mno);
                $q->bindValue('email',$email);
                $q->bindValue('ebgroup',$exbgroup);
                if($q->execute()){
                    echo "<script>alert('Donor Registration Successfull')</script>";
                }
                else{
                    echo "<script>alert('Donor Registration Failed')</script>";
                }
                //exchange info insert end 
            }
            ?>    
            </div></center>
            </div>
        <div id="footer"><h4 align="center">Copyright@DBMS</h4>
      <p align="center"><a href="logout.php"><font color="white">Logout</font></a>
      </p>
    </div>
    </div>
    </div>
</body>
</html>