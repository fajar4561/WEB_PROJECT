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
                                  <div class="bg-white py-2"><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$data['id']?>">Edit</a><a class="dropdown-item text-danger" href="#!">Delete</a></div>
                                </div>
                              </div>
                            </td>
                            <!-- Modals Edit data pegawai -->
                            <div class="modal fade" id="staticBackdrop<?=$data['id']?>" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                              <div class="modal-dialog modal-lg mt-6" role="document">
                                <div class="modal-content border-0">
                                  <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body p-0">
                                    <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                                      <h4 class="mb-1" id="staticBackdropLabel">Ubah Data Pegawai</h4>
                                      <p class="fs--2 mb-0">Data <a class="link-600 fw-semi-bold" href="#!"><?=$data['nama']?></a></p>
                                    </div>
                                    <div class="p-4">
                                      <div class="row">
                                        <div class="col-lg-9">
                                          <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i></span>
                                            <div class="flex-1">
                                              <h5 class="mb-2 fs-0">Form Edit data</h5>
                                              <form>
                                                <?php
                                                $id = $data['id']; 
                                                $query_edit = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id='$id'");
                                                while ($row = mysqli_fetch_array($query_edit)) {  
                                                ?>
                                                <div class="row mt-3">
                                                  <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                      <input class="form-control form-control-sm" type="text" name="kode" value="<?=$row['kode_pegawai']?>" readonly />
                                                      <label for="floatingInput">Kode Pegawai</label>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                      <input class="form-control form-control-sm" name="nama" type="text" value="<?=$row['nama']?>" />
                                                      <label for="floatingInput">Nama Pegawai</label>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row mt-2">
                                                  <div class="col-lg-6">
                                                    <div class="mb-3">
                                                      <select class="form-select js-choice" size="1" name="kelamin" required="required" data-options='{"removeItemButton":true,"placeholder":true}' data-wizard-validate-email="true" />
                                                        <option value="<?=$row['kelamin']?>"><?=$row['kelamin']?></option>
                                                        <option value="">Pilih jenis kelamin...</option>
                                                        <option value="laki-laki">Laki-laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                      <select class="form-select js-choice" id="organizerSingle" size="1" name="agama" required="required" data-options='{"removeItemButton":true,"placeholder":true}' data-wizard-validate-email="true" />
                                                        <option value="<?=$row['agama']?>"><?=$row['agama']?></option>
                                                        <option value="">Pilih Agama...</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Khatolik">Khatolik</option>
                                                        <option value="Protestan">Protestan</option>
                                                        <option value="Hindu">Hindu </option>
                                                        <option value="Budha">Budha </option>
                                                        <option value="Konghuchu"> Konghuchu</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row mt-2">
                                                  <div class="col-lg-12">
                                                    <div class="form-floating mb-3">
                                                      <input class="form-control form-control-sm" name="alamat" type="text" value="<?=$row['alamat']?>" />
                                                      <label for="floatingInput">Alamat Pegawai</label>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row mt-2">
                                                  <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                      <input class="form-control form-control-sm" name="email" type="email" value="<?=$row['email']?>" />
                                                      <label for="floatingInput">Alamat Email</label>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                      <input class="form-control form-control-sm" name="telpon" type="text" value="<?=$row['telpon']?>" />
                                                      <label for="floatingInput">Nomor Telephone</label>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                      <input class="form-control form-control-sm" name="username" type="text" value="<?=$row['username']?>" />
                                                      <label for="floatingInput">Username</label>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                      <input class="form-control form-control-sm" name="password" type="text" value="<?=$row['password']?>" />
                                                      <label for="floatingInput">Password</label>
                                                    </div>
                                                  </div>
                                                </div>
                                              <?php } ?>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-3">
                                          <h6 class="mt-5 mt-lg-0">Detail</h6>
                                          <ul class="nav flex-lg-column fs--1">
                                            <li class="nav-item me-2 me-lg-0">
                                              <div class="row text-center">
                                                <div class="col-lg-12">
                                                  <div class="avatar avatar-3xl">
                                                  <img class="rounded-circle" src="../fotopegawai/<?=$data['foto']?>" alt="" />
                                                </div>
                                                </div>
                                              </div>
                                            </li>
                                            <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"><span class="fas fa-user me-2"></span><small><?=$data['nama']?></small></a></li>
                                            <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"><span class="fas fa-tag me-2"></span><small><?=$data['jabatan']?></small></a></li>
                                            <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"><span class="fas fa-paperclip me-2"></span><small><?=$data['email']?></small></a></li>
                                            <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"><span class="fa fa-align-left me-2"></span><small><?=$data['telpon']?></small> </a></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- End Mondals Edit pegawai -->
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