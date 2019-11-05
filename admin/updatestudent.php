<?php
session_start();
if($_SESSION['uid'])
{
    
}
else
{
    header('location:../login.php');
}



?>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Update Student</title>
    <style>
    html { height: 100% }
::-moz-selection { background: #fe57a1; color: #fff; text-shadow: none; }
::selection { background: #fe57a1; color: #fff; text-shadow: none; }
body { background-image: radial-gradient( cover, rgba(92,100,111,1) 0%,rgba(31,35,40,1) 100%), url('http://i.minus.com/io97fW9I0NqJq.png') }
.login {
  background: #eceeee;
  border: 1px solid #42464b;
  border-radius: 6px;
  height: 257px;
  margin: 20px auto 0;
  width: 298px;
}
.login h1 {
  background-image: linear-gradient(top, #f1f3f3, #d4dae0);
  border-bottom: 1px solid #a6abaf;
  border-radius: 6px 6px 0 0;
  box-sizing: border-box;
  color: #727678;
  display: block;
  height: 43px;
  font: 600 14px/1 'Open Sans', sans-serif;
  padding-top: 14px;
  margin: 0;
  text-align: center;
  text-shadow: 0 -1px 0 rgba(0,0,0,0.2), 0 1px 0 #fff;
}
input[type="password"], input[type="text"] {
  background: url('http://i.minus.com/ibhqW9Buanohx2.png') center left no-repeat, linear-gradient(top, #d6d7d7, #dee0e0);
  border: 1px solid #a1a3a3;
  border-radius: 4px;
  box-shadow: 0 1px #fff;
  box-sizing: border-box;
  color: #696969;
  height: 39px;
  margin: 31px 0 0 29px;
  padding-left: 37px;
  transition: box-shadow 0.3s;
  width: 240px;
}
input[type="password"]:focus, input[type="text"]:focus {
  box-shadow: 0 0 4px 1px rgba(55, 166, 155, 0.3);
  outline: 0;
}
.show-password {
  display: block;
  height: 16px;
  margin: 26px 0 0 28px;
  width: 87px;
}
input[type="checkbox"] {
  cursor: pointer;
  height: 16px;
  opacity: 0;
  position: relative;
  width: 64px;
}
input[type="checkbox"]:checked {
  left: 29px;
  width: 58px;
}
.toggle {
  background: url(http://i.minus.com/ibitS19pe8PVX6.png) no-repeat;
  display: block;
  height: 16px;
  margin-top: -20px;
  width: 87px;
  z-index: -1;
}
input[type="checkbox"]:checked + .toggle { background-position: 0 -16px }
.forgot {
  color: #7f7f7f;
  display: inline-block;
  float: right;
  font: 12px/1 sans-serif;
  left: -19px;
  position: relative;
  text-decoration: none;
  top: 5px;
  transition: color .4s;
}
.forgot:hover { color: #3b3b3b }
input[type="submit"] {
  width:240px;
  height:35px;
  display:block;
  font-family:Arial, "Helvetica", sans-serif;
  font-size:16px;
  font-weight:bold;
  color:#fff;
  text-decoration:none;
  text-transform:uppercase;
  text-align:center;
  text-shadow:1px 1px 0px #37a69b;
  padding-top:6px;
  margin: 29px 0 0 29px;
  position:relative;
  cursor:pointer;
  border: none;  
  background-color: #37a69b;
  background-image: linear-gradient(top,#3db0a6,#3111);
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
  border-bottom-left-radius:5px;
  box-shadow: inset 0px 1px 0px #2ab7ec, 0px 5px 0px 0px #497a78, 0px 10px 5px #999;
}

.shadow {
  background: #000;
  border-radius: 12px 12px 4px 4px;
  box-shadow: 0 0 20px 10px #000;
  height: 12px;
  margin: 30px auto;
  opacity: 0.2;
  width: 270px;
}


input[type="submit"]:active {
  top:3px;
  box-shadow: inset 0px 1px 0px #2ab7ec, 0px 2px 0px 0px #31524d, 0px 5px 3px #999;
}
    </style>
</head>
    <body>
        <form action="updatestudent.php" method="post">
        <h1 align="center">Update Student</h1>
         <div class="login">
             <input type="text" name="stnd" placeholder="Standard">
  <br>
             <input type="text" name="sname" placeholder="Student Name"><br>
  <input type="submit" name="submit" value="Search">
</div>
        </form>    
        <table align=center border="1">
        <tr><th>Num</th>
            <th>Image</th>
            <th>Roll</th>
            <th>Name</th>
        <th>edit</th>
        
            </tr>
        <?php
if(isset($_POST['submit']))
{
    include('../dbcon.php');
    $std=$_POST['stnd'];
    $nm=$_POST['sname'];
    $sql="SELECT * FROM `student` WHERE `standard`='$std' AND `name` LIKE '%$nm%'";
    $run=mysqli_query($con,$sql);
    if(mysqli_num_rows($run)<1)
    {
        echo"No Record";
        
    }
    else
    {
        $count=0;
        while($data=mysqli_fetch_assoc($run))
        {
            $count++;
            ?>
            <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $data['rollno']; ?></td>
            <td><img src="../dataimg/<?php echo $data['images'];?>"style='max-width:100px;' > </td>
            <td><?php echo $data['pcont']; ?></td>
            <td><?php echo $data['name']; ?></td>
             <td><a href="updateform.php?sid=<?php echo $data['id']; ?>">edit</a></td>
        
            </tr>
            <?php
            
        }
    }
}

?>
        </table>
    <a href="admindash.php">Back</a></body></html>
