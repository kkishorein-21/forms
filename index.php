<?php
  session_start();
  $dbsite_url="http://localhost/gforms/";
  $db_user = "root";
  $db_password = "";
  $db_name = "studentregistration";

  $db = mysqli_connect("localhost",$db_user,$db_password,$db_name) or die(mysqli_error());

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  type="text/css" href="css/bootstrap.min.css">
    <title>Form</title>
</head>
<body>

<div>
    <?php
     if(isset($_POST['create'])){
        $firstname    = $_POST['firstname'];
        $lastname     = $_POST['lastname'];
        $email        = $_POST['email'];
        $phone        = $_POST['phone'];
        $dob          = $_POST['dob'];
        $gender       = $_POST['gender'];
        $ad1          = $_POST['address1'];
        $ad2          = $_POST['address2'];
        $city         = $_POST['city'];
        $state        = $_POST['state'];
        $pin          = $_POST['zip'];
        $country      = $_POST['country'];
     

     $sql = "INSERT INTO student VALUES('','$firstname','$lastname','$email','$phone','$dob','$gender','$ad1','$ad2','$city','$state','$pin','$country')";
     //$stmtinsert = $db->prepare($sql);l/
     $result=mysqli_query($db,$sql);
     if($result==true){
        $_SESSION['finish']="Form Submitted";
        header("location:".$dbsite_url."index1.php");
     }else{
        $_SESSION['finish']="Not Submitted";
        header("location:".$dbsite_url);
     }
    }
     
    ?>
</div>
    <h1>Student Registration Form</h1>
    <form name="gform" action="" method="post">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" placeholder="Firstname" required><br></br>
        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" placeholder="Lastname" required><br></br>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Email" required><br></br>
        <label for="phone">Mobile</label>
        <input type="text" name="phone" placeholder="Mobile Number" required><br></br>
        <label for="dob">DOB</label>
        <input type="date" name="dob" placeholder="DOB" required><br></br>
        <label for="gender">Gender</label>
        <input type="text" name="gender" placeholder="Male or Female" required><br></br>
        <label for="address1">Address 1</label>
        <input type="text" name="address1" placeholder="Address Line1" required><br></br>
        <label for="address 2">Address 2</label>
        <input type="text" name="address2" placeholder="Address Line2" required><br></br>
        <label for="city">City</label>
        <input type="text" name="city" placeholder="City"required><br></br>
        <label for="state">State</label>
        <input type="text" name="state" placeholder="State" required><br></br>
        <label for="zip">Pin Code</label>
        <input type="number" name="zip" placeholder="Pin code" required><br></br>
        <label for="country">Country</label>
        <input type="text" name="country" placeholder="Country" required><br></br>
        <button name="create">Submit</button>
    </form>
</body>
</html>