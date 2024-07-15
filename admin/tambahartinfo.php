<?php
session_start();
if(!isset($_SESSION["login"])){
    header('location:../login/login.php'); exit;
}

include 'functions.php';

$conn = mysqli_connect("localhost","root","","profileprogweb");

if (isset($_POST["submit"])) { 

    if(tambahani($_POST) > 0){
          echo "<script>
alert('Data berhasil ditambahkan');
document.location.href='index.php';
          </script>
          ";
          
     } else {echo "<script>
          alert('Data gagal ditambahkan');
          document.location.href='index.php';
                    </script>;"
          ;
}
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title> Tambah Galeri </title>
</head>
<body>
<?php require('navbar.html'); ?>
    <h1>Tambah Foto</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
        <li> <label for="nama"> nama : </label>
             <input type="text" name="nama" id="nama"></textarea>
        </li>
        <li> <label for="deskri"> desc : </label>
             <textarea name="deskri" id="deskri" cols="60" rows="10"></textarea>
        </li>
        <li> <label for="img1"> img : </label>
             <input type="file" name="img1" id="img1">
        </li>
        <li> <button type="submit"name="submit">Kumpul</button>
</li>
        </ul>
</body>
</html>