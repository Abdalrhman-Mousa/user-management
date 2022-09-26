
<?php
include 'connection.php';

if(isset($_POST ['submit'])){
    $fname = $_POST['fname'];
    $mdname = $_POST['mdname'];
    $lname = $_POST['lname'];
    $famname = $_POST['famname'];
    $email = $_POST['email'];
    $birth = $_POST['birth'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $check="SELECT * FROM users WHERE `email` = '$email'";
    $duplicate=mysqli_query($conn,$check);
    
    if (mysqli_num_rows($duplicate)>0)
?>
    <?php  
    echo '<script type="text/javascript">';
    echo ' alert("This email address is already used!")';  //not showing an alert box.
    echo '</script>';
exit
    ?>
    <?php


    $sql = "INSERT INTO `users` (`fname`, `mdname`, `lname`, `famname`, `email`, `mobile`, `password`)
     VALUES ('$fname', '$mdname', '$lname','$famname', '$email', '$mobile', MD5('$password'))";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location:adduser.php");
    }else{
        echo "Data not inserted";
    }


$check="SELECT * FROM users WHERE `email` = '$email'";
$duplicate=mysqli_query($conn,$check);

if (mysqli_num_rows($duplicate)>0)
{
header("Location: AddUser.php?message= Email id already exists.");
}

}


?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./Css/style.css">
    <title>Registration Form </title>
</head>
<body>

    <div class="container">
        <form method="POST">
            <h2 class="text-center">Join Our Network</h2>
        <div class="row jumbotron">
            <div class="col-sm-6 form-group">
                <label for="name-f">First Name</label>
                <input type="text" class="form-control" name="fname" id="name-f" placeholder="Enter your first name." pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="name-md">Middle name</label>
                <input type="text" class="form-control" name="mdname" id="name-md" placeholder="Enter your last name." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="name-l">Last Name</label>
                <input type="text" class="form-control" name="lname" id="name-l" placeholder="Enter your first name." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="name-fam">Family Name</label>
                <input type="text" class="form-control" name="famname" id="name-fam" placeholder="Enter your first name." required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email." required>
            </div>
            
            <div class="col-sm-6 form-group">
                <label for="Date">Date Of Birth</label>
                <input type="Date" name="birth" class="form-control" id="Date" placeholder="" required>
            </div>
           
            <div class="col-sm-6 form-group">
                <label for="tel">Moblie</label>
                <input type="tel" name="mobile" class="form-control" id="tel" placeholder="Enter Your Contact Number."  required>
            </div>
            <div class="col-sm-12 form-group">
                <label for="pass">Password</label>
                <input type="Password" name="password" class="form-control" id="pass" placeholder="Enter your password." title="The password should be at least 8 characters (1 upper case, 1lower case, numbers, special character, no spaces ) 
"
                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" required>
            </div>
            <div class="col-sm-12 form-group">
                <label for="pass2">Confirm Password</label>
                <input type="Password" name="cnf-password" class="form-control" id="pass2" placeholder="Re-enter your password." required>
            </div>
            <div class="col-sm-12 form-group mb-0">
               <button class="btn btn-primary float-right" type="submit" name="submit" >Submit</button>
            </div>
            
        </div>
        </form>
    </div>


</body>
</html>