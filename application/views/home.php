<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('layout/head') ?>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <?php $this->load->view('layout/header') ?>
  </header><!-- End Header -->

  <!-- ======= Intro Section ======= -->
  <section id="intro">
    <div class="intro-container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="mb-4 pb-0">Harilab Production</h1>
      <!-- <p class="mb-4 pb-0">10-12 December, Downtown Conference Center, New York</p> -->
      <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
      <a href="#about" class="about-btn scrollto">About The Event</a> -->
    </div>
  </section><!-- End Intro Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>About Us</h2>
        </div>
        <div class="section-header2">
          <p>Harilab Production is a leading, high performance, innovative media creation enterprise based in Bandung.
            We believe in providing a positive impact, creatively driven solutions in film, videography, multimedia, photography, social media, website development, and event management for our clients.</p>
        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= Clients Section ======= -->
    <section id="services" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Our Core Services</h2>
        </div>

        <div class="row no-gutters supporters-wrap clearfix" data-aos="zoom-in" data-aos-delay="100">
          <!-- <?php foreach ($kategori as $k) { ?> -->
            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="<?= base_url() ?>/uploads/client_img/<?= $k->image_kategori; ?>" class="img-fluid" alt="">
              </div>
            </div>
          <!-- <?php } ?> -->
        </div>

      </div>

    </section><!-- End Clients Section -->

    <!-- ======= Projects Section ======= -->
    <section id="projects">

      <div class="container-fluid" data-aos="fade-up">
        <div class="section-header">
          <h2>Our Work</h2>
        </div>
      </div>

      <div class="container-fluid projects-gallery-container" data-aos="fade-up" data-aos-delay="100">
        <div class="row no-gutters">
          <?php foreach ($proyek as $p) { ?>
            <div class="col-lg-3 col-md-4">
              <div class="projects-gallery">
                <a href="<?= base_url() ?><?= $p->url; ?>" class="venobox" data-vbtype="video" data-gall="projects-gallery" data-autoplay="true">
                  <img src="<?= base_url('uploads/proyek_img/' . $p->image_proyek) ?>" alt="" class="img-fluid">
                </a>
              </div>
            </div>
          <?php } ?>

          <!-- <div class="col-lg-3 col-md-4">
            <div class="projects-gallery">
              <a href="assets-frontend/img/venue-gallery/1.jpg" class="venobox" data-gall="projects-gallery">
                <img src="assets-frontend/img/venue-gallery/1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div> -->

    </section><!-- End Projects Section -->

    <!-- ======= Team Section ======= -->
    <section id="teams">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Our Teams</h2>
          <!-- <p>Here are some of our speakers</p> -->
        </div>

        <div class="row">
          <?php foreach ($team as $t) { ?>
            <div class="col-lg-4 col-md-6">
              <div class="team" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= base_url() ?>/uploads/team_img/thumbs/<?= $t->image_team; ?>" alt="Speaker 1" class="img-fluid">
                <div class="details">
                  <h3><?= $t->nama_anggota ?></h3>
                  <p><?= $t->nama_jabatan ?></p>
                  <div class="social">
                    <?php if($t->twitter != "#"):?>
                      <a target="_blank" rel="noopener noreferrer" href="<?= $t->twitter ?>"><i class="fa fa-twitter"></i></a>
                    <?php endif;?>
                    <?php if($t->fb != "#"):?>
                    <a target="_blank" rel="noopener noreferrer" href="<?= $t->fb ?>"><i class="fa fa-facebook"></i></a>
                    <?php endif;?>
                    <?php if($t->instagram != "#"):?>
                    <a target="_blank" rel="noopener noreferrer" href="<?= $t->instagram ?>"><i class="fa fa-instagram"></i></a>
                    <?php endif;?>
                    <?php if($t->linkedin != "#"):?>
                    <a target="_blank" rel="noopener noreferrer" href="<?= $t->linkedin ?>"><i class="fa fa-linkedin"></i></a>
                    <?php endif;?>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

    </section><!-- End Speakers Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Trusted By</h2>
        </div>

        <div class="row no-gutters supporters-wrap clearfix" data-aos="zoom-in" data-aos-delay="100">
          <?php foreach ($client as $c) { ?>
            <div class="col-lg-3 col-md-4 col-xs-6">
              <div class="client-logo">
                <img src="<?= base_url() ?>/uploads/client_img/<?= $c->image_client; ?>" class="img-fluid" alt="">
              </div>
            </div>
          <?php } ?>
        </div>

      </div>

    </section><!-- End Clients Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact Us</h2>
          <!-- <p>Nihil officia ut sint molestiae tenetur.</p> -->
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>Cihanjuang, Komp. Puri Budi Asri No. K5</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Nomor HP</h3>
              <p><a href="tel:+6282116785996">+6282116785996 (Yagi)</a></p>
              <p><a href="tel:+6281214694401">+6281214694401 (Harilab)</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@harilabproduction.com">info@harilabproduction.com</a></p>
            </div>
          </div>

        </div>

        <!-- <div class="form">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div> -->

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <!-- <div class="col-lg-3 col-md-6 footer-info">
            <img src="assets/img/logo.png" alt="TheEvenet">
            <p>In alias aperiam. Placeat tempore facere. Officiis voluptate ipsam vel eveniet est dolor et totam porro. Perspiciatis ad omnis fugit molestiae recusandae possimus. Aut consectetur id quis. In inventore consequatur ad voluptate cupiditate debitis accusamus repellat cumque.</p>
          </div> -->

          <!-- <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div> -->

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="<?= base_url('index.php/login') ?>">Site Login</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              JL. Cihanjuang Komp. Puri Budi Asri No K5, <br> 
              Cihanjuang, Kec. Parongpong <br>
              Kabupaten Bandung Barat, Jawa Barat 40559<br>
              Indonesia <br>
              <strong>Nomor HP:</strong> 6282116785996 (Yagi)<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright 2006 - 2020 <strong>Harilab Production</strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <?php $this->load->view('layout/js') ?>
</body>

</html>