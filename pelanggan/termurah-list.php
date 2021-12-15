<?php
$judul = 'App | Produk Termurah';
include 'komponen/header.php';
include '../koneksi.php';
include 'komponen/refresh.php';
session_start();
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
              <div class="row flex-between-center">
                <div class="col-sm-auto mb-2 mb-sm-0">
                  <h6 class="mb-0">Showing 1-24 of 205 Products</h6>
                </div>
                <div class="col-sm-auto">
                  <div class="row gx-2 align-items-center">
                    <div class="col-auto">
                      <form class="row gx-2">
                        <div class="col-auto"><small>Sort by: </small></div>
                        <div class="col-auto">
                          <select class="form-select form-select-sm" aria-label="Bulk actions">
                            <option selected="">Best Match</option>
                            <option value="Refund">Newest</option>
                            <option value="Delete">Price</option>
                          </select>
                        </div>
                      </form>
                    </div>
                    <div class="col-auto pe-0"><a class="text-600 px-1" href="termurah" data-bs-toggle="tooltip" title="Tampilankan Grid"><span class="fas fa-th"></span></a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body p-0 overflow-hidden">
              <div class="row g-0">
                <?php 
                $batas = 10;
                $nomor = 1;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

                $previous = $halaman - 1;
                $next = $halaman + 1;

                $data = mysqli_query($koneksi,"SELECT * FROM produk ORDER BY harga ASC");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                $data_produk = mysqli_query($koneksi,"SELECT * FROM produk ORDER BY harga ASC LIMIT $halaman_awal, $batas");
                $nomor = $halaman_awal+1;
                while($d = mysqli_fetch_array($data_produk)){
                  
                  $diskon = $d['harga']*2;

                  $nomor++;
                  if ($nomor % 2 == 0) {
                    $bg_color ='bg-100';
                  }
                  else {
                    $bg_color ='';
                  }

                  $kode = $d['kode_produk'];
                  $pemasukan=mysqli_query($koneksi,"SELECT * FROM detail_beli WHERE kode_produk='$kode'");
                  $jml_rating = 0;
                  $jumlahterjual = 0;
                  while ($masuk=mysqli_fetch_array($pemasukan)){
                    $arraymasuk = $masuk['jumlah'];
                    $arrayrating = $masuk['rating'];
                    $jmltransaksi = mysqli_num_rows($pemasukan);
                  $jumlahterjual += $arraymasuk;
                  $jml_rating += $arrayrating;
                  }                  

                  $rating = $jml_rating/$jmltransaksi;
                  // Tampilan Rating
                  if ($rating == 1 ) {
                    $tampil_rating = '<span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>';
                    $banner_atas= '<div class="badge rounded-pill bg-success position-absolute top-0 end-0 me-2 mt-2 fs--2 z-index-2">New</div>';
                  }
                  if ($rating > 1 ) {
                    $tampil_rating = '<span class="fa fa-star text-warning"></span>
                    <span class="fa fa-star-half-alt text-warning star-icon"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>';
                    $banner_atas= '<div class="badge rounded-pill bg-success position-absolute top-0 end-0 me-2 mt-2 fs--2 z-index-2">New</div>';
                  }
                  if ($rating == 2 ) {
                   $tampil_rating = '<span class="fa fa-star text-warning"></span>
                   <span class="fa fa-star text-warning"></span>
                   <span class="fa fa-star"></span>
                   <span class="fa fa-star"></span>
                   <span class="fa fa-star"></span>'; 
                   $banner_atas= '<div class="badge rounded-pill bg-success position-absolute top-0 end-0 me-2 mt-2 fs--2 z-index-2">New</div>';
                 }
                 if ($rating > 2 ) {
                  $tampil_rating = '<span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star-half-alt text-warning star-icon"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>';
                  $banner_atas= '<div class="badge rounded-pill bg-success position-absolute top-0 end-0 me-2 mt-2 fs--2 z-index-2">New</div>'; 
                }
                if ($rating == 3 ) {
                  $tampil_rating = '<span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>';
                  $banner_atas= '<div class="badge rounded-pill bg-success position-absolute top-0 end-0 me-2 mt-2 fs--2 z-index-2">New</div>'; 
                }
                if ($rating > 3 ) {
                  $tampil_rating = '<span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star-half-alt text-warning star-icon"></span>
                  <span class="fa fa-star"></span>'; 
                  $banner_atas= '<div class="badge rounded-pill bg-danger position-absolute top-0 end-0 me-2 mt-2 fs--2 z-index-2">Hot</div>';
                }
                if ($rating == 4 ) {
                  $tampil_rating = '<span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star"></span>'; 
                  $banner_atas= '<div class="badge rounded-pill bg-danger position-absolute top-0 end-0 me-2 mt-2 fs--2 z-index-2">Hot</div>';
                }
                if ($rating > 4 ) {
                  $tampil_rating = '<span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star-half-alt text-warning star-icon"></span>'; 
                  $banner_atas= '<div class="badge rounded-pill bg-danger position-absolute top-0 end-0 me-2 mt-2 fs--2 z-index-2">Hot</div>';
                }
                if ($rating == 5 ) {
                  $tampil_rating = '<span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>
                  <span class="fa fa-star text-warning"></span>'; 
                  $banner_atas= '<div class="badge rounded-pill bg-danger position-absolute top-0 end-0 me-2 mt-2 fs--2 z-index-2">Hot</div>';
                }
                if ($rating == 0 ) {
                  $tampil_rating = '<span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>'; 
                  $banner_atas= '<div class="badge rounded-pill bg-success position-absolute top-0 end-0 me-2 mt-2 fs--2 z-index-2">New</div>';
                }
                  ?>
                <div class="col-12 p-card <?=$bg_color?>">
                  <div class="row">
                    <div class="col-sm-5 col-md-4">
                      <div class="position-relative h-sm-100"><a class="d-block h-100" href="detail-produk?kode=<?=$d['kode_produk']?>"><img class="img-fluid fit-cover w-sm-100 h-sm-100 rounded-1 absolute-sm-centered" src="../fotoproduk/<?=$d['foto']?>" alt="" /></a>
                        <?=$banner_atas?>
                      </div>
                    </div>
                    <div class="col-sm-7 col-md-8">
                      <div class="row">
                        <div class="col-lg-8">
                          <h5 class="mt-3 mt-sm-0"><a class="text-dark fs-0 fs-lg-1" href="detail-produk?kode=<?=$d['kode_produk']?>"><?=$d['nama_produk']?></a></h5>
                          <p class="fs--1 mb-2 mb-md-3"><a class="text-500" href="#!"><?=$d['katagori']?></a></p>
                          <p class="fs--1" style="white-space: pre-line;"><?=$d['deskripsi']?></p>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-between flex-column">
                          <div>
                            <h4 class="fs-1 fs-md-2 text-warning mb-0">Rp.<?=number_format($d['harga'])?></h4>
                            <h5 class="fs--1 text-500 mb-0 mt-1">
                              <del>Rp.<?=$diskon?> </del><span class="ms-1">-50%</span>
                            </h5>
                            <div class="mb-2 mt-3"><?=$tampil_rating?><span class="ms-1">(<?=round($rating,1)?>)</span>
                            </div>
                            <div class="d-none d-lg-block">
                              <p class="fs--1 mb-1">Stok: <strong class="text-success">Available</strong></p>
                              <p class="fs--1 mb-1">Jumlah Stok: <strong><?=$d['stok']?></strong></p>
                              <p class="fs--1 mb-1">Terjual: <strong><?=$jumlahterjual?></strong></p>
                            </div>
                          </div>
                          <div class="mt-2">
                            <a class="btn btn-sm btn-outline-secondary border-300 d-lg-block me-2 me-lg-0" href="#!"><span class="far fa-heart"></span><span class="ms-2 d-none d-md-inline-block">Favourite</span></a>
                            <a class="btn btn-sm btn-primary d-lg-block mt-lg-2" href="beli?kode=<?=$d['kode_produk']?>&id=<?=$d['id']?>&produk=<?=$d['nama_produk']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Masukkan Keranjang"><span class="fas fa-cart-plus"> </span><span class="ms-2 d-none d-md-inline-block">Add to Cart</span></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><div class="vertical-line d-none d-md-block d-xl-none d-xxl-block"> </div>
              <?php } ?>
              </div>
            </div>
            <div class="card-footer border-top d-flex justify-content-center">
              <a class="btn btn-falcon-default btn-sm me-2" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>><span class="fas fa-chevron-left"></span> Sebelumnya</a>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                  ?> 
                  <a class="btn btn-sm btn-falcon-default me-2" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
                  <?php
                }
                ?>    
                <a class="btn btn-falcon-default btn-sm me-2" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Berikutnya <span class="fas fa-chevron-right"></span></a>
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