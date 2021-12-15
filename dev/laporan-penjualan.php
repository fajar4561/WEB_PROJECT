<?php
$judul = 'App | Laporan Penjualan';
include '../komponen/header.php';
include '../koneksi.php';
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
                  <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Halaman Cetak Laporan</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                  <p class="mb-0">Halaman Cetak Laporan Penjualan.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-12 mb-3">
              <div class="card h-lg-100 text-center">
                <div class="card-body p-4 p-sm-5">
                  <h5 class="mb-0">Cetak Laporan Penjualan Bulanan</h5><small>Silahkan Pilih Bulan Dan Tahun.</small>
                  <form class="mt-4" method="post" action="../pelanggan/cetak-laporan-bulan">
                    <select class="form-control"  name="bulan" required="">
                      <option>Silahkan Pilih Bulan</option>
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Augustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                    <div class="mb-3"></div>
                    <select class="form-control" name="tahun" required="">
                      <?php
                      $mulai= date('Y') - 50;
                      for($i = $mulai;$i<$mulai + 100;$i++){
                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                      }
                      ?>
                    </select>
                    <div class="mb-3"></div>
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Cetak Laporan</button>
                  </form><a class="fs--1 text-600" href="#!">Cetak Laporan Penjualan Bulanan<span class="d-inline-block ms-1">&rarr;</span></a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-12 mb-3">
              <div class="card h-lg-100 text-center">
                <div class="card-body p-4 p-sm-5">
                  <h5 class="mb-0">Cetak Laporan Penjualan Tahunan</h5><small>Silahkan Pilih Tahun.</small>
                  <form class="mt-4" method="post" action="../pelanggan/cetak-laporan-tahun">
                    <select class="form-control" name="tahun" required="">
                      <?php
                      $mulai= date('Y') - 50;
                      for($i = $mulai;$i<$mulai + 100;$i++){
                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                      }
                      ?>
                    </select>
                    <div class="mb-3"></div>
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Cetak Laporan</button>
                  </form><a class="fs--1 text-600" href="#!">Cetak Laporan Penjualan Tahunan<span class="d-inline-block ms-1">&rarr;</span></a>
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