<?php
$judul = 'App | Laporan tahun';
include 'komponen/header.php';
include '../koneksi.php';

include 'rupiah.php';

$tahun = $_POST['tahun'];


?>
  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid" data-layout="container-fluid">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <div class="content">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row align-items-center text-center mb-3">
                <div class="col-sm-6 text-sm-start"><img src="nota.png" alt="invoice" width="150" /></div>
                <div class="col text-sm-end mt-3 mt-sm-0">
                  <h2 class="mb-3">Laporan Penjualan</h2>
                  <h5>Periode <?=$tahun?></h5>
                  <p class="fs--1 mb-0">Toko Shey Sports<br />Jalan Lingkar Sumberagung, Weleri</p>
                </div>
                <div class="col-12">
                  <hr />
                </div>
              </div>
              <div class="table-responsive scrollbar mt-4 fs--1">
                <table class="table table-striped border-bottom">
                  <thead class="light">
                    <tr class="bg-primary text-white dark__bg-1000">
                      <th class="border-0">Tgl Beli</th>
                      <th class="border-0 text-center">kode Produk</th>
                      <th class="border-0">Nama</th>
                      <th class="border-0">Harga</th>
                      <th class="border-0">Jumlah</th>                    
                      <th class="border-0 text-end">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $ambil_data = $koneksi->query("SELECT * FROM detail_beli WHERE YEAR(tgl_beli) = '$tahun' ");
                    $no = 1;                
                    while ($data = mysqli_fetch_assoc($ambil_data)) {
                     ?>
                    <tr>
                      <td class="align-middle"><?=date('d F Y', strtotime($data['tgl_beli']));?></td>
                      <td class="align-middle text-center"><?=$data['kode_produk']?></td>
                      <td class="align-middle"><?=$data['nama_produk']?></td>
                      <td class="align-middle">Rp.<?=number_format($data['harga'])?></td>
                      <td class="align-middle text-center"><?=$data['jumlah']?></td>                      
                      <td class="align-middle text-end">Rp.<?=number_format($data['total'])?></td>
                      
                    </tr>
                    <?php $tot+= $data['total']?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="row justify-content-end">
                <div class="col-auto">
                  <table class="table table-sm table-borderless fs--1 text-end">
                    <tr class="border-top border-top-2 fw-bolder text-900">
                      <th>GrandTotal:</th>
                      <td>Rp.<?=number_format($tot)?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>
    </main>
    <script>
        window.print();
    </script>                 
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <?php include 'komponen/footer.php';?>