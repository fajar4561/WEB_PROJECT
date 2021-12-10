<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

            <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="../index.html">
              <div class="d-flex align-items-center"><img class="me-2" src="../assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">Shey Sports</span>
              </div>
            </a>
            <ul class="navbar-nav align-items-center d-none d-lg-block">
              <li class="nav-item">
                <div class="search-box" data-list='{"valueNames":["title"]}'>
                  <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                    <input class="form-control search-input fuzzy-search" type="search" placeholder="Pencarian Produk...." aria-label="Pencarian Produk" />
                    <span class="fas fa-search search-box-icon"></span>

                  </form>
                  <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none" data-bs-dismiss="search">
                    <div class="btn-close-falcon" aria-label="Close"></div>
                  </div>
                  <div class="dropdown-menu border font-base start-0 mt-2 py-0 overflow-hidden w-100">
                    <div class="scrollbar list py-3" style="max-height: 24rem;">
                      <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">Recently Browsed</h6><a class="dropdown-item fs--1 px-card py-1 hover-primary" href="../app/events/event-detail.html">
                        <div class="d-flex align-items-center">
                          <span class="fas fa-circle me-2 text-300 fs--2"></span>

                          <div class="fw-normal title">Pages <span class="fas fa-chevron-right mx-1 text-500 fs--2" data-fa-transform="shrink-2"></span> Events</div>
                        </div>
                      </a>
                      <a class="dropdown-item fs--1 px-card py-1 hover-primary" href="../app/e-commerce/customers.html">
                        <div class="d-flex align-items-center">
                          <span class="fas fa-circle me-2 text-300 fs--2"></span>

                          <div class="fw-normal title">E-commerce <span class="fas fa-chevron-right mx-1 text-500 fs--2" data-fa-transform="shrink-2"></span> Customers</div>
                        </div>
                      </a>

                      <hr class="bg-200 dark__bg-900" />
                      <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">Katagori Produk</h6>
                      <a class="dropdown-item px-card py-1 fs-0" href="../app/e-commerce/customers.html">
                        <div class="d-flex align-items-center"><span class="badge fw-medium text-decoration-none me-2 badge-soft-warning">Termurah:</span>
                          <div class="flex-1 fs--1 title">Produk dengan harga termurah</div>
                        </div>
                      </a>
                      <a class="dropdown-item px-card py-1 fs-0" href="../app/events/event-detail.html">
                        <div class="d-flex align-items-center"><span class="badge fw-medium text-decoration-none me-2 badge-soft-success">Terpopuler:</span>
                          <div class="flex-1 fs--1 title">Produk Paling diminati</div>
                        </div>
                      </a>
                      <a class="dropdown-item px-card py-1 fs-0" href="../app/e-commerce/product/product-grid.html">
                        <div class="d-flex align-items-center"><span class="badge fw-medium text-decoration-none me-2 badge-soft-info">Terlaku:</span>
                          <div class="flex-1 fs--1 title">Produk paling laris</div>
                        </div>
                      </a>

                      <hr class="bg-200 dark__bg-900" />
                      <h6 class="dropdown-header fw-medium text-uppercase px-card fs--2 pt-0 pb-2">Produk Tersedia</h6>
                      <?php
                      $conn_cari= $koneksi->query("SELECT * FROM produk ORDER BY nama_produk ASC");
                      while($data_cari=mysqli_fetch_assoc($conn_cari)){
                       ?>
                      <a class="dropdown-item px-card py-2" href="detail-produk?kode=<?=$data_cari['kode_produk']?>">
                        <div class="d-flex align-items-center">
                          <div class="file-thumbnail me-2"><img class="border h-100 w-100 fit-cover rounded-3" src="../fotoproduk/<?=$data_cari['foto']?>" alt="" /></div>
                          <div class="flex-1">
                            <h6 class="mb-0 title"><?=$data_cari['nama_produk']?></h6>
                            <p class="fs--2 mb-0 d-flex"><span class="fw-semi-bold">Harga:</span><span class="fw-medium text-600 ms-2">Rp.<?=number_format($data_cari['harga'])?></span></p>
                          </div>
                        </div>
                      </a>
                    <?php } ?>

                    </div>
                    <div class="text-center mt-n3">
                      <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
              <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                  <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label>
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label>
                </div>
              </li>
              <!-- Notifikasi keranjang belanja -->
                <?php $nomor=0; ?>
                <?php foreach ($_SESSION["keranjang"] as $id => $jml): ?>
                <?php $nomor += 1; ?>
                <?php endforeach; ?>
                <?php
                  if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) {
                    $tampil_count_notif= '<span class="fas fa-shopping-cart" data-fa-transform="shrink-6" style="font-size: 33px;"></span>';
                    $style_notif ='';
                    $pesan_notif ='Keranjang Masih kosong';
                    $link_keranjang ='';
                  }
                  else {
                    $tampil_count_notif= '<span class="fas fa-shopping-cart" data-fa-transform="shrink-6" style="font-size: 33px;"></span><span class="notification-indicator-number">'.$nomor.'</span>';
                    $style_notif ='notification-indicator notification-indicator-primary px-0 fa-icon-wait';
                    $pesan_notif ='New';
                    $link_keranjang = '<div class="card-footer text-center border-top"><a class="card-link d-block" href="keranjang">View all</a></div>';
                  }
                 ?>
              <li class="nav-item dropdown">
                <a class="nav-link <?=$style_notif?>" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$tampil_count_notif?></a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-card dropdown-menu-notification" aria-labelledby="navbarDropdownNotification">
                  <div class="card card-notification shadow-none">
                    <div class="card-header">
                      <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                          <h6 class="card-header-title mb-0">Notifikasi</h6>
                        </div>
                        <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#"></a></div>
                      </div>
                    </div>
                    <div class="scrollbar-overlay" style="max-height:19rem">
                      <div class="list-group list-group-flush fw-normal fs--1">
                        <div class="list-group-title border-bottom"><?=$pesan_notif?></div>

                        <?php foreach ($_SESSION["keranjang"] as $id => $jml): ?>
                          <?php
                          $ambil_notif = $koneksi->query("SELECT * FROM produk WHERE id='$id'");
                          $data_notif = $ambil_notif->fetch_assoc();
                        ?>
                        <div class="list-group-item">
                          <a class="notification notification-flush notification-unread" href="#!">
                            <div class="notification-avatar">
                              <div class="avatar avatar-2xl me-3">
                                <img class="rounded-circle" src="../fotoproduk/<?=$data_notif['foto']?>" alt="" />

                              </div>
                            </div>
                            <div class="notification-body">
                              <p class="mb-1"><strong><?=implode(" ", array_slice(explode(" ", $data_notif['nama_produk']), 0, 2));?></strong> <?=substr($data_notif["deskripsi"],0,100).'.....'?>"</p>
                              <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji"><?=$jml?> x</span>Rp.<?=number_format($data_notif['harga'])?></span>

                            </div>
                          </a>

                        </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <?=$link_keranjang?>
                  </div>
                </div>

              </li>
            </ul>
          </nav>