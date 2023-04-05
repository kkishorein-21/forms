<?php
session_start();
  $dbsite_url="http://localhost/gforms/";
  $db_user = "root";
  $db_password = "";
  $db_name = "studentregistration";

  $db = mysqli_connect("localhost",$db_user,$db_password,$db_name) or die(mysqli_error());

?>

<?php

if(isset($_SESSION['finish'])){
    $finish=addslashes($_SESSION['finish']);
    echo "<script type='text/javascript'>alert('$finish');</script>";
    unset($_SESSION['finish']);
}
?>
<html lang="en">
<body>
    <?php
    $mysql="SELECT * FROM student";
    $result=mysqli_query($db,$mysql);
    $count=mysqli_num_rows($result);
    if($count>0){
        while($rows=mysqli_fetch_assoc($result)){
            $fname=$rows['FirstName'];
            $lname=$rows['LastName'];
            $email=$rows['Email'];
            $phone=$rows['Mobile'];
            $dob=$rows['DOB'];
            $gender=$rows['Gender'];
            $add1=$rows['Address 1'];
            $add2=$rows['Address 2'];
            $city=$rows['City'];
            $state=$rows['State'];
            $zip=$rows['Pin Code'];
            $country=$rows['Country'];
            ?>
            <h4>FirstName:-<?php echo $fname; ?></h4>
            <h4>LastName:-<?php echo $lname; ?></h4>
            <h4>Email:-<?php echo $email; ?></h4>
            <h4>Mobile:-<?php echo $phone; ?></h4>
            <h4>DOB:-<?php echo $dob; ?></h4>
            <h4>Gender:-<?php echo $gender; ?></h4>
            <h4>Address Line 1:-<?php echo $add2; ?></h4>
            <h4>Address Line 2:-<?php echo $add2; ?></h4>
            <h4>City:-<?php echo $city; ?></h4>
            <h4>State:-<?php echo $state; ?></h4>
            <h4>Pin Code:-<?php echo $zip; ?></h4>
            <h4>Country:-<?php echo $country; ?></h4>
            <hr>
            <?php
        }
    }
    ?>
</body>
</html>
