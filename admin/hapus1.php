<?php

include 'functions.php';

$id=$_GET["id"];

if(hapus1($id) > 0){
    echo "<script>
alert('Data berhasil dihapus');
document.location.href='index-galeri.php';
    </script>
    ";
    
} else {echo "<script>
    alert('Data gagal dihapus');
    document.location.href='index-galeri.php';
              </script>;"
    ;
}
?>