<?php
$judul = 'App | Data Produk terjual';
include '../komponen/header.php';
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
         <!--Navbar -->
        <?php include '../komponen/navbar.php';?>
        <!--End Navbar -->
        <div class="content">
          <!--Topbar -->
          <?php include '../komponen/topbar.php';?>
          <!--End Topbar -->
          <div class="row mt-5 mt-lg-0 mt-xl-5 mt-xxl-0">
            <div class="col-lg-6 col-xl-12 col-xxl-6 h-100">
              <div class="d-flex mb-4"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-spinner"></i></span>
                <div class="col">
                  <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Halaman Data transaksi</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                  <p class="mb-0">Halaman Berisikan tabel transaksi penjualan produk.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header">
              <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                  <h5 class="mb-0" data-anchor="data-anchor">Tabel Transaksi Penjualan Produk</h5>
                </div>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-55d552bf-cdbd-40f9-856d-410188578fda" id="dom-55d552bf-cdbd-40f9-856d-410188578fda">
                  <div id="tableExample2" data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                    <div class="table-responsive scrollbar">
                      <table class="table table-bordered table-striped fs--1 mb-0 table-sm">
                        <thead class="bg-200 text-900">
                          <tr>
                            <th class="sort" data-sort="name">Pembeli</th>
                            <th class="sort" data-sort="kode">Tgl Beli</th>
                            <th class="sort" data-sort="alamat">Kode Transaksi</th>
                            <th class="sort" data-sort="email">Alamat</th>
                            <th class="sort" data-sort="telpon">Telpon</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          <?php
                          $conn= $koneksi->query("SELECT * FROM beli ORDER BY tgl_beli DESC");
                          $no =1;
                          while($data=mysqli_fetch_assoc($conn)){
                           ?>
                          <tr>
                            <td class="kode text-uppercase"><?=$data['nama']?></td>
                            <td class="alamat"><?=date('d F Y', strtotime($data['tgl_beli']));?></td>
                            <td class="email"><?=$data['kode_transaksi']?></td>
                            <td class="telpon"><?=$data['alamat']?></td>
                            <td class="telpon"><?=$data['telpon']?></td>
                            <td class="text-end">
                              <div class="dropdown font-sans-serif position-static">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-0">
                                  <div class="bg-white py-2">
                                    <a class="dropdown-item" href="../pelanggan/cetak-nota?kode=<?=$data['kode_transaksi']?>">Cetak</a>
                                  </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                      <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                      <ul class="pagination mb-0"></ul>
                      <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next" data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php include '../komponen/footer.php';?>
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
     <script type="text/javascript">
          function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

        oFReader.onload = function(oFREvent) {
          document.getElementById("image-preview").src = oFREvent.target.result;
        };
      };
    </script>
    
     <?php
      include '../komponen/slidebar.php';
      include '../komponen/bawah.php';

     ?>