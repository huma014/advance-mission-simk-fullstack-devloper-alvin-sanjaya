<?php
session_start();
if(!isset($_SESSION["reallytrash"])){
    header('location:../index.php'); exit;
}

include '../functions.php';

$id=$_GET["who"];
if($id==1){
    if(isitowner($_SESSION['idlog'])==false){
        header('Location:../index.php');
        exit;
    }
}
if(!isitok($_SESSION["idlog"])){
  header('location:../index.php');
  exit;
}

if(shmand($id) > 0){
    echo "<script>
alert('Data berhasil dihapus');
document.location.href='../maindata.php';
    </script>
    ";
    
} else {echo "<script>
    alert('Data gagal dihapus');
    document.location.href='../maindata.php';
              </script>;"
    ;
}
?>