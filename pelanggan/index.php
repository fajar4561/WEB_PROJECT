<?php
include 'komponen/landing_head.php';
include '../koneksi.php';
include 'komponen/refresh.php';
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
            <div class="col-md-11 col-lg-8 col-xl-4 pb-7 pb-xl-9 text-center text-xl-start"><a class="btn btn-outline-danger mb-4 fs--1 border-2 rounded-pill" href="#!"><span class="me-2" role="img" aria-label="Gift">🎁</span>Become a pro</a>
              <h1 class="text-white fw-light">Shey <span class="typed-text fw-bold" data-typed-text='["aman","terpercaya","murah","Quality"]'></span><br />Sport Shop</h1>
              <p class="lead text-white opacity-75">Menyediakan berbagai macam alat dan perlengkapan olahraga berkualitas dan murah demi memenuhi kebutuhan olah raga anda.</p><a class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2" href="#!">Start building with the falcon<span class="fas fa-play ms-2" data-fa-transform="shrink-6 down-1"></span></a>
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
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="40" src="../assets/img/logos/b&amp;w/6.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="45" src="../assets/img/logos/b&amp;w/11.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="30" src="../assets/img/logos/b&amp;w/2.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="30" src="../assets/img/logos/b&amp;w/4.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="35" src="../assets/img/logos/b&amp;w/1.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="40" src="../assets/img/logos/b&amp;w/10.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="40" src="../assets/img/logos/b&amp;w/12.png" alt="" /></div>
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
            <div class="col-md col-lg-5 col-xl-4 ps-lg-6"><img class="img-fluid px-6 px-md-0 rounded-circle" src="../fotoproduk/<?=$pecah['foto']?>" alt="" /></div>
            <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
              <h5 class="text-danger"><span class="far fa-lightbulb me-2"></span>Produk Paling Murah</h5>
              <h3><?=$pecah['nama_produk']?></h3>
              <p class="fs--1 mb-1">Harga: <strong class="text-success">Rp.<?=number_format($pecah['harga'])?></strong></p>
              <p style="white-space: pre-line;"><?=substr($pecah["deskripsi"],0,100) . ' <br><br><a href=detail-produk.php?kode='.$pecah["kode_produk"].'>READMORE</a>';?></p>
            </div>
          </div>
          <div class="row flex-center mt-7">
            <div class="col-md col-lg-5 col-xl-4 pe-lg-6 order-md-2"><img class="img-fluid px-6 px-md-0 rounded-circle" src="../fotoproduk/<?=$pecah2['foto']?>" alt="" /></div>
            <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
              <h5 class="text-info"> <span class="far fa-object-ungroup me-2"></span>Produk Paling Laku</h5>
              <h3><?=$pecah2['nama_produk']?></h3>
              <p class="fs--1 mb-1">Harga: <strong class="text-success">Rp.<?=number_format($pecah2['harga'])?></strong></p>
              <p style="white-space: pre-line;"><?=substr($pecah2["deskripsi"],0,100) . ' <br><br><a href=detail-produk.php?kode='.$pecah2["kode_produk"].'>READMORE</a>';?></p>
            </div>
          </div>
          <div class="row flex-center mt-7">
            <div class="col-md col-lg-5 col-xl-4 ps-lg-6"><img class="img-fluid px-6 px-md-0 rounded-circle" src="../fotoproduk/<?=$pecah3['foto']?>" alt="" /></div>
            <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
              <h5 class="text-success"><span class="far fa-paper-plane me-2"></span>Produk Paling Populer</h5>
              <h3><?=$pecah3['nama_produk']?></h3>
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
              <p class="fs-3 fs-sm-4 text-white">Join our community of 20,000+ developers and content creators on their mission to build better sites and apps.</p>
              <button class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2" type="button">Start your webapp</button>
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
              <p class="text-600">Falcon enables front end developers to build custom streamlined user interfaces in a matter of hours, while it gives backend developers all the UI elements they need to develop their web app.And it's rich design can be easily integrated with backends whether your app is based on ruby on rails, laravel, express or any other server side system.</p>
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


    <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
      <div class="offcanvas-header settings-panel-header bg-shape">
        <div class="z-index-1 py-1 light">
          <h5 class="text-white"> <span class="fas fa-palette me-2 fs-0"></span>Settings</h5>
          <p class="mb-0 fs--1 text-white opacity-75"> Set your own customized style</p>
        </div>
        <button class="btn-close btn-close-white z-index-1 mt-0" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body scrollbar-overlay px-card" id="themeController">
        <h5 class="fs-0">Color Scheme</h5>
        <p class="fs--1">Choose the perfect color mode for your app.</p>
        <div class="btn-group d-block w-100 btn-group-navbar-style">
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="theme" />
              <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../assets/img/generic/falcon-mode-default.jpg" alt=""/></span><span class="label-text">Light</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="theme" />
              <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../assets/img/generic/falcon-mode-dark.jpg" alt=""/></span><span class="label-text"> Dark</span></label>
            </div>
          </div>
        </div>
        <hr />
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-start"><img class="me-2" src="../assets/img/icons/left-arrow-from-left.svg" width="20" alt="" />
            <div class="flex-1">
              <h5 class="fs-0">RTL Mode</h5>
              <p class="fs--1 mb-0">Switch your language direction </p><a class="fs--1" href="../documentation/customization/configuration.html">RTL Documentation</a>
            </div>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input ms-0" id="mode-rtl" type="checkbox" data-theme-control="isRTL" />
          </div>
        </div>
        <hr />
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-start"><img class="me-2" src="../assets/img/icons/arrows-h.svg" width="20" alt="" />
            <div class="flex-1">
              <h5 class="fs-0">Fluid Layout</h5>
              <p class="fs--1 mb-0">Toggle container layout system </p><a class="fs--1" href="../documentation/customization/configuration.html">Fluid Documentation</a>
            </div>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input ms-0" id="mode-fluid" type="checkbox" data-theme-control="isFluid" />
          </div>
        </div>
        <hr />
        <div class="d-flex align-items-start"><img class="me-2" src="../assets/img/icons/paragraph.svg" width="20" alt="" />
          <div class="flex-1">
            <h5 class="fs-0 d-flex align-items-center">Navigation Position </h5>
            <p class="fs--1 mb-2">Select a suitable navigation system for your web application </p>
            <div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="option-navbar-vertical" type="radio" name="navbar" value="vertical" data-page-url="../modules/components/navs-and-tabs/vertical-navbar.html" data-theme-control="navbarPosition" />
                <label class="form-check-label" for="option-navbar-vertical">Vertical</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="option-navbar-top" type="radio" name="navbar" value="top" data-page-url="../modules/components/navs-and-tabs/top-navbar.html" data-theme-control="navbarPosition" />
                <label class="form-check-label" for="option-navbar-top">Top</label>
              </div>
              <div class="form-check form-check-inline me-0">
                <input class="form-check-input" id="option-navbar-combo" type="radio" name="navbar" value="combo" data-page-url="../modules/components/navs-and-tabs/combo-navbar.html" data-theme-control="navbarPosition" />
                <label class="form-check-label" for="option-navbar-combo">Combo</label>
              </div>
            </div>
          </div>
        </div>
        <hr />
        <h5 class="fs-0 d-flex align-items-center">Vertical Navbar Style</h5>
        <p class="fs--1 mb-0">Switch between styles for your vertical navbar </p>
        <p> <a class="fs--1" href="../modules/components/navs-and-tabs/vertical-navbar.html#navbar-styles">See Documentation</a></p>
        <div class="btn-group d-block w-100 btn-group-navbar-style">
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle" value="transparent" data-theme-control="navbarStyle" />
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-transparent"> <img class="img-fluid img-prototype" src="../assets/img/generic/default.png" alt="" /><span class="label-text"> Transparent</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle" value="inverted" data-theme-control="navbarStyle" />
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-inverted"> <img class="img-fluid img-prototype" src="../assets/img/generic/inverted.png" alt="" /><span class="label-text"> Inverted</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle" value="card" data-theme-control="navbarStyle" />
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-card"> <img class="img-fluid img-prototype" src="../assets/img/generic/card.png" alt="" /><span class="label-text"> Card</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle" value="vibrant" data-theme-control="navbarStyle" />
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-vibrant"> <img class="img-fluid img-prototype" src="../assets/img/generic/vibrant.png" alt="" /><span class="label-text"> Vibrant</span></label>
            </div>
          </div>
        </div>
        <div class="text-center mt-5"><img class="mb-4" src="../assets/img/icons/spot-illustrations/47.png" alt="" width="120" />
          <h5>Like What You See?</h5>
          <p class="fs--1">Get Falcon now and create beautiful dashboards with hundreds of widgets.</p><a class="mb-3 btn btn-primary" href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/" target="_blank">Purchase</a>
        </div>
      </div>
    </div><a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
      <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
        <div class="bg-soft-primary position-relative rounded-start" style="height:34px;width:28px">
          <div class="settings-popover"><span class="ripple"><span class="fa-spin position-absolute all-0 d-flex flex-center"><span class="icon-spin position-absolute all-0 d-flex flex-center">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path>
                  </svg></span></span></span></div>
        </div><small class="text-uppercase text-primary fw-bold bg-soft-primary py-2 pe-2 ps-1 rounded-end">customize</small>
      </div>
    </a>


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