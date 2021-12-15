<?php
$judul = 'App | Komentar Publik';
include 'komponen/header.php';
include '../koneksi.php';
include 'komponen/refresh.php';
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
        <?php include 'komponen/topbar.php';?>
        <div class="content">
          
          <div class="row g-3">
            <div class="col-lg-8">
              <div class="card mb-3">
                <div class="card-header bg-light">
                  <div class="row justify-content-between">
                    <div class="col">
                      <div class="d-flex">
                        <div class="avatar avatar-2xl status-online">
                          <?php
                          $pick_conn=$koneksi->query("SELECT * FROM pegawai WHERE jabatan='Pimpinan'");
                          $fetch=$pick_conn->fetch_assoc();
                           ?>
                          <img class="rounded-circle" src="../fotopegawai/<?=$fetch['foto']?>" alt="" />

                        </div>
                        <div class="flex-1 align-self-center ms-2">
                          <p class="mb-1 lh-1"><a class="fw-semi-bold" href="#"><?=$fetch['nama']?></a> shared an <a href="#!">album</a></p>
                          <p class="mb-0 fs--1">11 hrs &bull; Consett, UK &bull; <span class="fas fa-globe-americas"></span></p>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <div class="dropdown font-sans-serif">
                        <button class="btn btn-sm dropdown-toggle p-1 dropdown-caret-none" type="button" id="post-album-action" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                        <div class="dropdown-menu dropdown-menu-end py-3" aria-labelledby="post-album-action"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item" href="#!">Report</a>
                          <div class="dropdown-divider"></div><a class="dropdown-item text-warning" href="#!">Archive</a><a class="dropdown-item text-danger" href="#!">Delete </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body overflow-hidden">
                  <p>Selamat Datang di Toko Shey Sports. Kali ini kami akan membagikan produk terbaru dengan harga yang terjangkau tentunya.</p>
                  <div class="row mx-n1">
                    <?php
                    $conn= $koneksi->query("SELECT * FROM produk ORDER BY nama_produk ASC limit 4");
                    while($data=mysqli_fetch_assoc($conn)){
                     ?>
                    <div class="col-6 p-1"><a href="../fotoproduk/<?=$data['foto']?>" data-gallery="gallery-1"><img class="img-fluid rounded" src="../fotoproduk/<?=$data['foto']?>" alt="" /></a></div>
                  <?php } ?>
                  </div>
                </div>
                <div class="card-footer bg-light pt-0">
                  <div class="border-bottom border-200 fs--1 py-3"><a class="text-700" href="#!">345 Likes</a> &bull; <a class="text-700" href="#!">34 Comments</a>
                  </div>
                  <?php
                  $conn_3= $koneksi->query("SELECT * FROM detail_beli ORDER BY tgl_beli DESC");
                  while($data_3=mysqli_fetch_assoc($conn_3)){

                    $pick_conn_2=$koneksi->query("SELECT * FROM beli WHERE kode_transaksi='$data_3[kode_transaksi]'");
                    $pecah=$pick_conn_2->fetch_assoc();

                    $rating2= $data_3['rating'];

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
                  <div class="d-flex mt-3">
                    <div class="avatar avatar-xl">
                      <div class="avatar-name rounded-circle "><span><?=substr($pecah["nama"],0,2)?></span></div>

                    </div>
                    <div class="flex-1 ms-2 fs--1">
                      <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="#!"><?=$pecah['nama']?></a> Produk <a href="detail-produk?kode=<?=$data_3['kode_produk']?>"><?=$data_3['nama_produk']?></a> <br> <?=$data_3['komentar']?> <br> , <?=$tampil_rating2?>.</p>
                      <div class="px-2"><a href="#!">Like</a>  &bull; <?=date('d F Y', strtotime($data_3['tgl_beli']));?> </div>
                    </div>
                  </div>
                <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card mb-3">
                <div class="card-body fs--1">
                  <div class="d-flex"><span class="fas fa-gift fs-0 text-warning"></span>
                    <div class="flex-1 ms-2"><a class="fw-semi-bold" href="#">Welcome To</a> Shey Sports</div>
                  </div>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">Produk Tersedia</h5><a class="fs--1" href="#!">See all</a>
                </div>
                <div class="card-body">
                  <?php
                  $conn_2= $koneksi->query("SELECT * FROM produk ORDER BY nama_produk ASC");
                  while($data_2=mysqli_fetch_assoc($conn_2)){
                   ?>
                  <div class="d-flex">
                    <div class="avatar avatar-3xl">
                      <img class="rounded-circle" src="../fotoproduk/<?=$data_2['foto']?>" alt="" />

                    </div>
                    <div class="flex-1 ms-2">
                      <h6 class="mb-0"><a href="#!"><?=implode(" ", array_slice(explode(" ", $data_2['nama_produk']), 0, 2));?></a></h6>
                      <a href="detail-produk?kode=<?=$data_2['kode_produk']?>" class="btn btn-light btn-sm py-0 mt-1 border"><span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span><span class="fs--1">Detail</span></a>
                      <div class="border-dashed-bottom my-3"></div>
                    </div>
                  </div>
                <?php } ?>
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