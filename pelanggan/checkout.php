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

 if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{

echo "<script>alert('keranjang kosong!!! silahkan lakukan pemesanan terlebih dahulu');</script>";
echo "<script>location='produk';</script>";

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
          <div class="row g-3">
            <div class="col-xl-4 order-xl-1">
              <div class="card">
                <div class="card-header bg-light btn-reveal-trigger d-flex flex-between-center">
                  <h5 class="mb-0">List Order <small class="text-primary"><?=$kodeTransaksi?></small></h5><a class="btn btn-link btn-sm btn-reveal text-600" href="../../app/e-commerce/shopping-cart.html"><span class="fas fa-pencil-alt"></span></a>
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
                      <th class="pe-0 text-end pt-0 text-warning"><?=$satuan?>K</th>
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
                  <form class="needs-validation" novalidate="" method="post" action="aksi/beli">
                    <div class="row gx-0 ps-2 mb-4">
                      <div class="col-sm-8 px-3">
                        <div class="row mb-3">
                          <div class="col-6">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0" >Kode Transaksi</label>
                            <input class="form-control" name="kode" type="text" placeholder="Kode Transaksi" value="<?=$kodeTransaksi?>"  readonly/>
                          </div>
                          <div class="col-6">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">Tanggal</label>
                            <input class="form-control" name="tgl" type="date" value="<?=$today?>" />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0" for="inputNumber">Nama</label>
                          <input class="form-control" name="nama" type="text"  placeholder="Nama Pembeli" required="" />
                          <div class="invalid-feedback mt-0">Pastikan Anda mengisi form nama.</div>
                        </div>
                        <div class="row align-items-center">
                          <div class="col-6">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">No Telpon</label>
                            <input class="form-control" type="text" name="telpon" placeholder="Whastapp / Telpon" required />
                            <div class="invalid-feedback mt-0">Silahkan isi no telephon.</div>
                          </div>
                          <div class="col-6">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">Alamat<a class="d-inline-block" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Alamat Pembeli"><span class="fa fa-question-circle ms-2"></span></a></label>
                            <input class="form-control" type="text" name="alamat"  placeholder="Alamat Pembeli" required />
                            <div class="invalid-feedback mt-0">Pastikan Anda mengisi alamat.</div>
                            <input type="hidden" name="total" value="<?=$totalbelanja?>">
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-12">
                            <div class="rounded-1 p-2 bg-100">
                              <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0 text-left">Rating<a class="d-inline-block" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Silagkan Beri Rating Mengenai produk / layanan kami"><span class="fa fa-question-circle ms-2"></span></a></label><br>
                              <small>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" id="flexRadioDefault1" type="radio" name="rating" value="1" />
                                  <label class="form-check-label" for="flexRadioDefault1">1<span class="fa fa-star ms-2 text-warning"></span></label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" id="flexRadioDefault2" type="radio" name="rating" value="2" />
                                  <label class="form-check-label" for="flexRadioDefault2">2<span class="fa fa-star ms-2 text-warning"></span></label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" id="flexRadioDefault3" type="radio" name="rating" value="3"  />
                                  <label class="form-check-label" for="flexRadioDefault3">3<span class="fa fa-star ms-2 text-warning"></span></label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" id="flexRadioDefault4" type="radio" name="rating" value="4" />
                                  <label class="form-check-label" for="flexRadioDefault4">4<span class="fa fa-star ms-2 text-warning"></span></label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" id="flexRadioDefault5" type="radio" name="rating" value="5" checked="" />
                                  <label class="form-check-label" for="flexRadioDefault5">5<span class="fa fa-star ms-2 text-warning"></span></label>
                                </div>
                              </small>
                            </div>
                          </div>
                        </div>
                        <div class="row align-items-center mt-4">
                          <div class="col-12">
                            <label class="form-label ls text-uppercase text-600 fw-semi-bold mb-0">Komentar<a class="d-inline-block" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Kritik dan saran anda mengenai produk / layanan kami"><span class="fa fa-question-circle ms-2"></span></a></label>
                            <textarea class="form-control" id="basic-form-textarea" name="komentar" rows="3" placeholder="Description" required></textarea>
                            <div class="invalid-feedback mt-0">Silahkan Isi Komentar.</div>
                          </div>
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
                            <h5 class="mb-2">Terms & Conditions</h5>
                            <div class="form-check mb-0">
                              <input class="form-check-input" id="protection-option-1" type="checkbox" required />
                              <label class="form-check-label mb-0" for="protection-option-1"> <strong>Check Barang </strong>Pastikan Anda <br class="d-none d-md-block d-lg-none" />Mengechek barang yang anda beli</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" id="protection-option-2" type="checkbox" required />
                              <label class="form-check-label mb-0" for="protection-option-2"> <strong>Hubungi Penjual, </strong>Apabila nanti barang tidak sesuai atau salah dalam proses pengiriman</label>
                            </div><a class="fs--1 ms-3 ps-2" href="#!">Pelajari Selengkapnya<span class="fas fa-caret-right ms-1" data-fa-transform="down-2">    </span></a>
                          </div>
                        </div>
                        <div class="vertical-line d-none d-md-block d-xl-none d-xxl-block"> </div>
                      </div>
                      <div class="col-md-5 col-xl-12 col-xxl-5 ps-lg-4 ps-xl-2 ps-xxl-5 text-center text-md-start text-xl-center text-xxl-start">
                        <div class="border-dashed-bottom d-block d-md-none d-xl-block d-xxl-none my-4"></div>
                        <div class="fs-2 fw-semi-bold">Total: <span class="text-primary">Rp.<?=number_format($totalbelanja)?></span></div>
                        <p class="fs--1 mt-0 mb-0">(<?=terbilang($totalbelanja)?>)</p>
                        <button class="btn btn-success mt-3 px-5" type="submit">Setuju &amp; Bayar</button>
                        <p class="fs--1 mt-3 mb-0">By clicking <strong>Setuju & Bayar </strong>button you agree to the <a href="#!">Terms &amp; Conditions</a></p>
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