<?php

require 'functions.php';

session_start();
if(!isset($_SESSION["login"])){
    header('location:../login/login.php'); exit;}
$jumdthlm =10;
$jmldt= count(query("SELECT * FROM fotovideo"));
$jmllmn = ceil($jmldt / $jumdthlm);
$hlmakf=(isset($_GET["p"])) ? $_GET["p"] :1;
$awaldata = ($jumdthlm * $hlmakf) - $jumdthlm;
 
$tamu = query("SELECT * FROM fotovideo LIMIT $awaldata,$jumdthlm");

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title> Halaman Artikel & Informasi </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body, html {
  height: 100%;
}

.bg {
  /* The image used */
  background-image: url("img_girl.jpg");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}


                /* neon title */
    @font-face {
      font-family: Clip;
      src: url("https://acupoftee.github.io/fonts/Clip.ttf");
    }
    
    .sign {
      position: absolute;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 50%;
      height: 50%;
      background-image: radial-gradient(
        ellipse 50% 35% at 50% 50%,
        #6b1839,
        transparent
      );
      margin-bottom:5%;
      transform: translate(-50%, -50%);
      letter-spacing: 2;
      left: 50%;
      top: 25%;
      font-family: "Clip";
      text-transform: uppercase;
      font-size: 6em;
      color: #ffe6ff;
      text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #ff65bd,
        -0.2rem 0.1rem 1rem #ff65bd, 0.2rem 0.1rem 1rem #ff65bd,
        0 -0.5rem 2rem #ff2483, 0 0.5rem 3rem #ff2483;
      animation: shine 2s forwards, flicker 3s infinite;
    }
    
    @keyframes blink {
      0%,
      22%,
      36%,
      75% {
        color: #ffe6ff;
        text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #ff65bd,
          -0.2rem 0.1rem 1rem #ff65bd, 0.2rem 0.1rem 1rem #ff65bd,
          0 -0.5rem 2rem #ff2483, 0 0.5rem 3rem #ff2483;
      }
      28%,
      33% {
        color: #ff65bd;
        text-shadow: none;
      }
      82%,
      97% {
        color: #ff2483;
        text-shadow: none;
      }
    }
    
    .flicker {
      animation: shine 2s forwards, blink 3s 2s infinite;
    }
    
    .fast-flicker {
      animation: shine 2s forwards, blink 10s 1s infinite;
    }
    
    @keyframes shine {
      0% {
        color: #6b1839;
        text-shadow: none;
      }
      100% {
        color: #ffe6ff;
        text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #ff65bd,
          -0.2rem 0.1rem 1rem #ff65bd, 0.2rem 0.1rem 1rem #ff65bd,
          0 -0.5rem 2rem #ff2483, 0 0.5rem 3rem #ff2483;
      }
    }
    
    @keyframes flicker {
      from {
        opacity: 1;
      }
    
      4% {
        opacity: 0.9;
      }
    
      6% {
        opacity: 0.85;
      }
    
      8% {
        opacity: 0.95;
      }
    
      10% {
        opacity: 0.9;
      }
    
      11% {
        opacity: 0.922;
      }
    
      12% {
        opacity: 0.9;
      }
    
      14% {
        opacity: 0.95;
      }
    
      16% {
        opacity: 0.98;
      }
    
      17% {
        opacity: 0.9;
      }
    
      19% {
        opacity: 0.93;
      }
    
      20% {
        opacity: 0.99;
      }
    
      24% {
        opacity: 1;
      }
    
      26% {
        opacity: 0.94;
      }
    
      28% {
        opacity: 0.98;
      }
    
      37% {
        opacity: 0.93;
      }
    
      38% {
        opacity: 0.5;
      }
    
      39% {
        opacity: 0.96;
      }
    
      42% {
        opacity: 1;
      }
    
      44% {
        opacity: 0.97;
      }
    
      46% {
        opacity: 0.94;
      }
    
      56% {
        opacity: 0.9;
      }
    
      58% {
        opacity: 0.9;
      }
    
      60% {
        opacity: 0.99;
      }
    
      68% {
        opacity: 1;
      }
    
      70% {
        opacity: 0.9;
      }
    
      72% {
        opacity: 0.95;
      }
    
      93% {
        opacity: 0.93;
      }
    
      95% {
        opacity: 0.95;
      }
    
      97% {
        opacity: 0.93;
      }
    
      to {
        opacity: 1;
      }
    }
        </style>
</head>
<body class="bgimg" style="background-image: url('https://c.tenor.com/A4JsT9Pp_BoAAAAC/pulpfiction-miawallace.gif');">
<?php require('navbar.html'); ?>
    <div class="sign">
      <p class="fast-flicker">Gal</p>eri<p class="flicker">&</p>Foto
    </div>
    <div style="margin-top:10%;">
    <a href="tambahartinfo.php"><p>Tambah?</p></a>
    <form action="" method="post"style="margin-bottom:0%;">
	<input type="text" name="keyword" size="40" autofocus placeholder="masukkan kata kunci untuk pencarian" autocomplete="off" id="keyword">
</form>

    <?php if($hlmakf >1) : ?>
    <a href="?p=<?= $hlmakf - 1?>">&laquo;</a>
        <?php endif; ?>
    <?php for($i=1;$i<=$jmllmn;$i++) : ?>
    <?php if($i == $hlmakf) : ?>
    <a href="?p=<?= $i ?>" style="font-weight:bold; color:red;"><?= $i ?> </a>
    <?php else : ?>
        <a href="?p=<?= $i ?>"><?= $i ?> </a>
    <?php endif; ?>
    <?php endfor; ?>

    <?php if($hlmakf < $jmllmn) : ?>
    <a href="?p=<?= $hlmakf + 1?>">&raquo;</a>
        <?php endif; ?>
    <br>

    <div id="container">
    <table style="background-image: url('https://i.pinimg.com/originals/81/32/96/813296022908d0d4adaa55a4eaf5207a.gif');color:white;" cellpadding="10" cellspacing="0">
    <tr> 
        <th>No.</th>
        <th>Nama</th>
        <th width="150px">Desc</th>
        <th>Gambar</th>
        <th>Action</th>
    </tr>
    <?php $i=1; ?>
<?php foreach($tamu as $row): ?>
    <tr> 
    <td><?= $i?>  </td>
        <td><?= $row["nama_foto"] ?></td>
        <td><?= $row["mediadesc"] ?></td>
        <td><img src="images/<?=$row["nama_foto"];?>"width="100" height="100"></td>
        <td><a href="hapus1.php?id=<?= $row["id_foto"]?>" onclick="return confirm('Yakin?');" style="color:white;">Hapus</a></td>
    </tr>
    <?php $i++ ?>
<?php endforeach; ?> 
</table>
</div>
</div>
<script src="script1.js"></script>
</body>
</html>