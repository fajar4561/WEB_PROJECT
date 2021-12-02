<?php
$judul = 'App | Keranjang';
include 'komponen/header.php';
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
        <div class="content">
          <?php include 'komponen/topbar.php';?>
          <div class="card">
            <div class="card-header">
              <div class="row justify-content-between">
                <div class="col-md-auto">
                  <h5 class="mb-3 mb-md-0">Shopping Cart (7 Items)</h5>
                </div>
                <div class="col-md-auto"><a class="btn btn-sm btn-outline-secondary border-300 me-2" href="../../app/e-commerce/product/product-list.html"> <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4"></span>Continue Shopping</a><a class="btn btn-sm btn-primary" href="../../app/e-commerce/checkout.html">Checkout</a></div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="row gx-card mx-0 bg-200 text-900 fs--1 fw-semi-bold">
                <div class="col-9 col-md-8 py-2">Name</div>
                <div class="col-3 col-md-4">
                  <div class="row">
                    <div class="col-md-8 py-2 d-none d-md-block text-center">Quantity</div>
                    <div class="col-12 col-md-4 text-end py-2">Price</div>
                  </div>
                </div>
              </div>
              <div class="row gx-card mx-0 align-items-center border-bottom border-200">
                <div class="col-8 py-3">
                  <div class="d-flex align-items-center"><a href="../../app/e-commerce/product/product-details.html"><img class="img-fluid rounded-1 me-3 d-none d-md-block" src="../../assets/img/products/1.jpg" alt="" width="60" /></a>
                    <div class="flex-1">
                      <h5 class="fs-0"><a class="text-900" href="../../app/e-commerce/product/product-details.html">Apple MacBook Pro 15&quot; Z0V20008N: 2.9GHz 6-core 8th-Gen Intel Core i9, 32GB RAM</a></h5>
                      <div class="fs--2 fs-md--1"><a class="text-danger" href="#!">Remove</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-4 py-3">
                  <div class="row align-items-center">
                    <div class="col-md-8 d-flex justify-content-end justify-content-md-center order-1 order-md-0">
                      <div>
                        <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="minus">-</button>
                          <input class="form-control text-center px-2 input-spin-none" type="number" min="1" value="1" aria-label="Amount (to the nearest dollar)" style="width: 50px" />
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="plus">+</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 text-end ps-0 order-0 order-md-1 mb-2 mb-md-0 text-600">$1292</div>
                  </div>
                </div>
              </div>
              <div class="row gx-card mx-0 align-items-center border-bottom border-200">
                <div class="col-8 py-3">
                  <div class="d-flex align-items-center"><a href="../../app/e-commerce/product/product-details.html"><img class="img-fluid rounded-1 me-3 d-none d-md-block" src="../../assets/img/products/2.jpg" alt="" width="60" /></a>
                    <div class="flex-1">
                      <h5 class="fs-0"><a class="text-900" href="../../app/e-commerce/product/product-details.html">Apple iMac Pro (27-inch with Retina 5K Display, 3.0GHz 10-core Intel Xeon W, 1TB SSD)</a></h5>
                      <div class="fs--2 fs-md--1"><a class="text-danger" href="#!">Remove</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-4 py-3">
                  <div class="row align-items-center">
                    <div class="col-md-8 d-flex justify-content-end justify-content-md-center order-1 order-md-0">
                      <div>
                        <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="minus">-</button>
                          <input class="form-control text-center px-2 input-spin-none" type="number" min="1" value="1" aria-label="Amount (to the nearest dollar)" style="width: 50px" />
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="plus">+</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 text-end ps-0 order-0 order-md-1 mb-2 mb-md-0 text-600">$2012</div>
                  </div>
                </div>
              </div>
              <div class="row gx-card mx-0 align-items-center border-bottom border-200">
                <div class="col-8 py-3">
                  <div class="d-flex align-items-center"><a href="../../app/e-commerce/product/product-details.html"><img class="img-fluid rounded-1 me-3 d-none d-md-block" src="../../assets/img/products/4.jpg" alt="" width="60" /></a>
                    <div class="flex-1">
                      <h5 class="fs-0"><a class="text-900" href="../../app/e-commerce/product/product-details.html">Apple iPad Air 2019 (3GB RAM, 128GB ROM, 8MP Main Camera)</a></h5>
                      <div class="fs--2 fs-md--1"><a class="text-danger" href="#!">Remove</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-4 py-3">
                  <div class="row align-items-center">
                    <div class="col-md-8 d-flex justify-content-end justify-content-md-center order-1 order-md-0">
                      <div>
                        <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="minus">-</button>
                          <input class="form-control text-center px-2 input-spin-none" type="number" min="1" value="1" aria-label="Amount (to the nearest dollar)" style="width: 50px" />
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="plus">+</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 text-end ps-0 order-0 order-md-1 mb-2 mb-md-0 text-600">$1024</div>
                  </div>
                </div>
              </div>
              <div class="row gx-card mx-0 align-items-center border-bottom border-200">
                <div class="col-8 py-3">
                  <div class="d-flex align-items-center"><a href="../../app/e-commerce/product/product-details.html"><img class="img-fluid rounded-1 me-3 d-none d-md-block" src="../../assets/img/products/3.jpg" alt="" width="60" /></a>
                    <div class="flex-1">
                      <h5 class="fs-0"><a class="text-900" href="../../app/e-commerce/product/product-details.html">Apple iPhone XS Max (4GB RAM, 512GB ROM, 12MP Main Camera)</a></h5>
                      <div class="fs--2 fs-md--1"><a class="text-danger" href="#!">Remove</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-4 py-3">
                  <div class="row align-items-center">
                    <div class="col-md-8 d-flex justify-content-end justify-content-md-center order-1 order-md-0">
                      <div>
                        <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="minus">-</button>
                          <input class="form-control text-center px-2 input-spin-none" type="number" min="1" value="1" aria-label="Amount (to the nearest dollar)" style="width: 50px" />
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="plus">+</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 text-end ps-0 order-0 order-md-1 mb-2 mb-md-0 text-600">$990</div>
                  </div>
                </div>
              </div>
              <div class="row gx-card mx-0 align-items-center border-bottom border-200">
                <div class="col-8 py-3">
                  <div class="d-flex align-items-center"><a href="../../app/e-commerce/product/product-details.html"><img class="img-fluid rounded-1 me-3 d-none d-md-block" src="../../assets/img/products/5.jpg" alt="" width="60" /></a>
                    <div class="flex-1">
                      <h5 class="fs-0"><a class="text-900" href="../../app/e-commerce/product/product-details.html">Apple Watch Series 4 44mm GPS Only</a></h5>
                      <div class="fs--2 fs-md--1"><a class="text-danger" href="#!">Remove</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-4 py-3">
                  <div class="row align-items-center">
                    <div class="col-md-8 d-flex justify-content-end justify-content-md-center order-1 order-md-0">
                      <div>
                        <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="minus">-</button>
                          <input class="form-control text-center px-2 input-spin-none" type="number" min="1" value="1" aria-label="Amount (to the nearest dollar)" style="width: 50px" />
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="plus">+</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 text-end ps-0 order-0 order-md-1 mb-2 mb-md-0 text-600">$400</div>
                  </div>
                </div>
              </div>
              <div class="row gx-card mx-0 align-items-center border-bottom border-200">
                <div class="col-8 py-3">
                  <div class="d-flex align-items-center"><a href="../../app/e-commerce/product/product-details.html"><img class="img-fluid rounded-1 me-3 d-none d-md-block" src="../../assets/img/products/7.jpg" alt="" width="60" /></a>
                    <div class="flex-1">
                      <h5 class="fs-0"><a class="text-900" href="../../app/e-commerce/product/product-details.html">Nikon D3200 Digital DSLR Camera</a></h5>
                      <div class="fs--2 fs-md--1"><a class="text-danger" href="#!">Remove</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-4 py-3">
                  <div class="row align-items-center">
                    <div class="col-md-8 d-flex justify-content-end justify-content-md-center order-1 order-md-0">
                      <div>
                        <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="minus">-</button>
                          <input class="form-control text-center px-2 input-spin-none" type="number" min="1" value="1" aria-label="Amount (to the nearest dollar)" style="width: 50px" />
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="plus">+</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 text-end ps-0 order-0 order-md-1 mb-2 mb-md-0 text-600">$2398</div>
                  </div>
                </div>
              </div>
              <div class="row gx-card mx-0 align-items-center border-bottom border-200">
                <div class="col-8 py-3">
                  <div class="d-flex align-items-center"><a href="../../app/e-commerce/product/product-details.html"><img class="img-fluid rounded-1 me-3 d-none d-md-block" src="../../assets/img/products/8.jpg" alt="" width="60" /></a>
                    <div class="flex-1">
                      <h5 class="fs-0"><a class="text-900" href="../../app/e-commerce/product/product-details.html">Canon Standard Zoom Lens</a></h5>
                      <div class="fs--2 fs-md--1"><a class="text-danger" href="#!">Remove</a></div>
                    </div>
                  </div>
                </div>
                <div class="col-4 py-3">
                  <div class="row align-items-center">
                    <div class="col-md-8 d-flex justify-content-end justify-content-md-center order-1 order-md-0">
                      <div>
                        <div class="input-group input-group-sm flex-nowrap" data-quantity="data-quantity">
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="minus">-</button>
                          <input class="form-control text-center px-2 input-spin-none" type="number" min="1" value="1" aria-label="Amount (to the nearest dollar)" style="width: 50px" />
                          <button class="btn btn-sm btn-outline-secondary border-300 px-2" data-type="plus">+</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 text-end ps-0 order-0 order-md-1 mb-2 mb-md-0 text-600">$400</div>
                  </div>
                </div>
              </div>
              <div class="row fw-bold gx-card mx-0">
                <div class="col-9 col-md-8 py-2 text-end text-900">Total</div>
                <div class="col px-0">
                  <div class="row gx-card mx-0">
                    <div class="col-md-8 py-2 d-none d-md-block text-center">7 (items)</div>
                    <div class="col-12 col-md-4 text-end py-2">$8516</div>
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