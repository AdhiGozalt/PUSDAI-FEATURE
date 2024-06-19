<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.png">
        
        <title>Pusdai | Jawa Barat</title>
        
        <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
        
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        
        <style>
            .nav-link {
                font-weight: 700;
                font-size: 18px;
                color: #969090;
            } 1
            .nav-link:hover {
                color: #ffffff;
            }
            .nav-item.active .nav-link {
                color: #ffffff;
            }
            .dropdown:hover .dropdown-menu {
                display: block;
            }
            .page-banner {
            	position:relative;
            	padding: 0;
            	color: #ffffff;
            	background: #0f2c36;
            	background-position:center top;
            	background-repeat:no-repeat;
            	background-size:cover;
            	margin-top: -106px;
            	z-index: -1;
            }
            .page-banner .banner-bottom-pattern {
            	position: absolute;
            	left: 0;
            	bottom: -10px;
            	width: 100%;
            	height: 120px;
                background: url(../../assets/images/banner-bottom.png) center bottom no-repeat;
            	background-size: 100% 100%;
            	z-index: 5;
            }
            .page-banner .banner-inner {
            	position: relative;
            	display: block;
            	z-index:2;
            }
            .page-banner .inner-container {
            	position: relative;
            	padding: 290px 0px 230px;
            }
            .page-banner.ext-banner .inner-container {
            	height: 820px;
            }
            .page-banner .image-layer {
            	position: absolute;
            	left: 0;
            	top: 0;
            	width: 100%;
            	height: 100%;
            	background-position:center center;
            	background-repeat:no-repeat;
            	background-size:cover;
            }
            .page-banner .image-layer:before {
            	content: '';
            	position: absolute;
            	left: 0;
            	top: 0;
            	width: 100%;
            	height: 100%;
            	background: #171b27;
            	opacity: 0.50;
            }
            .facility .col-md-4 {
            	color: #212529;
            }
            .facility input[type="radio"] {
            	display: none;
            }
            .facility label {
            	background-color: #eeeeee;
            	cursor: pointer;
            }
            .facility .form-check-label:hover {
            	background-color: #ffffff;
            	border: 1px solid #5a8dee !important;
            	transition: .5s;
            }
            .facility .form-check-label.active {
            	background-color: #ffffff;
            	border: 1px solid #5a8dee !important;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url(); ?>">
                    <img src="<?= base_url(); ?>/assets/images/logo.png" alt="Logo" width="100%" height="80" class="d-inline-block align-top">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lembaga</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Fasilitas</a>
                        </li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Layanan
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">BMPU</a>
                                <a class="dropdown-item" href="#">Ikrar Syahadat</a>
                                <a class="dropdown-item" href="#">AQSA</a>
                                <a class="dropdown-item active" href="#">INFAQ (Sewa Fasiltas)</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Event</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <?php $this->renderSection('content'); ?>
        
        <!-- Footer -->
        <footer class="text-lg-start bg-body-tertiary text-muted">
          <!-- Section: Social media -->
          <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Right -->
            <div>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
              </a>
              <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
              </a>
            </div>
            <!-- Right -->
          </section>
          <!-- Section: Social media -->
        
          <!-- Section: Links  -->
          <section class="">
            <div class="container text-md-start mt-5">
              <!-- Grid row -->
              <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                  <!-- Content -->
                  <img src="<?= base_url(); ?>/assets/images/favicon.png" alt="Logo" class="img-fluid mb-3">
                  <!--<h6 class="text-uppercase fw-bold mb-4">-->
                  <!--  <i class="fas fa-gem me-3"></i>Hasil Kerjasama antara Pusdai dan Telkom University-->
                  <!--</h6>-->
                  <p>
                    Hasil Kerjasama antara Pusdai dan Telkom University
                  </p>
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    Nama Dosen Pembimbing
                  </h6>
                  <p>
                    <a href="#!" class="text-reset">KEMAS RAHMAT SALEH WIHARJA, S.T., M.Eng., Ph.D.</a>
                  </p>
                  
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                  <!-- Links -->
                  <h6 class="text-uppercase fw-bold mb-4">
                    Nama Mahasiswa
                  </h6>
                  <p>
                    <a href="#!" class="text-reset">Adhi Gozalt</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">Gandhi Risyad</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">Annalia Alfia</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">Tiara Novri</a>
                  </p>
                  <p>
                    <a href="#!" class="text-reset">Wahyu Pratama</a>
                  </p>
                </div>
                <!-- Grid column -->
        
                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                  <!-- Links -->
                  
                  <img src="<?= base_url(); ?>/assets/images/telu.png" alt="Logo" class="img-fluid mb-3"

                </div>
                <!-- Grid column -->
              </div>
              <!-- Grid row -->
            </div>
          </section>
          <!-- Section: Links  -->
        
          <!-- Copyright -->
          <div class="text-center p-4" style="background-color: #181b1f;">
            © 2022 
            <a class="text-reset fw-bold" href="<?= base_url(); ?>">Pusdai - JawaBarat</a>
          </div>
          <!-- Copyright -->
        </footer>
        <!-- Footer -->
        
        <script src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
        <script src="<?= base_url(); ?>/assets/js/popper.min.js"></script>
        <script src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>
    </body>
</html>