<?php
$judul = 'App | checkout';
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
          <div class="row g-3">
            <div class="col-xl-4 order-xl-1">
              <div class="card">
                <div class="card-header bg-light btn-reveal-trigger d-flex flex-between-center">
                  <h5 class="mb-0">List Order</h5><a class="btn btn-link btn-sm btn-reveal text-600" href="../../app/e-commerce/shopping-cart.html"><span class="fas fa-pencil-alt"></span></a>
                </div>
                <div class="card-body">
                  <table class="table table-borderless fs--1 mb-0">
                    <?php $nomor=1; ?>
                    <?php $totalbelanja = 0; ?>
                    <?php $jml_brg = 0;?>
                    <?php foreach ($_SESSION["keranjang"] as $id => $jml): ?>
                    <?php
                    $ambil = $koneksi->query("SELECT * FROM produk WHERE id='$id'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah["harga"]*$jml;
                    $satuan = $subharga/1000;
                    ?>
                    <tr class="border-bottom">
                      <th class="ps-0 pt-0"><?=$pecah['nama_produk']?> x <?=$jml?>
                        <div class="text-400 fw-normal fs--2" style="white-space: pre-line;"><?=$pecah['deskripsi']?></div>
                      </th>
                      <th class="pe-0 text-end pt-0"><?=$satuan?>K</th>
                    </tr>
                    <?php $totalbelanja+=$subharga; ?>
                    <?php $jml_brg+=$jml?>
                    <?php endforeach; ?>
                  </table>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light">
                  <div class="fw-semi-bold">Total Bayar</div>
                  <div class="fw-bold">Rp.<?=number_format($totalbelanja)?></div>
                </div>
              </div>
            </div>
            <div class="col-xl-8">
              <div class="card">
                <div class="card-header bg-light">
                  <h5 class="mb-0">Form Pembeli</h5>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row gx-0 ps-2 mb-4">
                      <div class="col-sm-8 px-3">
                        <div class="mb-3">
                          <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0" for="inputNumber">Nama</label>
                          <input class="form-control" name="nama" type="text" placeholder="Nama Pembeli"  />
                        </div>
                        <div class="row align-items-center">
                          <div class="col-6">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">No Telpon</label>
                            <input class="form-control" type="text" placeholder="Whastapp / Telpon" />
                          </div>
                          <div class="col-6">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">Alamat<a class="d-inline-block" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Alamat Pembeli"><span class="fa fa-question-circle ms-2"></span></a></label>
                            <input class="form-control" type="text" placeholder="Alamat" />
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-12">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">Rating</label>
                            <select class="form-control">
                              <option><span class="fa fa-star ms-2 text-warning">1</span></option>
                            </select>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">Komentar</label>
                          <textarea class="form-control" id="basic-form-textarea" rows="3" placeholder="Description"></textarea>
                        </div>
                      </div>
                      <div class="col-4 ps-3 text-center pt-2 d-none d-sm-block">
                        <div class="rounded-1 p-2 mt-3 bg-100">
                          <div class="text-uppercase fs--2 fw-bold">We Accept</div><img src="../assets/img/icons/icon-payment-methods-grid.png" alt="" width="120" />
                        </div>
                      </div>
                    </div>
                    <div class="border-dashed-bottom my-5"></div>
                    <div class="row">
                      <div class="col-md-7 col-xl-12 col-xxl-7 px-md-3 mb-xxl-0 position-relative">
                        <div class="d-flex"><img class="me-3" src="../assets/img/icons/shield.png" alt="" width="60" height="60" />
                          <div class="flex-1">
                            <h5 class="mb-2">Buyer Protection</h5>
                            <div class="form-check mb-0">
                              <input class="form-check-input" id="protection-option-1" type="checkbox" checked="checked" />
                              <label class="form-check-label mb-0" for="protection-option-1"> <strong>Full Refund </strong>If you don't <br class="d-none d-md-block d-lg-none" />receive your order</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" id="protection-option-2" type="checkbox" checked="checked" />
                              <label class="form-check-label mb-0" for="protection-option-2"> <strong>Full or Partial Refund, </strong>If the product is not as described in details</label>
                            </div><a class="fs--1 ms-3 ps-2" href="#!">Learn More<span class="fas fa-caret-right ms-1" data-fa-transform="down-2">    </span></a>
                          </div>
                        </div>
                        <div class="vertical-line d-none d-md-block d-xl-none d-xxl-block"> </div>
                      </div>
                      <div class="col-md-5 col-xl-12 col-xxl-5 ps-lg-4 ps-xl-2 ps-xxl-5 text-center text-md-start text-xl-center text-xxl-start">
                        <div class="border-dashed-bottom d-block d-md-none d-xl-block d-xxl-none my-4"></div>
                        <div class="fs-2 fw-semi-bold">All Total: <span class="text-primary">$3320</span></div>
                        <button class="btn btn-success mt-3 px-5" type="submit">Confirm &amp; Pay</button>
                        <p class="fs--1 mt-3 mb-0">By clicking <strong>Confirm & Pay </strong>button you agree to the <a href="#!">Terms &amp; Conditions</a></p>
                      </div>
                    </div>
                  </form>
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