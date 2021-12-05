<?php
$judul = 'App | Detail Produk';
include 'komponen/header.php';
include '../koneksi.php';
$kode = $_GET['kode'];
$ambil=$koneksi->query("SELECT * FROM produk WHERE kode_produk='$kode'");
$pecah=$ambil->fetch_assoc();


// mencari total barang terjual
$pemasukan=mysqli_query($koneksi,"SELECT * FROM detail_beli WHERE kode_produk='$kode'");
while ($masuk=mysqli_fetch_array($pemasukan)){
  $arraymasuk[] = $masuk['jumlah'];
  $arrayrating[] = $masuk['rating'];
}
$jmltransaksi = mysqli_num_rows($pemasukan);
$jumlahterjual= array_sum($arraymasuk);
$jml_rating = array_sum($arrayrating);

$rating = $jml_rating/$jmltransaksi;

// Tampilan Rating
if ($rating == 1 ) {
  $tampil_rating = '<span class="fa fa-star text-warning"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>';
}
if ($rating > 1 ) {
  $tampil_rating = '<span class="fa fa-star text-warning"></span>
  <span class="fa fa-star-half-alt text-warning star-icon"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>';
}
if ($rating == 2 ) {
 $tampil_rating = '<span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>'; 
}
if ($rating > 2 ) {
  $tampil_rating = '<span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star-half-alt text-warning star-icon"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>'; 
}
if ($rating == 3 ) {
  $tampil_rating = '<span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star"></span>
  <span class="fa fa-star"></span>'; 
}
if ($rating > 3 ) {
  $tampil_rating = '<span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star-half-alt text-warning star-icon"></span>
  <span class="fa fa-star"></span>'; 
}
if ($rating == 4 ) {
  $tampil_rating = '<span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star"></span>'; 
}
if ($rating > 4 ) {
  $tampil_rating = '<span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star-half-alt text-warning star-icon"></span>'; 
}
if ($rating == 5 ) {
  $tampil_rating = '<span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>
  <span class="fa fa-star text-warning"></span>'; 
}


if (empty($jumlahterjual) OR !isset($jumlahterjual)) {
  $terjual ='0';
}
else {
  $terjual=$jumlahterjual;
}


?>
  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <div class="content">
          <?php include 'komponen/topbar.php';?>
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                  <div class="product-slider" id="galleryTop">
                    <div class="">
                      <div class="swiper-wrapper h-100">
                        <div class="swiper-slide h-100"><img class="rounded-1 fit-cover h-100 w-100" src="../fotoproduk/<?=$pecah['foto']?>" alt="" /></div>
                      </div>                      
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <h5 class="text-uppercase"><?=$pecah['nama_produk']?></h5><a class="fs--1 mb-2 d-block" href="#!"><?=$pecah['katagori']?></a>
                  <div class="fs--2 mb-3 d-inline-block text-decoration-none"><?=$tampil_rating?><span class="ms-1 text-600">(<?=round($rating,1)?>)</span>
                  </div>
                  <p class="fs--1" style="white-space: pre-line;"><?=$pecah['deskripsi']?></p>
                  <h4 class="d-flex align-items-center"><span class="text-warning me-2">Rp.<?=number_format($pecah['harga'])?></span><span class="me-1 fs--1 text-500">
                      <del class="me-1">$2400</del><strong>-50%</strong></span></h4>
                  <p class="fs--1 mb-1"> <span>Produk Terjual: </span><strong> <?=$terjual?></strong></p>
                  <p class="fs--1">Stock: <strong class="text-success">Available</strong></p>
                  <p class="fs--1 mb-3">Tags: <a class="ms-2" href="#!">Sepatu,</a><a class="ms-1" href="#!"><?=$pecah['katagori']?>,</a><a class="ms-1" href="#!">Olahraga</a></p>
                  <form method="post" action="beli2">
                    <div class="row">
                      <div class="col-auto pe-0">
                        <div class="input-group input-group-sm" data-quantity="data-quantity">
                          <button class="btn btn-sm btn-outline-secondary border-300" type="button" data-field="input-quantity" data-type="minus">-</button>
                          <input class="form-control text-center input-quantity input-spin-none" type="number" name="jumlah" min="0" value="1" aria-label="Amount (to the nearest dollar)" style="max-width: 50px" />
                          <button class="btn btn-sm btn-outline-secondary border-300" type="button" data-field="input-quantity" data-type="plus">+</button>
                          <input type="hidden" name="id" value="<?=$pecah['id']?>">
                          <input type="hidden" name="produk" value="<?=$pecah['nama_produk']?>">
                        </div>
                      </div>
                      <div class="col-auto px-2 px-md-3"><button class="btn btn-sm btn-primary" type="submit"><span class="fas fa-cart-plus me-sm-2"></span><span class="d-none d-sm-inline-block">Beli</span></button></div>
                      <div class="col-auto px-0"><a class="btn btn-sm btn-outline-danger border-300" href="#!" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to Wish List"><span class="far fa-heart me-1"></span>282</a></div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="overflow-hidden mt-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item"><a class="nav-link active px-2 px-md-3" id="reviews-tab" data-bs-toggle="tab" href="#tab-reviews" role="tab" aria-controls="tab-reviews" aria-selected="false">Reviews</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane show active fade" id="tab-reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="row mt-3">
                          <div class="col-lg-12 mb-4 mb-lg-0">
                            <?php
                            $batas = 5;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $data = mysqli_query($koneksi,"select * from detail_beli INNER JOIN beli ON detail_beli.kode_transaksi=beli.kode_transaksi WHERE kode_produk='$kode'");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $data_produk = mysqli_query($koneksi,"select * from detail_beli INNER JOIN beli ON detail_beli.kode_transaksi=beli.kode_transaksi WHERE kode_produk='$kode' limit $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;
                            while($d = mysqli_fetch_array($data_produk)){
                              ?>
                              <?php
                                // Tampilan Rating
                              $rating2 = $d['rating'];
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
                               ?>
                            <div class="mb-1"><?=$tampil_rating2?><span class="ms-3 text-dark fw-semi-bold text-lowercase"><?=$d['nama']?></span>
                            </div>
                            <p class="fs--1 mb-2 text-600 text-lowercase">By <?=$d['nama']?> • <?=date('d F Y', strtotime($d['tgl_beli']));?></p>
                            <p class="mb-0"><?=$d['komentar']?></p>
                            <hr class="my-4" />
                            <?php } ?>
                            <center>
                              <?php
                                if ($halaman < $total_halaman) {
                                  echo "<a href='?halaman=$next&kode=$kode'>Berikutnya</a>";
                                }
                                if ($halaman > 1) {
                                  echo "<a href='?halaman=$previous&kode=$kode'>Sebelumnya</a>";
                                }
                               ?>
                              
                            </center>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php include 'komponen/bawah.php';?>
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
    <?php include 'komponen/kustom.php';?>
    <?php include 'komponen/footer.php';?>