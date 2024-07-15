<?php

include 'admin/functions.php';
session_start();
$conn = mysqli_connect("localhost","root","","trashbank");
$dnt=date("m/d/Y, h:s A"); 

$_POST['datereceived']=$dnt;

if (isset($_POST["submit"])) { 
     
     if(addmessage($_POST) > 0){
          echo "<script>
alert('Message Sent');
          </script>
          ";
          
     } else {echo "<script>
          alert('Failed When Sending The Message');
                    </script>;"
          ;}
}
?>
<!DOCTYPE html>
<html>

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Save World | Donasikan Sampah Anda</title>
    <link rel="shortcut icon" href="assets/images/static.png" type="image">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <style>
      .welcome-area {
          overflow: hidden;
          position: relative;
          display: flex;
          align-items: center;
          justify-content: center;
          background-image: url(assets/images/sampah3.jpg);
          background-repeat: no-repeat;
          background-position: center center;
          background-size: cover; 
          height: 100vh;
        }
      </style>
  </head>

<body>

  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            
            <a href="index.html" class="logo">
              <h4>Save<span>World</span></h4>
            </a>
            
            <ul class="nav">
              <li class="scroll-to-section"><a href="#Home" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#about">About</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Things We Do</a></li>
              <li class="scroll-to-section"><a href="#contact">Contact Us</a></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            
          </nav>
        </div>
      </div>
    </div>
  </header>
  
  <div class="welcome-area" id="Home">

    <div class="header-text">
        <div class="container">
            <div class="row">
                <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                    <h1>Welcome to <strong>Save World</strong><br>Membuat Indonesia Menjadi Lebih Bersih</h1>
                    <p>Jagalah Lingkungan Seperti Anda Diri Sendiri</p>
                </div>
            </div>
        </div>
    </div>
    
</div>


  <div class="main-banner wow fadeIn Home" id="about" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <h6><strong>Aku Sampah Trash Bank</strong><br>Sampah Anda Sangat Berarti Bagi Kami</h6>
                <p>Visi kami adalah menjadikan Indonesia lebih bersih, hijau, dan maju dengan meningkatkan kesadaran serta partisipasi masyarakat dalam mendonasikan dan mengelola sampah secara bertanggung jawab dan berkelanjutan. Misi kami adalah mengedukasi masyarakat tentang pentingnya pengelolaan sampah yang baik, menyediakan platform donasi sampah yang mudah diakses, bekerjasama dengan berbagai pihak untuk mendukung kegiatan daur ulang, mendukung pembangunan fasilitas pengelolaan sampah, menciptakan peluang ekonomi melalui pengelolaan sampah, serta mendorong penggunaan teknologi hijau dan solusi inovatif dalam pengelolaan sampah. Kami berkomitmen untuk memberikan kontribusi nyata dalam menciptakan Indonesia yang lebih bersih dan meningkatkan kualitas hidup masyarakat.<br>
                  -<em>MR.ChatGpt</em>-
                </p>
                <!-- <form id="search" action="" method="POST">
                    <fieldset>
                      <input type="abc" name="abc" class="email" placeholder="Galeri Foto & Video" disabled >
                    </fieldset>
                    <fieldset>
                      <button type="submit" class="main-button" name="submit"><a href="galeri.php">Go!</a></button>
                    </fieldset>
                  </form> -->
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/orang2.jpg" alt="team meeting">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="section-heading  wow bounceIn col-lg-6 offset-lg-3" data-wow-duration="1s" data-wow-delay="0.2s">
    <h2 style="text-align:center;">what have we <em>done </em> &amp; <br>
    What are we going to<span> do</span></h2>
  </div>

  <div id="portfolio" class="about-us section" style="margin-top: 10px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
            <img src="assets/images/orang3.png" alt="person graphic">
          </div>
        </div>
        <div class="col-lg-8 align-self-center">
          <div class="services">
            <div class="row">
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                  <div class="icon">
                    <img src="assets/images/service-icon-01-new.png" alt="reporting">
                  </div>
                  <div class="right-text">
                    <h4>Great Transaction</h4>
                    <p>Anda memberi kami sampah, kami memberi Anda<span style="font-size:5px;">(sebagian)</span>uang.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                  <div class="icon">
                    <img src="assets/images/service-icon-02-new.png" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Save the Environment</h4>
                    <p>Jadikan dunia menjadi tempat yang lebih baik<span style="font-size:5px;">(Bagi Kita)</span>dengan mulai membuang sampah</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                  <div class="icon">
                    <img src="assets/images/service-icon-03-new.png" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Recycling</h4>
                    <p>Mengurangi jumlah sampah dengan melestarikan sumber daya alam, menghemat energi, dan lain-lain</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                  <div class="icon">
                    <img src="assets/images/service-icon-04-new.png" alt="">
                  </div>
                  <div class="right-text">
                    <h4>Make People Smarter</h4>
                    <p>Dengan terciptanya website ini, diharapkan masyarakat menjadi lebih kritis dan cerdas dalam hal sampah</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br><br>

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Jika Anda memerlukan informasi lebih lanjut, jangan ragu untuk menghubungi kami.</h2>
            <p>Anda dapat menggunakan kotak pesan di samping atau menggunakan nomor telepon di bawah untuk menghubungi saya. Jika saya sibuk dan tidak dapat menjawab panggilan telepon Anda, silakan tinggalkan pesan suara untuk saya.</p>
            <div class="phone-info">
              <h4>Kamu Bisa Menghubungi : <span>&nbsp&nbsp&nbsp<img src="assets/images/phoneicon.png" style="width:5%;height:5%;"></i>&nbsp&nbsp <a href="#">0813-8936-1481</a></span></h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-lg-6">
                <fieldset>
                  <input type="text" name="mname" id="name" placeholder="Name" autocomplete="off" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <input type="text" name="memail" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <textarea name="message" type="text" class="form-control" id="message" placeholder="Message" required=""></textarea>  
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button type="submit" name="submit" class="main-button ">Send Message</button>
                </fieldset>
              </div>
            </div>
            <div class="contact-dec">
              <img src="assets/images/contact-decoration.png" alt="">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p><a rel="nofollow" href="admin/login.php" style="color:black;">©</a> Copyright 2024 HumaCorp. All Rights Reserved. 
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/templatemo-custom.js"></script>

</body>
</html>