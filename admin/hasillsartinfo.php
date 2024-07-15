<?php 
require 'functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM artikel_informasi
            WHERE
          author LIKE '%$keyword%' OR
          par1 LIKE '%$keyword%' OR
          par2 LIKE '%$keyword%' OR
          par3 LIKE '%$keyword%' OR
          par4 LIKE '%$keyword%' OR
          title LIKE '%$keyword%' 
        ";
$tulisan = query($query);

?>
<table border="1" style="color:blue;" cellpadding="10" cellspacing="0">
    <tr> 
        <th>No.</th>
        <th>Author</th>
        <th>Title</th>
        <th width="500px">Sedikit dari Teks</th>
        <th>Action</th>
    </tr>
    <?php $i=1; ?>
<?php foreach($tulisan as $row): ?>
    <tr> 
    <td><?= $i?>  </td>
        <td><?= $row["author"] ?></td>
        <td><?= $row["title"] ?></td>
        <td><?= substr($row["par1"],0,250)."..."; ?></td>
        <td><a href="ubah1.php?id=<?= $row["id_tulisan"]?>" style="color:black;">Ubah</a> 
        | <a href="hapus1.php?id=<?= $row["id_tulisan"]?>" onclick="return confirm('Yakin?');" style="color:black;">Hapus</a></td>
    </tr>
    <?php $i++ ?>
<?php endforeach; ?> 
</table>