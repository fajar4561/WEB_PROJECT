<?php
$judul = 'App | Keranjang';
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
          <div class="card">
            <div class="card-header">
              <div class="row justify-content-between">
                <div class="col-md-auto">
                  <h5 class="mb-3 mb-md-0">Keranjang Belanja</h5>
                </div>
                <div class="col-md-auto"><a class="btn btn-sm btn-outline-secondary border-300 me-2" href="../../app/e-commerce/product/product-list.html"> <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4"></span>Continue Shopping</a><a class="btn btn-sm btn-primary" href="../../app/e-commerce/checkout.html">Checkout</a></div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="row gx-card mx-0 bg-200 text-900 fs--1 fw-semi-bold">
                <div class="col-9 col-md-8 py-2">Nama</div>
                <div class="col-3 col-md-4">
                  <div class="row">
                    <div class="col-md-8 py-2 d-none d-md-block text-center">Qty</div>
                    <div class="col-12 col-md-4 text-end py-2">Harga</div>
                  </div>
                </div>
              </div>
              <?php $nomor=1; ?>
              <?php $totalbelanja = 0; ?>
              <?php $jml_brg = 0;?>
              <?php foreach ($_SESSION["keranjang"] as $id => $jml): ?>
              <?php
              $ambil = $koneksi->query("SELECT * FROM produk WHERE id='$id'");
              $pecah = $ambil->fetch_assoc();
              $subharga = $pecah["harga"]*$jml;
              ?>
              <div class="row gx-card mx-0 align-items-center border-bottom border-200">
                <div class="col-8 py-3">
                  <div class="d-flex align-items-center"><a href="detail-produk?kode=<?=$pecah['kode_produk']?>"><img class="img-fluid rounded-1 me-3 d-none d-md-block" src="../fotoproduk/<?=$pecah['foto']?>" alt="" width="60" /></a>
                    <div class="flex-1">
                      <h5 class="fs-0"><a class="text-900 text-uppercase" href="detail-produk?kode=<?=$pecah['kode_produk']?>"><?=$pecah['nama_produk']?></a></h5>
                      <div class="fs--2 fs-md--1"><a class="text-danger" href="hapus-keranhang?id=<?=$pecah['id']?>" data-bs-toggle="tooltip" data-bs-placement="right" title="Hapus <?=$pecah['nama_produk']?>">Hapus</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-4 py-3">
                  <div class="row align-items-center">
                    <div class="col-md-8 d-flex justify-content-end justify-content-md-center order-1 order-md-0">
                      <form method="post" action="tambah-barang">
                        <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="minus">-</button>
                          <input class="form-control text-center px-2 input-spin-none" name="jumlah" type="number" min="1" value="<?=$jml?>" aria-label="Amount (to the nearest dollar)" style="width: 50px" />
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="plus">+</button>
                          <input type="hidden" name="id" value="<?=$pecah['id']?>">
                        </div>
                      </form>
                    </div>
                    <div class="col-md-4 text-end ps-0 order-0 order-md-1 mb-2 mb-md-0 text-600">Rp.<?=number_format($pecah['harga']).",-"?></div>
                  </div>
                </div>
              </div>
              <?php $totalbelanja+=$subharga; ?>
              <?php $jml_brg+=$jml?>
              <?php endforeach; ?>
              <div class="row fw-bold gx-card mx-0">
                <div class="col-9 col-md-8 py-2 text-end text-900">Total</div>
                <div class="col px-0">
                  <div class="row gx-card mx-0">
                    <div class="col-md-6 py-2 d-none d-md-block text-center"> <?=$jml_brg?> (items)</div>
                    <div class="col-12 col-md-6 text-end py-2">Rp.<?=number_format($totalbelanja)?></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer bg-light d-flex justify-content-end">
              <form class="me-3">
                <div class="input-group input-group-sm">
                  <input class="form-control" type="text" placeholder="Promocode" />
                  <button class="btn btn-outline-secondary border-300 btn-sm" type="submit">Apply</button>
                </div>
              </form><a class="btn btn-sm btn-primary" href="../../app/e-commerce/checkout.html">Checkout</a>
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