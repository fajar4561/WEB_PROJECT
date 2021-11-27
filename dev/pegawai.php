<?php
$judul = 'App | Input Data Pegawai';
include '../komponen/header.php';
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
                  <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Input Data Pegawai</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                  <p class="mb-0">Pastikan Anda mengisi form dengan benar.</p>
                </div>
              </div>
              <div class="card theme-wizard mb-5">
                <div class="card-header bg-light pt-3 pb-2">
                  <ul class="nav justify-content-between nav-wizard">
                    <li class="nav-item"><a class="nav-link active fw-semi-bold" href="#bootstrap-wizard-tab1" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-lock"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Informasi Diri</span></a></li>
                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-tab2" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-user"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Akun</span></a></li>
                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-tab4" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><span class="fas fa-thumbs-up"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Done</span></a></li>
                  </ul>
                </div>
                <div class="card-body py-4">
                  <div class="tab-content">
                    <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab1" id="bootstrap-wizard-tab1">
                      <form novalidate="novalidate">
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-wizard-name">Nama*</label>
                          <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap Pegawai" required="required" />
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <label class="form-label">Jenis Kelamin*</label>
                            <select class="form-select js-choice" size="1" name="kelamin" required="required" data-options='{"removeItemButton":true,"placeholder":true}' data-wizard-validate-email="true" />
                              <option value="">Pilih jenis kelamin...</option>
                              <option value="laki-laki">Laki-laki</option>
                              <option value="perempuan">Perempuan</option>
                            </select>
                            <div class="invalid-feedback">You must add email</div>
                          </div>
                          <div class="col-6">
                            <label class="form-label">Agama*</label>
                            <select class="form-select js-choice" id="organizerSingle" size="1" name="agama" required="required" data-options='{"removeItemButton":true,"placeholder":true}' data-wizard-validate-email="true" />
                              <option value="">Pilih Agama...</option>
                              <option value="Islam">Islam</option>
                              <option value="Khatolik">Khatolik</option>
                              <option value="Protestan">Protestan</option>
                              <option value="Hindu">Hindu </option>
                              <option value="Budha">Budha </option>
                              <option value="Konghuchu"> Konghuchu</option>
                            </select>
                            <div class="invalid-feedback">You must add email</div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-wizard-email">Alamat*</label>
                          <input class="form-control" type="text" name="alamat" placeholder="Alamat Tempat Tinggal Pegawai" required="required" />
                        </div>
                    </div>
                    <div class="tab-pane px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab2" id="bootstrap-wizard-tab2">
                      <form>
                        <div class="mb-3">
                          <div class="row" data-dropzone="data-dropzone" data-options='{"maxFiles":1,"data":[{"name":"avatar.png","size":"54kb","url":"../assets/img/team"}]}'>
                            <div class="fallback">
                              <input type="file" name="file" />
                            </div>
                            <div class="col-md-auto">
                              <div class="dz-preview dz-preview-single">
                                <div class="dz-preview-cover d-flex align-items-center justify-content-center mb-3 mb-md-0">
                                  <div class="avatar avatar-4xl"><img class="rounded-circle" src="../assets/img/team/avatar.png" alt="..." data-dz-thumbnail="data-dz-thumbnail" /></div>
                                  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md">
                              <div class="dz-message dropzone-area px-2 py-3" data-dz-message="data-dz-message">
                                <div class="text-center"><img class="me-2" src="../assets/img/icons/cloud-upload.svg" width="25" alt="" />Upload foto profil pegawai
                                  <p class="mb-0 fs--1 text-400">Upload foto ukuran 300x300 dengan format jpg <br />Maksimal ukuran foto adalah 400KB</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-gender">Jabatan*</label>
                          <select class="form-select" name="jabatan" required>
                            <option value="">Pilih Jabatan Pegawai ...</option>
                            <option value="Admin">Admin</option>
                            <option value="Pimpinan">Pimpinan</option>
                          </select>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <label class="form-label" for="bootstrap-wizard-wizard-email">Email*</label>
                            <input class="form-control" type="email" name="email" placeholder="Alamat Email Pegawai" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required" id="bootstrap-wizard-wizard-email" data-wizard-validate-email="true" />
                          </div>
                          <div class="col-6">
                            <label class="form-label" for="bootstrap-wizard-wizard-email">No Telephone*</label>
                            <input class="form-control" type="text" name="telpon" placeholder="Nomor Telephone / Whatsapp Pegawai" required />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-wizard-email">Username*</label>
                          <input class="form-control" type="text" name="username" placeholder="Username untuk login ke sistem" required />
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-wizard-email">Password*</label>
                          <input class="form-control" type="text" name="password" placeholder="Password untuk login ke sistem" required />
                        </div>
                    </div>
                    <div class="tab-pane text-center px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-tab4" id="bootstrap-wizard-tab4">
                      <div class="wizard-lottie-wrapper">
                        <div class="lottie wizard-lottie mx-auto my-3" data-options='{"path":"../../assets/img/animated-icons/celebration.json"}'></div>
                      </div>
                      <h4 class="mb-1">Pastikan form telah terisi sepenuhnya !</h4>
                      <p>Sekarang tekan tombol Proses untuk menyimpan data pegawai</p><button type="submit" class="btn btn-primary px-5 my-3">Proses</button>
                    </form>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-light">
                  <div class="px-sm-3 px-md-5">
                    <ul class="pager wizard list-inline mb-0">
                      <li class="previous">
                        <button class="btn btn-link ps-0" type="button"><span class="fas fa-chevron-left me-2" data-fa-transform="shrink-3"></span>Sebelumnya</button>
                      </li>
                      <li class="next">
                        <button class="btn btn-primary px-5 px-sm-6" type="submit">Berikutnya<span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"> </span></button>
                      </li>
                    </ul>
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


    


    <?php
      include '../komponen/slidebar.php';
      include '../komponen/bawah.php';

     ?>