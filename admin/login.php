<?php
if(!session_id()) 
session_start();
require 'functions.php';

if(isset($_SESSION['reallytrash'])){
    header('location:index.php');
}

if(isset($_POST['masuk'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($connection,"SELECT * FROM tman WHERE email='$email'");

    if(mysqli_num_rows($result)===1){
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password,$row["password"])) {
        $_SESSION["reallytrash"] = $row["tman_id"];
        header("location:index.php");
        exit;
        
    } else{
        $_SESSION['error']="Email atau password tidak valid";
    }
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/> 
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<!-- <link rel="stylesheet" href="../others/style.css"> this idiotic line code wontwork -->
<title>Login Aku Sampah</title>
<style>
body {
    background: url(../others/purplemountainbg.gif) no-repeat center center fixed;
     overflow: hidden;
     position: relative;
     height: 100%;
background-size: cover;
     z-index: 5;
   }
   .signin {
  background-color: #d3d3d3;
  font-family: 'Montserrat', sans-serif;
  color: #fff;
  font-size: 14px;
  letter-spacing: 1px;
}

.login {
  position: relative;
  height: 450px;
  width: 360px;
  margin: auto;
  padding: 50px 50px;
  border-radius: 20px;
  }

form {
  padding-top: 80px;
}

.active {
  border-bottom: 2px solid #ffffff;
}
.error-message {
    color:rgb(255, 255, 255);
    font-weight: lighter;
    font-size:15px;
}
.nonactive {
  color: rgba(255, 255, 255, 0.500);
  text-align: center;
}
span{
    color:white;
}
h2 {
    color: rgba(255, 255, 255, 1);
  padding-left: 12px;
  font-size: 22px;
  text-transform: uppercase;
  padding-bottom: 5px;
  letter-spacing: 2px;
  display: inline-block;
  font-weight: 100;
}

h2:first-child {
  padding-left: 0px;
}

span {
  text-transform: uppercase;
  font-size: 12px;
  opacity: 0.4; 
  display: inline-block;
  position: relative;
  top: -65px;
  transition: all 0.5s ease-in-out;
}

.text {
  border: none;
  width: 89%;
  padding: 10px 20px;
  display: block;
  height: 15px;
  border-radius: 20px;
  background: rgb(255, 255, 255);
  border: 2px solid rgba(255, 255, 255, 0);
  overflow: hidden;
  transition: all 0.5s ease-in-out;
}

.text:focus {
  outline: 0;
  border: 2px solid rgba(255, 255, 255, 0.5);
  border-radius: 20px;
  background: rgba(0, 0, 0, 0);
}

.text:focus + span {
  opacity: 0.6;
}

input[type="text"],
input[type="password"] {
  font-family: 'Montserrat', sans-serif;
  color: #fff;
}



input {
  display: inline-block;
  padding-top: 20px;
  font-size: 14px;
}

h2,
span,
.custom-checkbox {
  margin-left: 20px;
}

.signin {
  background-color: #808080;
  font-family: 'Montserrat', sans-serif;
  color: #FFF;
  margin:auto;
  width: 50%;
  padding: 10px 20px;
  display: block;
  height: 39px;
  border-radius: 20px;
  margin-top: 30px;
  transition: all 0.5s ease-in-out;
  border: none;
  text-transform: uppercase;
}

.signin:hover {
  background: #cecece;
  box-shadow: 0px 4px 35px -5px #ffffff;
  cursor: pointer;
}

.signin:focus {
  outline: none;
}

a {
  text-align: center;
  display: block;
  top: 120px;
  position: relative;
  text-decoration: none;
  color: rgba(255, 255, 255, 0.2);
}

 .cloud {
   opacity: 0.3;
   width: 100%;
   max-width: 700px;
   height: auto;
 }
 
 
 #cloud1 {
   z-index: 1;
   position: absolute;
   top: -40px;
   left: -100px;
 }
 
 #cloud2 {
   z-index: 2;
   position: absolute;
   top: 20px;
   left: -300px;
 }
 
 #cloud3 {
   z-index: 3;
   position: absolute;
   top: -400px;
   left: -200px;
 }
 
 #cloud4 {
   z-index: 4;
   position: absolute;
   top:-200px;
   left: 40px;
 }

 .rainbow {
  animation: colorRotate 6s linear 0s infinite;
  }

  @keyframes colorRotate {
  from {
      color: #000000;
  }
  10% {
      color: #3f3d57;
  }
  50% {
      color: #497047;
  }
  75% {
      color: #503e47;
  }
  100% {
      color: #44445c;
  }
  }
  
  .wrapper { 
  background: linear-gradient(124deg, #000000, #525c5e, #534352, #4d465e, #403d52, #554c72, #4d4c57, #535353, #000000);
  background-size: 1800% 1800%;
  
  -webkit-animation: rainbow 18s ease infinite;
  -z-animation: rainbow 18s ease infinite;
  -o-animation: rainbow 18s ease infinite;
    animation: rainbow 18s ease infinite;}
  
  @-webkit-keyframes rainbow {
      0%{background-position:0% 82%}
      50%{background-position:100% 19%}
      100%{background-position:0% 82%}
  }
  @-moz-keyframes rainbow {
      0%{background-position:0% 82%}
      50%{background-position:100% 19%}
      100%{background-position:0% 82%}
  }
  @-o-keyframes rainbow {
      0%{background-position:0% 82%}
      50%{background-position:100% 19%}
      100%{background-position:0% 82%}
  }
  @keyframes rainbow { 
      0%{background-position:0% 82%}
      50%{background-position:100% 19%}
      100%{background-position:0% 82%}
  }

</style>
</head>
<body>

<div class="login wrapper" style="opacity:0.9;">

<h2 class="nonactive" href="reg.php" onclick="location.href='reg.php'"> Sign Up </h2>
  <h2 class="active">| Sign In </h2>
  <?php
if(isset($_SESSION['error'])){ ?>
  <h2 class="error-message"><em> <?=$_SESSION['error'] ?> </em></h2>
<?php }
?>
  <form method="post" action="" autocomplete="off">
    <input type="email" style="color:gray;" class="text" name="email">
     <b><span>Email</span></b>
    <br>
    <br>

    <input type="password" class="text" name="password">
    <b><span>Password</span></b>
    <br>
  
    <input type="submit" name="masuk" class="signin">

  </form>

</div>
</body>
</html>
