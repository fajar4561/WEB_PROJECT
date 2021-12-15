<?php
include 'komponen/landing_head.php';
include '../koneksi.php';
include 'komponen/refresh.php';
session_start();
session_destroy();
?>
  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <?php include 'komponen/landing_navbar.php';?>
      <?php include 'komponen/landing_modal.php';?>
      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0 overflow-hidden light" id="banner">

        <div class="bg-holder overlay" style="background-image:url(../assets/img/generic/bg-2.jpg);background-position: center bottom;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row flex-center pt-8 pt-lg-10 pb-lg-9 pb-xl-0">
            <div class="col-md-11 col-lg-8 col-xl-4 pb-7 pb-xl-9 text-center text-xl-start"><a class="btn btn-outline-danger mb-4 fs--1 border-2 rounded-pill" href="produk-list"><span class="me-2" role="img" aria-label="Gift">🎁</span>Jelajahi Produk</a>
              <h1 class="text-white fw-light">Shey <span class="typed-text fw-bold" data-typed-text='["aman","terpercaya","murah","Quality"]'></span><br />Sport Shop</h1>
              <p class="lead text-white opacity-75">Menyediakan berbagai macam alat dan perlengkapan olahraga berkualitas dan murah demi memenuhi kebutuhan olah raga anda.</p><a class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2" href="ulasan">Ulasan Produk<span class="fas fa-play ms-2" data-fa-transform="shrink-6 down-1"></span></a>
            </div>
            <div class="col-xl-7 offset-xl-1 align-self-end mt-4 mt-xl-0"><a class="img rounded" href="../index.html"><img class="img-fluid" src="" alt="" /></a></div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-3 bg-light shadow-sm">

        <div class="container">
          <div class="row flex-center">
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="70" src="../assets/img/logos/nike.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="45" src="../assets/img/logos/adidas.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="90" src="../assets/img/logos/specs.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="40" src="../assets/img/logos/puma.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="70" src="../assets/img/logos/new-balanc.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="60" src="../assets/img/logos/um.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="70" src="../assets/img/logos/umbro.png" alt="" /></div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section>
        <?php
        $ambil=$koneksi->query("SELECT * FROM produk ORDER BY harga ASC");
        $pecah=$ambil->fetch_assoc();
        $ambil2=$koneksi->query("SELECT * FROM produk ORDER BY terjual DESC");
        $pecah2=$ambil2->fetch_assoc();
        $ambil3=$koneksi->query("SELECT * FROM produk ORDER BY rating DESC");
        $pecah3=$ambil3->fetch_assoc();
         ?>

        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
              <h1 class="fs-2 fs-sm-4 fs-md-5"></h1>
              <p class="lead">Built on top of Bootstrap 5, super modular Falcon provides you gorgeous design &amp; streamlined UX for your WebApp.</p>
            </div>
          </div>
          <div class="row flex-center mt-8">
            <div class="col-md col-lg-5 col-xl-4 ps-lg-6"><a href="detail-produk.php?kode=<?=$pecah['kode_produk']?>"><img class="img-fluid px-6 px-md-0 rounded-circle" src="../fotoproduk/<?=$pecah['foto']?>" alt="" /></a></div>
            <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
              <h5 class="text-danger"><span class="far fa-lightbulb me-2"></span>Produk Paling Murah</h5>
              <h3><a href="detail-produk.php?kode=<?=$pecah['kode_produk']?>" class="text-dark"><?=$pecah['nama_produk']?></a></h3>
              <p class="fs--1 mb-1">Harga: <strong class="text-success">Rp.<?=number_format($pecah['harga'])?></strong></p>
              <p style="white-space: pre-line;"><?=substr($pecah["deskripsi"],0,100) . ' <br><br><a href=detail-produk.php?kode='.$pecah["kode_produk"].'>READMORE</a>';?></p>
            </div>
          </div>
          <div class="row flex-center mt-7">
            <div class="col-md col-lg-5 col-xl-4 pe-lg-6 order-md-2"><a href="detail-produk.php?kode=<?=$pecah2['kode_produk']?>"><img class="img-fluid px-6 px-md-0 rounded-circle" src="../fotoproduk/<?=$pecah2['foto']?>" alt="" /></a></div>
            <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
              <h5 class="text-info"> <span class="far fa-object-ungroup me-2"></span>Produk Paling Laku</h5>
              <h3><a href="detail-produk.php?kode=<?=$pecah2['kode_produk']?>" class="text-dark"><?=$pecah2['nama_produk']?></a></h3>
              <p class="fs--1 mb-1">Harga: <strong class="text-success">Rp.<?=number_format($pecah2['harga'])?></strong></p>
              <p style="white-space: pre-line;"><?=substr($pecah2["deskripsi"],0,100) . ' <br><br><a href=detail-produk.php?kode='.$pecah2["kode_produk"].'>READMORE</a>';?></p>
            </div>
          </div>
          <div class="row flex-center mt-7">
            <div class="col-md col-lg-5 col-xl-4 ps-lg-6"><a href="detail-produk.php?kode=<?=$pecah3['kode_produk']?>"><img class="img-fluid px-6 px-md-0 rounded-circle" src="../fotoproduk/<?=$pecah3['foto']?>" alt="" /></a></div>
            <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
              <h5 class="text-success"><span class="far fa-paper-plane me-2"></span>Produk Paling Populer</h5>
              <h3><a href="detail-produk.php?kode=<?=$pecah3['kode_produk']?>" class="text-dark"><?=$pecah3['nama_produk']?></a></h3>
              <p class="fs--1 mb-1">Harga: <strong class="text-success">Rp.<?=number_format($pecah3['harga'])?></strong></p>
              <p style="white-space: pre-line;"><?=substr($pecah3["deskripsi"],0,100) . ' <br><br><a href=detail-produk.php?kode='.$pecah3["kode_produk"].'>READMORE</a>';?></p>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-light text-center">

        <div class="container">
          <div class="row">
            <div class="col">
              <h1 class="fs-2 fs-sm-4 fs-md-5">List Produk Terbaru</h1>
              <p class="lead">Nikmati produk kami yang terbaru degan harga yang terjangkau.</p>
            </div>
          </div>
          <div class="row mt-6">
             <?php 
                $batas = 6;
                $data_produk = mysqli_query($koneksi,"SELECT * FROM produk ORDER BY nama_produk ASC LIMIT $batas ");
                while($d = mysqli_fetch_array($data_produk)){
            ?>
            <div class="col-lg-4 mb-5">
              <div class="card card-span h-100">
                <div class="card-span-img border shadow "><div class="avatar"><img class="rounded-circle" src="../fotoproduk/<?=$d['foto']?>"></div></div>
                <div class="card-body pt-6 pb-4">
                  <h5 class="mb-2 text-uppercase"><small><?=implode(" ", array_slice(explode(" ", $d['nama_produk']), 0, 2));?></small></h5>
                  <p><?=substr($d["deskripsi"],0,100) . ' <br><br><a href=detail-produk.php?kode='.$d["kode_produk"].'>READMORE</a>';?></p>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-200 text-center">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8">
              <div class="swiper-container theme-slider" data-swiper='{"autoplay":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"slideToClickedSlide":true}'>
                <div class="swiper-wrapper">
                  <?php 
                  $conn= $koneksi->query("SELECT * FROM detail_beli INNER JOIN beli ON detail_beli.kode_transaksi=beli.kode_transaksi");
                  while($d2=mysqli_fetch_assoc($conn)){
                    $rating2 = $d2['rating'];
                    if ($rating2 == 1 ) {
                      $tampil_rating2 = '<span class="fa fa-star text-warning"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>
                      <span class="fa fa-star"></span>';
                    }
                    elseif ($rating2 == 2 ) {
                     $tampil_rating2 = '<span class="fa fa-star text-warning"></span>
                     <span class="fa fa-star text-warning"></span>
                     <span class="fa fa-star"></span>
                     <span class="fa fa-star"></span>
                     <span class="fa fa-star"></span>'; 
                   }
                   elseif ($rating2 == 3 ) {
                    $tampil_rating2 = '<span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>'; 
                  }
                  elseif ($rating2 == 4 ) {
                    $tampil_rating2 = '<span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star"></span>'; 
                  }
                  else {
                    $tampil_rating2 = '<span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star text-warning"></span>'; 
                  }
                  $pick_conn=$koneksi->query("SELECT * FROM produk WHERE kode_produk='$d2[kode_produk]'");
                  $fetch=$pick_conn->fetch_assoc();
                    ?>
                  <div class="swiper-slide">
                    <div class="px-5 px-sm-6">
                      <p class="fs-sm-1 fs-md-2 fst-italic text-dark"><?=$d2['komentar']?>.</p>
                      <p><a href="detail-produk?kode=<?=$d2['kode_produk']?>"><span class="badge rounded-pill bg-primary"><?=implode(" ", array_slice(explode(" ", $fetch['nama_produk']), 0, 2));?></span></a></p>
                      <p class="fs-0 text-600">Komentar: <?=implode(" ", array_slice(explode(" ", $d2['nama']), 0, 1));?><br><?=$tampil_rating2?></p><a href="detail-produk?kode=<?=$d2['kode_produk']?>"><div class="avatar avatar-4xl"><img class="rounded-circle  border shadow" src="../fotoproduk/<?=$fetch['foto']?>"></div></a>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                <div class="swiper-nav">
                  <div class="swiper-button-next swiper-button-white"></div>
                  <div class="swiper-button-prev swiper-button-white"> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="light">

        <div class="bg-holder overlay" style="background-image:url(../assets/img/generic/bg-2.jpg);background-position: center top;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-lg-8">
              <p class="fs-3 fs-sm-4 text-white">Shey Sport Melayani anda dengan sepenuh hati, Kritik dan saran demi majunya toko kami. Selamat Berbelanja.</p>
              <a class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2" href="produk">Produk Kami</a>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-dark pt-8 pb-4 light">

        <div class="container">
          <div class="position-absolute btn-back-to-top bg-dark"><a class="text-600" href="#banner" data-bs-offset-top="0" data-scroll-to="#banner"><span class="fas fa-chevron-up" data-fa-transform="rotate-45"></span></a></div>
          <div class="row">
            <div class="col-lg-4">
              <h5 class="text-uppercase text-white opacity-85 mb-3">Our Mission</h5>
              <p class="text-600">Melayani dan menyajikan produk yang terjangkau dengan mutu kualitas terbaik sehingga semua kalangan dapat menikmati peralatan olahraga. Selain itu, demi meningkatkan minat olahraga bagi semua orang.</p>
              <div class="icon-group mt-4"><a class="icon-item bg-white text-facebook" href="#!"><span class="fab fa-facebook-f"></span></a><a class="icon-item bg-white text-twitter" href="#!"><span class="fab fa-twitter"></span></a><a class="icon-item bg-white text-google-plus" href="#!"><span class="fab fa-google-plus-g"></span></a><a class="icon-item bg-white text-linkedin" href="#!"><span class="fab fa-linkedin-in"></span></a><a class="icon-item bg-white" href="#!"><span class="fab fa-medium-m"></span></a></div>
            </div>
            <div class="col ps-lg-6 ps-xl-8">
              <div class="row mt-5 mt-lg-0">
                <div class="col-6 col-md-3">
                  <h5 class="text-uppercase text-white opacity-85 mb-3">Company</h5>
                  <ul class="list-unstyled">
                    <li class="mb-1"><a class="link-600" href="#!">About</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Contact</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Careers</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Blog</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Terms</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Privacy</a></li>
                    <li><a class="link-600" href="#!">Imprint</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3">
                  <h5 class="text-uppercase text-white opacity-85 mb-3">Product</h5>
                  <ul class="list-unstyled">
                    <li class="mb-1"><a class="link-600" href="#!">Features</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Roadmap</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Changelog</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Pricing</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Docs</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">System Status</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Agencies</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Enterprise</a></li>
                  </ul>
                </div>
                <div class="col mt-5 mt-md-0">
                  <h5 class="text-uppercase text-white opacity-85 mb-3">From the Blog</h5>
                  <ul class="list-unstyled">
                    <li>
                      <h5 class="fs-0 mb-0"><a class="link-600" href="#!"> Interactive graphs and charts</a></h5>
                      <p class="text-600 opacity-50">Jan 15 &bull; 8min read </p>
                    </li>
                    <li>
                      <h5 class="fs-0 mb-0"><a class="link-600" href="#!"> Lifetime free updates</a></h5>
                      <p class="text-600 opacity-50">Jan 5 &bull; 3min read &starf;</p>
                    </li>
                    <li>
                      <h5 class="fs-0 mb-0"><a class="link-600" href="#!"> Merry Christmas From us</a></h5>
                      <p class="text-600 opacity-50">Dec 25 &bull; 2min read</p>
                    </li>
                    <li>
                      <h5 class="fs-0 mb-0"><a class="link-600" href="#!"> The New Falcon Theme</a></h5>
                      <p class="text-600 opacity-50">Dec 23 &bull; 10min read </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0 bg-dark light">

        <div>
          <hr class="my-0 text-600 opacity-25" />
          <div class="container py-3">
            <div class="row justify-content-between fs--1">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600 opacity-85">Thank you for creating with Falcon <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2021 &copy; <a class="text-white opacity-85" href="https://themewagon.com">Themewagon</a></p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600 opacity-85">v3.4.0</p>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
        <div class="modal-dialog mt-6" role="document">
          <div class="modal-content border-0">
            <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
              <div class="position-relative z-index-1 light">
                <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
                <p class="fs--1 mb-0 text-white">Please create your free Falcon account</p>
              </div>
              <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4 px-5">
              <form>
                <div class="mb-3">
                  <label class="form-label" for="modal-auth-name">Name</label>
                  <input class="form-control" type="text" autocomplete="on" id="modal-auth-name" />
                </div>
                <div class="mb-3">
                  <label class="form-label" for="modal-auth-email">Email address</label>
                  <input class="form-control" type="email" autocomplete="on" id="modal-auth-email" />
                </div>
                <div class="row gx-2">
                  <div class="mb-3 col-sm-6">
                    <label class="form-label" for="modal-auth-password">Password</label>
                    <input class="form-control" type="password" autocomplete="on" id="modal-auth-password" />
                  </div>
                  <div class="mb-3 col-sm-6">
                    <label class="form-label" for="modal-auth-confirm-password">Confirm Password</label>
                    <input class="form-control" type="password" autocomplete="on" id="modal-auth-confirm-password" />
                  </div>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="modal-auth-register-checkbox" />
                  <label class="form-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register</button>
                </div>
              </form>
              <div class="position-relative mt-5">
                <hr class="bg-300" />
                <div class="divider-content-center">or register with</div>
              </div>
              <div class="row g-2 mt-2">
                <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <?php include 'komponen/kustom.php';?>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="../vendors/popper/popper.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../vendors/anchorjs/anchor.min.js"></script>
    <script src="../vendors/is/is.min.js"></script>
    <script src="../vendors/swiper/swiper-bundle.min.js"> </script>
    <script src="../vendors/typed.js/typed.js"></script>
    <script src="../vendors/fontawesome/all.min.js"></script>
    <script src="../vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../vendors/list.js/list.min.js"></script>
    <script src="../assets/js/theme.js"></script>

  </body>

</html>