<?php
$judul = 'App | Beranda';
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
        <?php include '../komponen/navbar.php';?>
        <div class="content">
          <?php include '../komponen/topbar.php';?>
          <div class="row g-3 mb-3">
            <div class="col-sm-12 col-md-12">
              <div class="card mb-3">
                <div class="card-header position-relative min-vh-25 mb-7">
                  <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(../assets/img/generic/4.jpg);">
                  </div>
                  <!--/.bg-holder-->

                  <div class="avatar avatar-5xl avatar-profile"><img class="rounded-circle img-thumbnail shadow-sm" src="../assets/img/team/2.jpg" width="200" alt="" /></div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-8">
                      <h4 class="mb-1"> Anthony Hopkins<span data-bs-toggle="tooltip" data-bs-placement="right" title="Verified"><small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small></span>
                      </h4>
                      <h5 class="fs-0 fw-normal">Senior Software Engineer at Technext Limited</h5>
                      <p class="text-500">New York, USA</p>
                      <button class="btn btn-falcon-primary btn-sm px-3" type="button">Following</button>
                      <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Message</button>
                      <div class="border-dashed-bottom my-4 d-lg-none"></div>
                    </div>
                    <div class="col ps-2 ps-lg-3"><a class="d-flex align-items-center mb-2" href="#"><span class="fas fa-user-circle fs-3 me-2 text-700" data-fa-transform="grow-2"></span>
                      <div class="flex-1">
                        <h6 class="mb-0">See followers (330)</h6>
                      </div>
                    </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="../assets/img/logos/g.png" alt="Generic placeholder image" width="30" />
                      <div class="flex-1">
                        <h6 class="mb-0">Google</h6>
                      </div>
                    </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="../assets/img/logos/apple.png" alt="Generic placeholder image" width="30" />
                      <div class="flex-1">
                        <h6 class="mb-0">Apple</h6>
                      </div>
                    </a><a class="d-flex align-items-center mb-2" href="#"><img class="align-self-center me-2" src="../assets/img/logos/hp.png" alt="Generic placeholder image" width="30" />
                      <div class="flex-1">
                        <h6 class="mb-0">Hewlett Packard</h6>
                      </div>
                    </a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row g-3 mb-3">
            <div class="col-xxl-6 col-xl-12">
              <div class="row g-3">
                <div class="col-12">
                  <div class="card bg-transparent-50 overflow-hidden">
                    <div class="card-header position-relative">
                      <div class="bg-holder d-none d-md-block bg-card z-index-1" style="background-image:url(../assets/img/illustrations/ecommerce-bg.png);background-size:230px;background-position:right bottom;z-index:-1;">
                      </div>
                      <!--/.bg-holder-->
                       <?php
                       // Mencari data produk Terjual
                            $conn_terjual =mysqli_query($koneksi,"SELECT * FROM detail_beli WHERE tgl_beli= CURDATE() ");
                            while ($dta_jual=mysqli_fetch_array($conn_terjual))
                            {
                              $array_terjual[] = $dta_jual['jumlah'];
                              $array_pendapatan[] = $dta_jual['total'];
                            }
                            $total_produk_terjual = array_sum($array_terjual);
                            $total_pendapatan = array_sum($array_pendapatan);

                            if (empty($total_produk_terjual) OR !isset($total_produk_terjual)) {
                              $jml_total_produk_terjual = 0;
                              $jml_total_pendapatan = 0;
                            }
                            else {
                              $jml_total_pendapatan = $total_pendapatan;
                              $jml_total_produk_terjual = $total_produk_terjual;
                            }
                        ?>
                      <div class="position-relative z-index-2">
                        <div>
                          <h3 class="text-primary mb-1">Good Afternoon, Jonathan!</h3>
                          <p>Here’s what happening with your store today </p>
                        </div>
                        <div class="d-flex py-3">
                          <div class="pe-3">
                            <p class="text-600 fs--1 fw-medium">Produk Terjual Hari ini </p>
                            <h4 class="text-800 mb-0"><?=$jml_total_produk_terjual?> <small><span class="badge rounded-pill badge-soft-primary">Produk</span></small></h4>
                          </div>
                          <div class="ps-3">
                            <p class="text-600 fs--1">Pendapatan Hari ini </p>
                            <h4 class="text-800 mb-0">Rp.<?=number_format($jml_total_pendapatan)?> </h4>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                    // other information
                    $conn_1 =mysqli_query($koneksi,"SELECT * FROM produk ");
                            while ($dta_1=mysqli_fetch_array($conn_1))
                        {
                          $array_stok_produk[] = $dta_1['stok'];
                        }
                        $jml_stok_produk = array_sum($array_stok_produk);

                        $conn_2=mysqli_query($koneksi,"SELECT * FROM beli");
                        $jml_transaksi = mysqli_num_rows($conn_2);

                        $conn_terjual2 =mysqli_query($koneksi,"SELECT * FROM detail_beli ");
                        while ($dta_jual2=mysqli_fetch_array($conn_terjual2))
                        {                          
                          $array_pendapatan2[] = $dta_jual2['total'];
                        }
                        $total_pendapatan2 = array_sum($array_pendapatan2);

                     ?>
                    <div class="card-body p-0">
                      <ul class="mb-0 list-unstyled">
                        <li class="alert mb-0 rounded-0 py-3 px-card alert-warning border-x-0 border-top-0">
                          <div class="row flex-between-center">
                            <div class="col">
                              <div class="d-flex">
                                <div class="fas fa-circle mt-1 fs--2"></div>
                                <p class="fs--1 ps-2 mb-0"><strong><?=$jml_stok_produk?> Stok produk</strong> tersedia di toko Shey Sports</p>
                              </div>
                            </div>
                            <div class="col-auto d-flex align-items-center"><a class="alert-link fs--1 fw-medium" href="data-produk">Lihat Produk<i class="fas fa-chevron-right ms-1 fs--2"></i></a></div>
                          </div>
                        </li>
                        <li class="alert mb-0 rounded-0 py-3 px-card greetings-item border-top border-x-0 border-top-0">
                          <div class="row flex-between-center">
                            <div class="col">
                              <div class="d-flex">
                                <div class="fas fa-circle mt-1 fs--2 text-primary"></div>
                                <p class="fs--1 ps-2 mb-0"><strong><?=$jml_transaksi?> order</strong> Transaksi Penjualan Produk</p>
                              </div>
                            </div>
                            <div class="col-auto d-flex align-items-center"><a class="alert-link fs--1 fw-medium" href="#!">Lihat Semua Transaksi<i class="fas fa-chevron-right ms-1 fs--2"></i></a></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row g-3 mb-3">
            <div class="col-sm-6 col-md-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-1.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                  <h6>Total Pembeli</h6>
                  <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning" data-countup='{"endValue":<?=$jml_transaksi?>,"suffix":" Orang"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="#!">See all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-2.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                  <h6>Total Pendapatan</h6>
                  <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info" data-countup='{"endValue":<?=$total_pendapatan2?>,"prefix":"Rp."}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="#!">All orders<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(../assets/img/icons/spot-illustrations/corner-3.png);">
                </div>
                <!--/.bg-holder-->

                <div class="card-body position-relative">
                  <h6>Total Stok Produk</h6>
                  <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif" data-countup='{"endValue":<?=$jml_stok_produk?>,"suffix":" Barang"}'>0</div><a class="fw-semi-bold fs--1 text-nowrap" href="#!">Statistics<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="row g-3 mb-3">
            <div class="col-xxl-9 col-md-12">
              <div class="card z-index-1" id="recentPurchaseTable" data-list='{"valueNames":["name","email","product","payment","amount"],"page":7,"pagination":true}'>
                <div class="card-header">
                  <div class="row flex-between-center">
                    <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                      <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Transaksi Pembelian Terakhir</h5>
                    </div>
                    <div class="col-6 col-sm-auto ms-auto text-end ps-0">
                      <div class="d-none" id="table-purchases-actions">
                        <div class="d-flex">
                          <select class="form-select form-select-sm" aria-label="Bulk actions">
                            <option selected="">Bulk actions</option>
                            <option value="Refund">Refund</option>
                            <option value="Delete">Delete</option>
                            <option value="Archive">Archive</option>
                          </select>
                          <button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button>
                        </div>
                      </div>
                      <div id="table-purchases-replace-element">
                        <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">New</span></button>
                        <button class="btn btn-falcon-default btn-sm mx-2" type="button"><span class="fas fa-filter" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Filter</span></button>
                        <button class="btn btn-falcon-default btn-sm" type="button"><span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span><span class="d-none d-sm-inline-block ms-1">Export</span></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body px-0 py-0">
                  <div class="table-responsive scrollbar">
                    <table class="table table-sm fs--1 mb-0 overflow-hidden">
                      <thead class="bg-200 text-900">
                        <tr>
                          <th class="white-space-nowrap">
                            <div class="form-check mb-0 d-flex align-items-center">
                              <input class="form-check-input" id="checkbox-bulk-purchases-select" type="checkbox" data-bulk-select='{"body":"table-purchase-body","actions":"table-purchases-actions","replacedElement":"table-purchases-replace-element"}' />
                            </div>
                          </th>
                          <th class="sort pe-1 align-middle white-space-nowrap" data-sort="name">Pembeli</th>
                          <th class="sort pe-1 align-middle white-space-nowrap" data-sort="email">Tgl Beli</th>
                          <th class="sort pe-1 align-middle white-space-nowrap" data-sort="product">Alamat</th>
                          <th class="sort pe-1 align-middle white-space-nowrap text-center" data-sort="payment">Telpon</th>
                          <th class="sort pe-1 align-middle white-space-nowrap text-end" data-sort="amount">Total</th>
                          <th class="no-sort pe-1 align-middle data-table-row-action"></th>
                        </tr>
                      </thead>
                      <tbody class="list" id="table-purchase-body">
                        <?php
                        $conn= $koneksi->query("SELECT * FROM beli ORDER BY tgl_beli DESC");
                        $no =1;
                        while($data=mysqli_fetch_assoc($conn)){
                         ?>
                        <tr class="btn-reveal-trigger">
                          <td class="align-middle" style="width: 28px;">
                            <div class="form-check mb-0">
                              <input class="form-check-input" type="checkbox" id="recent-purchase-0" data-bulk-select-row="data-bulk-select-row" />
                            </div>
                          </td>
                          <th class="align-middle white-space-nowrap name"><a href="../pelanggan/cetak-nota?kode=<?=$data['kode_transaksi']?>"><?=$data['nama']?></a></th>
                          <td class="align-middle white-space-nowrap email"><?=date('d F Y', strtotime($data['tgl_beli']));?></td>
                          <td class="align-middle white-space-nowrap product"><?=$data['alamat']?></td>
                          <td class="align-middle text-center fs-0 white-space-nowrap payment"><span class="badge badge rounded-pill badge-soft-success"><?=$data['telpon']?><span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                          </td>
                          <td class="align-middle text-end amount">Rp.<?=number_format($data['total'])?></td>
                          <td class="align-middle white-space-nowrap text-end">
                            <div class="dropstart font-sans-serif position-static d-inline-block">
                              <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end" type="button" id="dropdown0" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--1"></span></button>
                              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown0"><a class="dropdown-item" href="../pelanggan/cetak-nota?kode=<?=$data['kode_transaksi']?>">Cetak</a><a class="dropdown-item" href="#!">Edit</a>
                              </div>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row align-items-center">
                    <div class="pagination d-none"></div>
                    <div class="col">
                      <p class="mb-0 fs--1"><span class="d-none d-sm-inline-block me-2" data-list-info="data-list-info"> </span>
                      </p>
                    </div>
                    <div class="col-auto d-flex">
                      <button class="btn btn-sm btn-primary" type="button" data-list-pagination="prev"><span>Previous</span></button>
                      <button class="btn btn-sm btn-primary px-4 ms-2" type="button" data-list-pagination="next"><span>Next</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="card h-lg-100 overflow-hidden">
                <div class="card-body p-0">
                  <div class="table-responsive scrollbar">
                    <table class="table table-dashboard mb-0 table-borderless fs--1 border-200">
                      <thead class="bg-light">
                        <tr class="text-900">
                          <th>Data Produk penjualan</th>
                          <th class="text-center">Stok Produk</th>
                          <th class="text-center">Harga</th>
                          <th class="text-end">Terjual</th>
                          <th class="pe-card text-end" style="width: 8rem">Rating</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $conn_3= $koneksi->query("SELECT * FROM produk ORDER BY nama_produk ASC");
                        while($data_2=mysqli_fetch_assoc($conn_3)){

                          $pemasukan=mysqli_query($koneksi,"SELECT * FROM detail_beli WHERE kode_produk='$data_2[kode_produk]'");
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
                        <tr class="border-bottom border-200">
                          <td>
                            <div class="d-flex align-items-center position-relative"><img class="rounded-1 border border-200" src="../fotoproduk/<?=$data_2['foto']?>" width="60" alt="" />
                              <div class="flex-1 ms-3">
                                <h6 class="mb-1 fw-semi-bold text-nowrap"><a class="text-900 stretched-link" href="#!"><?=$data_2['nama_produk']?></a></h6>
                                <p class="fw-semi-bold mb-0 text-500"><?=$data_2['katagori']?></p>
                              </div>
                            </div>
                          </td>
                          <td class="align-middle text-center fw-semi-bold"><?=$data_2['stok']?></td>
                          <td class="align-middle text-center fw-semi-bold">Rp.<?=number_format($data_2['harga'])?></td>
                          <td class="align-middle text-end fw-semi-bold"><?=$jumlahterjual?></td>
                          <td class="align-middle pe-card">
                            <div class="d-flex align-items-center">
                              <?=$tampil_rating?>
                            </div>
                          </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer bg-light py-2">
                  <div class="row flex-between-center">
                    <div class="col-auto">
                      <select class="form-select form-select-sm">
                        <option>Last 7 days</option>
                        <option>Last Month</option>
                        <option>Last Year</option>
                      </select>
                    </div>
                    <div class="col-auto"><a class="btn btn-sm btn-falcon-default" href="#!">View All</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php include '../komponen/footer.php';?>
        </div>
      </div>
    </main>

  <?php
      include '../komponen/slidebar.php';
      include '../komponen/bawah.php';

     ?>