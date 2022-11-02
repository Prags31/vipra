<?php
require_once "config.php";
$fname=$lname=$username=$password=$confirm_password=$city=$state=$email=$mobile="";
$username_err=$password_err=$confirm_password_err="";
if($_SERVER['REQUEST_METHOD']=="POST")
{
  if(empty(trim($_POST["username"])))
  {
    $username_err="Username cannot be blank";
  }
  else{
    $sql="SELECT id FROM users WHERE username=?";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt)
    {
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        // Set the value of param username
        $param_username = trim($_POST['username']);

        // Try to execute this statement
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1)
            {
                $username_err = "This username is already taken"; 
            }
            else{
                $username = trim($_POST['username']);
            }
        }
        else{
            echo "Something went wrong";
        }
    }
  }
mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
$password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 8){
$password_err = "Password cannot be less than 8 characters";
}
else{
$password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
$confirm_password_err = "Passwords should match";
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
  $fname=trim($_POST['fname']);
  $lname=trim($_POST['lname']);
  $city=trim($_POST['city']);
  $state=trim($_POST['state']);
  $mobile=trim($_POST['mobile']);
  $email=trim($_POST['email']);
  $sql = "INSERT INTO users (username, password,fname,lname,city,state,mobile,email) VALUES (?, ?,?,?,?,?,?,?)";
$stmt = mysqli_prepare($conn, $sql);
if ($stmt)
{
    mysqli_stmt_bind_param($stmt, "ssssssss", $param_username, $param_password,$param_fname,$param_lname,$param_city,$param_state,$param_mobile,$param_email);

    // Set these parameters
    $param_username = $username;
    $param_password = password_hash($password, PASSWORD_DEFAULT);
    $param_fname=$fname;
     $param_lname=$lname;
     $param_city=$city;
      $param_state=$state;
       $param_mobile= $mobile;
       $param_email=$email;
    // Try to execute the query
    if (mysqli_stmt_execute($stmt))
    {
        header("location: login.php");
    }
    else{
        echo "Something went wrong... cannot redirect!";
    }
}
mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href=log_in1.css type=text/css rel=stylesheet>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Shrikhand&display=swap" rel="stylesheet">

</head>
<body>
  
<div id="id01" class="signup">
  
  <form class="login-content animate" action="" method="post" onsubmit="return checkForm(this);">

  <div class="headlog"><h1 style="font-family:'Shrikhand'; font-size:35px;">Sign Up</h1></div>
 
  <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close login">&times;</span>
      
    </div>

    <div class="container">
        
      <label for="fname"><b>First Name</b></label>
     <input type="text" placeholder="Enter First Name" name="fname" required>

      
      <label for="lname"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Last Name" name="lname">

      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      
      <label for="city"><b>City</b></label>
      <input type="text" placeholder="Enter City Name" name="city" required>
      
      <label for="state"><b>State</b></label>
      <input type="text" placeholder="Enter State" name="state" required>


      <label for="e-mail"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>

      
      <label for="mobile"><b>Mobile</b></label>
      <input type="text" placeholder="Enter mobile no" name="mobile" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="pass" pattern="(?=.*[0-9])(?.=*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Must contain atleast one number and one upper case and one lowercase letter and one special character and atleast 8 or more charaters" required>
      
      
      <label for="cpsw"><b>Confirm Password</b></label>
      <input type="password" placeholder="Enter Password" name="confirm_password" id="cpass" required>
<label><br>
            <input type="checkbox" checked="checked" name="remember" required> Accept the<a href=t&c.php><b> terms and conditions</b></a>
            </label>
  
            <div class=login_btn>   <button type="submit"  >SIGN UP</button></div>
  
            </div>  
  <hr noshade/>
  <div class=btmlink>Already have an account? <a href=login.php><b>Sign in.</b></a></div>
</form>
</div>
</body>
</html>