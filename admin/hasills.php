<?php 
require 'functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM buku_tamu
            WHERE
          nama LIKE '%$keyword%' OR
          pesan LIKE '%$keyword%' OR
          email LIKE '%$keyword%' 
        ";
$dtbk = query($query);
?>
<table border="1" style="color:blue;" cellpadding="10" cellspacing="0">
    <tr> 
        <th>No.</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
        <th>Aksi</th>
    </tr>

    <?php $i=1; ?>
<?php foreach($dtbk as $row): ?>
    <tr> 
    <td><?= $i?>  </td>
        <td><?= $row["nama"] ?></td>
        <td><?= $row["email"] ?></td>
        <td><?= $row["pesan"] ?></td>
        <td><a href="ubah.php?id=<?= $row["id_pesan"]?>" style="color:black;">Ubah</a> 
        | <a href="hapus.php?id=<?= $row["id_pesan"]?>" onclick="return confirm('Yakin?');" style="color:black;">Hapus</a></td>
    </tr>
    <?php $i++ ?>
<?php endforeach; ?> 
    
</table>