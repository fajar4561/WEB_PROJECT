<?php
$judul = 'App | Data Produk';
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
                  <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Halaman Data Produk</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                  <p class="mb-0">Halaman Berisikan tabel data produk.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3">
            <div class="card-header">
              <div class="row flex-between-end">
                <div class="col-auto align-self-center">
                  <h5 class="mb-0" data-anchor="data-anchor">Tabel Produk</h5>
                </div>
              </div>
            </div>
            <div class="card-body pt-0">
              <div class="tab-content">
                <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-55d552bf-cdbd-40f9-856d-410188578fda" id="dom-55d552bf-cdbd-40f9-856d-410188578fda">
                  <div id="tableExample2" data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                    <div class="table-responsive scrollbar">
                      <table class="table table-bordered table-striped fs--1 mb-0 table-sm">
                        <thead class="bg-200 text-900">
                          <tr>
                            <th class="sort" data-sort="name">Nama Produk</th>
                            <th class="sort" data-sort="kode">Kode Pegawai</th>
                            <th class="sort" data-sort="alamat">Katagori</th>
                            <th class="sort" data-sort="email">Harga</th>
                            <th class="sort" data-sort="telpon">Stok</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          <?php
                          $conn= $koneksi->query("SELECT * FROM produk ORDER BY nama_produk ASC");
                          $no =1;
                          while($data=mysqli_fetch_assoc($conn)){
                           ?>
                          <tr>
                            <td class="text-nowrap name">
                              <div class="d-flex align-items-center">
                                <div class="avatar avatar-xl">
                                  <img class="rounded-circle" src="../fotoproduk/<?=$data['foto']?>" alt="" />

                                </div>
                                <div class="ms-2 text-uppercase"><strong><?=$data['nama_produk']?></strong></div>
                              </div>
                            </td>
                            <td class="kode"><?=$data['kode_produk']?></td>
                            <td class="alamat"><?=$data['katagori']?></td>
                            <td class="email">Rp.<?=number_format($data['harga'])?></td>
                            <td class="telpon"><?=$data['stok']?> Pasang</td>
                            <td class="text-end">
                              <div class="dropdown font-sans-serif position-static">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-0">
                                  <div class="bg-white py-2"><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$data['id']?>">Edit</a><a class="dropdown-item text-danger" href="../aksi/hapus-produk?kode=<?=$data['kode_produk']?>&nama=<?=$data['nama_produk']?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data <?=$data['nama_produk']?>????')">Hapus</a></div>
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
                                      <h4 class="mb-1" id="staticBackdropLabel">Ubah Data Produk</h4>
                                      <p class="fs--2 mb-0">Data <a class="link-600 fw-semi-bold" href="#!"><?=$data['nama_produk']?></a></p>
                                    </div>
                                    <div class="p-4">
                                      <div class="row">
                                        <div class="col-lg-9">
                                          <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i></span>
                                            <div class="flex-1">
                                              <h5 class="mb-2 fs-0">Form Edit data</h5>
                                              <form method="post" action="../aksi/Ubah-produk" enctype="multipart/form-data">
                                                <?php
                                                $id = $data['id']; 
                                                $query_edit = mysqli_query($koneksi,"SELECT * FROM produk WHERE id='$id'");
                                                while ($row = mysqli_fetch_array($query_edit)) {  
                                                ?>
                                                <div class="row mt-3">
                                                  <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                      <input class="form-control form-control-sm" type="text" name="kode" value="<?=$row['kode_produk']?>" readonly />
                                                      <label for="floatingInput">Kode Produk</label>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                      <input class="form-control form-control-sm" name="nama" type="text" value="<?=$row['nama_produk']?>" />
                                                      <label for="floatingInput">Nama Produk</label>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row mt-2">
                                                  <div class="col-lg-12">
                                                    <div class="mb-3">
                                                      <select class="form-select" name="katagori" required>
                                                        <option value="<?=$row['katagori']?>"><?=$row['katagori']?></option>
                                                        <option value="">Pilih..</option>
                                                        <option value="Sepatu untuk lari">Sepatu untuk lari</option>
                                                        <option value="Sepatu Golf">Sepatu Golf</option>
                                                        <option value="Sepatu tenis">Sepatu tenis</option>
                                                        <option value="Sepatu basket">Sepatu basket</option>
                                                        <option value="Sepatu sepak bola">Sepatu sepak bola</option>
                                                        <option value="Sepatu Hiking">Sepatu Hiking</option>
                                                        <option value="Sepatu Climbing">Sepatu Climbing</option>
                                                        <option value="Sepatu Futsal">Sepatu Futsal</option>
                                                        <option value="lain-lain">Lain-lain</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row mt-2">
                                                  <div class="col-lg-12">
                                                    <div class="form-floating mb-3">
                                                      <textarea class="form-control" name="deskripsi" rows="5" placeholder="Deskripsi dari produk yang akan dijual" required style="white-space: pre-line;"><?=$row['deskripsi']?></textarea>
                                                      <label for="floatingInput">Deskripsi Produk</label>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row mt-2">
                                                  <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                      <input class="form-control form-control-sm" name="stok" type="number" value="<?=$row['stok']?>" />
                                                      <label for="floatingInput">Stok Produk</label>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-6">
                                                    <div class="form-floating mb-3">
                                                      <input class="form-control" type="number" name="harga" required value="<?=$row['harga']?>" />
                                                      <label for="floatingInput">Harga Produk</label>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row mt-2">
                                                  <div class="col-lg-4 text-center">
                                                    <div class="mb-3">
                                                      <div class="avatar avatar-4xl"><img class="rounded-circle" src="../fotoproduk/<?=$row['foto']?>" alt="..." id="image-preview"/></div>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-8">
                                                    <div class="mb-3">
                                                      <label class="form-label">Foto*</label>
                                                      <input type="file" class="form-control" name="foto" id="image-source" onchange="previewImage();"/>
                                                      <input type="hidden" name="foto2" value="<?=$row['foto']?>">
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row mt-2">
                                                  <div class="col-lg-6">
                                                    <button class="btn btn-falcon-primary me-1 mb-1" type="submit">
                                                      <span class="fas fa-save ms-1" data-fa-transform="shrink-3"></span> Ubah
                                                    </button>
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
                                                  <img class="rounded-circle" src="../fotoproduk/<?=$data['foto']?>" alt="" />
                                                </div>
                                                </div>
                                              </div>
                                            </li>
                                            <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"><span class="fas fa-archive me-2"></span><small><?=$data['nama_produk']?></small></a></li>
                                            <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"><span class="fas fa-tag me-2"></span><small><?=$data['katagori']?></small></a></li>
                                            <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"><span class="fas fa-calendar me-2"></span><small>Rp.<?=number_format($data['harga'])?></small></a></li>
                                            <li class="nav-item me-2 me-lg-0"><a class="nav-link nav-link-card-details" href="#!"><span class="fa fa-gift me-2"></span><small><?=$data['stok']?> Pasang</small> </a></li>
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
     <script type="text/javascript">
          function previewImage() {
        document.getElementById("image-preview").style.display = "block";
        var oFReader = new FileReader();
         oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

        oFReader.onload = function(oFREvent) {
          document.getElementById("image-preview").src = oFREvent.target.result;
        };
      };
    </script>
    
     <?php
      include '../komponen/slidebar.php';
      include '../komponen/bawah.php';

     ?>