<?php
$judul = 'App | Input Data Produk';
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
                  <h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Input Data Produk</span><span class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
                  <p class="mb-0">Pastikan Anda mengisi form dengan benar.</p>
                </div>
              </div>
              <div class="card mb-3">
                <div class="card-header">
                  <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                      <h5 class="mb-0" data-anchor="data-anchor">Form Produk</h5>
                      <p class="mb-0 mt-2 mb-0">form ini berisikan data produk yang nantinya akan dijual.</p>
                    </div>
                  </div>
                </div>
                <div class="card-body bg-light">
                  <div class="tab-content">
                    <div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-f1d388f8-6223-48cd-b720-917f0290eedd" id="dom-f1d388f8-6223-48cd-b720-917f0290eedd">
                      <form class="row g-3">
                        <div class="col-md-6">
                          <label class="form-label" >Kode Produk</label>
                          <input class="form-control" type="text" name="kode" readonly />
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" >Nama Produk</label>
                          <input class="form-control" type="text" name="nama" placeholder="Nama Produk yang akan dijual" required />
                        </div>
                        <div class="col-md-12">
                          <label class="form-label">Katagori Produk</label>
                            <select class="form-select js-choice" id="organizerSingle" size="1" name="katagori" required="required" data-options='{"removeItemButton":true,"placeholder":true}' data-wizard-validate-email="true" />
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
                        <div class="col-12">
                          <label class="form-label">Deskripsi</label>
                          <textarea class="form-control" name="deskripsi" rows="3" placeholder="Deskripsi dari produk yang akan dijual" required style="white-space: pre-line;"></textarea>
                        </div>
                        <div class="col-6">
                          <label class="form-label">Stok</label>
                          <input class="form-control" type="number" placeholder="Stok dari produk yang akan dijual" />
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Harga</label>
                          <input class="form-control" type="text" id="rupiah" required placeholder="Harga produk yang akan dijual" />
                        </div>
                        <div class="col-md-6 text-center">
                          <div class="avatar avatar-4xl"><img class="avatar lavatar-4xl" src="../assets/img/team/avatar.png" alt="..." id="image-preview" /></div>
                        </div>
                        <div class="col-md-6">
                          <label class="form-label">Foto*</label>
                          <input type="file" class="form-control" name="foto" id="image-source" onchange="previewImage();"/>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary" type="submit">Tambah</button>
                        </div>
                      </form>
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
    <script type="text/javascript">

    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split           = number_string.split(','),
        sisa            = split[0].length % 3,
        rupiah          = split[0].substr(0, sisa),
        ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if(ribuan){
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>


    <?php
      include '../komponen/slidebar.php';
      include '../komponen/bawah.php';
    ?>