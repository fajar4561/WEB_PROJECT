<?php
$judul = 'App | checkout';
include 'komponen/header.php';
include '../koneksi.php';
session_start();
$today= date('Y-m-d');

$penyebut = date('dmY');
$quer = mysqli_query($koneksi, "SELECT max(kode_transaksi) as kodeTerbesar FROM beli ");
$dat = mysqli_fetch_array($quer);
$kodeTransaksi = $dat['kodeTerbesar'];
$urutan = (int) substr($kodeTransaksi, 9, 3);
$urutan++;
$huruf='A';
$kodeTransaksi = $huruf. $penyebut. sprintf("%03s", $urutan);

include 'rupiah.php';

$kode = $_GET['kode'];
$ambil=$koneksi->query("SELECT * FROM beli WHERE kode_transaksi='$kode'");
$pecah=$ambil->fetch_assoc(); 
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
                  <h2 class="mb-3">Nota</h2>
                  <h5>Shey Sports Shop</h5>
                  <p class="fs--1 mb-0">156 University Ave, Toronto<br />On, Canada, M5H 2H7</p>
                </div>
                <div class="col-12">
                  <hr />
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-500">Invoice to</h6>
                  <h5><?=$pecah['nama']?></h5>
                  <p class="fs--1">Alamat : <?=$pecah['alamat']?><br />No Telephon : <?=$pecah['telpon']?><br /></p>
                </div>
                <div class="col-sm-auto ms-auto">
                  <div class="table-responsive">
                    <table class="table table-sm table-borderless fs--1">
                      <tbody>
                        <tr>
                          <th class="text-sm-end">No Nota:</th>
                          <td><?=$pecah['id']?></td>
                        </tr>
                        <tr>
                          <th class="text-sm-end">No Order:</th>
                          <td><?=$pecah['kode_transaksi']?></td>
                        </tr>
                        <tr>
                          <th class="text-sm-end">Tanggal Beli:</th>
                          <td><?=date('d F Y', strtotime($pecah['tgl_beli']));?></td>
                        </tr>
                        <tr class="alert-success fw-bold">
                          <th class="text-sm-end">Total Belanja:</th>
                          <td>Rp.<?=number_format($pecah['total'])?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="table-responsive scrollbar mt-4 fs--1">
                <table class="table table-striped border-bottom">
                  <thead class="light">
                    <tr class="bg-primary text-white dark__bg-1000">
                      <th class="border-0">Produk</th>
                      <th class="border-0 text-center">Qtyy</th>
                      <th class="border-0 text-end">Harga</th>
                      <th class="border-0 text-end">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $ambildata = $koneksi->query("SELECT * FROM detail_beli INNER JOIN produk ON produk.kode_produk=detail_beli.kode_produk WHERE kode_transaksi ='$kode' ORDER BY total DESC ");
                    $no = 1;
                    $total = 0;
                    while ($data = mysqli_fetch_assoc($ambildata)) {
                     ?>
                    <tr>
                      <td class="align-middle">
                        <h6 class="mb-0 text-nowrap"><?=$data['nama_produk']?></h6>
                        <p class="mb-0"><?=$data['deskripsi']?></p>
                      </td>
                      <td class="align-middle text-center"><?=$data['jumlah']?></td>
                      <td class="align-middle text-end">Rp.<?=number_format($data['harga'])?></td>
                      <td class="align-middle text-end">Rp.<?=number_format($data['total'])?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="row justify-content-end">
                <div class="col-auto">
                  <table class="table table-sm table-borderless fs--1 text-end">
                    <tr class="border-top border-top-2 fw-bolder text-900">
                      <th>Total Bayar:</th>
                      <td>Rp.<?=number_format($pecah['total'])?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="card-footer bg-light">
              <p class="fs--1 mb-0"><strong>Notes: </strong>We really appreciate your business and if there’s anything else we can do, please let us know!</p>
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