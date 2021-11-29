<?php
$judul = 'App | Data Pegawai';
include '../komponen/header.php';
include '../koneksi.php';
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
                  <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Halaman Data Pegawai</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                  <p class="mb-0">Halaman Berisikan tabel data pegawai.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header">
              <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                  <h5 class="mb-0" data-anchor="data-anchor">Tabel Pegawai</h5>
                </div>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-55d552bf-cdbd-40f9-856d-410188578fda" id="dom-55d552bf-cdbd-40f9-856d-410188578fda">
                  <div id="tableExample2" data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                    <div class="table-responsive scrollbar">
                      <table class="table table-bordered table-striped fs--1 mb-0">
                        <thead class="bg-200 text-900">
                          <tr>
                            <th class="sort" data-sort="name">Nama</th>
                            <th class="sort" data-sort="kode">Kode Pegawai</th>
                            <th class="sort" data-sort="alamat">Alamat</th>
                            <th class="sort" data-sort="jabatan">Jabatan</th>
                            <th class="sort" data-sort="email">Email</th>
                            <th class="sort" data-sort="telpon">Telpon</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          <?php
                          $conn= $koneksi->query("SELECT * FROM pegawai ORDER BY nama ASC");
                          $no =1;
                          while($data=mysqli_fetch_assoc($conn)){
                           ?>
                          <tr>
                            <td class="text-nowrap name">
                              <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                  <img class="rounded-circle" src="../fotopegawai/<?=$data['foto']?>" alt="" />

                                </div>
                                <div class="ms-2 text-uppercase"><?=$data['nama']?></div>
                              </div>
                            </td>
                            <?php
                            if ($data['jabatan']=='Pimpinan') {
                              $jabatan='<span class="badge badge rounded-pill d-block p-2 badge-soft-success">Pimpinan<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>';
                            }
                            else {
                              $jabatan='<span class="badge badge rounded-pill d-block p-2 badge-soft-primary">Admin<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>';
                            }
                             ?>
                            <td class="kode"><?=$data['kode_pegawai']?></td>
                            <td class="alamat"><?=$data['alamat']?></td>
                            <td class="jabatan"><?=$jabatan?></td>
                            <td class="email"><?=$data['email']?></td>
                            <td class="telpon"><?=$data['telpon']?></td>
                            <td class="text-end">
                              <div class="dropdown font-sans-serif position-static">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-0">
                                  <div class="bg-white py-2"><a class="dropdown-item" href="#!">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a></div>
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
     <?php
      include '../komponen/slidebar.php';
      include '../komponen/bawah.php';

     ?>