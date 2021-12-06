<?php
$judul = 'App | Beranda';
include 'komponen/header.php';
include '../koneksi.php';
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
                        <div class="col-auto"><small>Sort by:</small></div>
                        <div class="col-auto">
                          <select class="form-select form-select-sm" aria-label="Bulk actions">
                            <option selected="">Best Match</option>
                            <option value="Refund">Newest</option>
                            <option value="Delete">Price</option>
                          </select>
                        </div>
                      </form>
                    </div>
                    <div class="col-auto pe-0"> <a class="text-600 px-1" href="../app/e-commerce/product/product-list.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Product List"><span class="fas fa-list-ul"></span></a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card shadow mb-3 ">
            <div class="card-body">
              <div class="row">
                <?php 
                $batas = 12;
                $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;  

                $previous = $halaman - 1;
                $next = $halaman + 1;

                $data = mysqli_query($koneksi,"select * from produk");
                $jumlah_data = mysqli_num_rows($data);
                $total_halaman = ceil($jumlah_data / $batas);

                $data_produk = mysqli_query($koneksi,"select * from produk limit $halaman_awal, $batas");
                $nomor = $halaman_awal+1;
                while($d = mysqli_fetch_array($data_produk)){

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
                if ($rating == 0 ) {
                  $tampil_rating = '<span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>
                  <span class="fa fa-star"></span>'; 
                }
                  ?>
                <div class="mb-4 col-md-6 col-lg-4">
                  <div class="border shadow rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
                    <div class="overflow-hidden">
                      <div class="position-relative rounded-top overflow-hidden"><a class="d-block" href="detail-produk?kode=<?=$d['kode_produk']?>"><img class="img-fluid rounded-top" src="../fotoproduk/<?=$d['foto']?>" alt="" /></a><span class="badge rounded-pill bg-success position-absolute mt-2 me-2 z-index-2 top-0 end-0">New</span>
                      </div>
                      <div class="p-3">
                        <h5 class="fs-0"><a class="text-dark text-uppercase" href="detail-produk?kode=<?=$d['kode_produk']?>"><?=$d['nama_produk']?></a></h5>
                        <p class="fs--1 mb-3"><a class="text-500" href="#!"><?=$d['katagori']?></a></p>
                        <h5 class="fs-md-2 text-warning mb-0 d-flex align-items-center mb-3"> Rp.<?=number_format($d['harga'])?>
                          
                        </h5>
                        <p class="fs--1 mb-1">Stock: <strong class="text-success">Available</strong>
                        <p class="fs--1 mb-1">Jumlah Stok: <strong><?=$d['stok']?></strong></p>
                        <p class="fs--1 mb-1">Produk Terjual: <strong><?=$jumlahterjual?></strong></p>
                        </p>
                      </div>
                    </div>
                    <div class="d-flex flex-between-center px-3">
                      <div><?=$tampil_rating?><span class="ms-1">(<?=round($rating,1)?>)</span>
                      </div>
                      <div><a class="btn btn-sm btn-falcon-default" href="beli?kode=<?=$d['kode_produk']?>&id=<?=$d['id']?>&produk=<?=$d['nama_produk']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Masukkan Keranjang"><span class="fas fa-cart-plus"></span></a></div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
            <div class="card-footer bg-light d-flex justify-content-center">
              <div>
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


    