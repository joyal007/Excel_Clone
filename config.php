<?php
require_once "./api/db.php";
session_start();

if(isset($_POST["signup"])){
    $email = $_POST["email"];
    $user = $_POST["user"];
    $pass1 = $_POST["password1"];
    $pass2 = $_POST["password2"];
    if($pass1 != $pass2){
        $_SESSION["message_signup"]="Passwords doesn't match";
            header("location:signup.php");
        exit();
    }
    $_SESSION["message_signup"]="";

    echo "$email $user $pass";
    $sqlLogin = "SELECT `password` FROM `users` WHERE email = '$email'";
    $result = mysqli_query($conn,$sqlLogin);

    if(mysqli_num_rows($result) > 0) {
        $_SESSION["message_signup"]="User already exist";
        header("location:signup.php");
        exit();
    }
    else{
    $sqlInsert = "INSERT INTO users (user,email,password) VALUES ('$user','$email','$pass');";
    echo "$sqlInsert";
    if (mysqli_query($conn,$sqlInsert)) {
        echo 'successfully recorded';
        header('location:home.php');
        // echo "<script>alert(' successfully registered')</script>";
    }
}
}

if(isset($_POST['signin'])){
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $sqlLogin = "SELECT `ID`,`password`,`user` FROM `users` WHERE email = '$email'";
    $result = mysqli_query($conn,$sqlLogin);

    if(mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $match = $row['password'];
        if($pass == $match){
            $_SESSION["message"]="";
            $_SESSION["username"]=$row['user'];
            $_SESSION["email"] = $email;
            header("location:home.php");
        }
        else{
            $_SESSION["message"]="User Mail ID and Password doesn't match";
            header("location:signin.php");
            // echo "<script>alert('User mail and password doesn't match')</script>";
        }
        
        exit();
      }
    } else {
        $_SESSION["message"]="Mail ID is not registered";
      header('location:signup.php');
      
    }
  }




?>