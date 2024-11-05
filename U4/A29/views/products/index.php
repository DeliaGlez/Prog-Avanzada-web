<?php 

  include_once "../../app/config.php";
  require_once __DIR__ . '/../../app/ProductController.php';
  require_once __DIR__ . '/../../app/BrandController.php';

  $productController = new ProductController();
  $products = $productController->getProducts();
  $brandController = new BrandController();

  $brands= $brandController->get();
?>
<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
  <?php 

      include "../layouts/head.php";

    ?>

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr"
  data-pc-theme="light">


  <?php 

      include "../layouts/sidebar.php";

    ?>

  <?php 

      include "../layouts/nav.php";

    ?>

  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
                <li class="breadcrumb-item" aria-current="page">Products</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Products</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->


      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="ecom-wrapper">

            <div class="ecom-content">
              <div class="d-sm-flex align-items-center mb-4">
                <ul class="list-inline me-auto my-1">
                  <li class="list-inline-item">
                    <form class="form-search">
                      <i class="ph-duotone ph-magnifying-glass icon-search"></i>
                      <input type="search" class="form-control" placeholder="Search Products" />
                    </form>
                  </li>
                </ul>
                <ul class="list-inline ms-auto my-1">
                  <li class="list-inline-item">
                    <select class="form-select">
                      <option>Price: High To Low</option>
                      <option>Price: Low To High</option>
                      <option>Popularity</option>
                      <option>Discount</option>
                      <option>Fresh Arrivals</option>
                    </select>
                  </li>
                  <li class="list-inline-item align-bottom">
                    <a href="#" class="d-xxl-none btn btn-link-secondary" data-bs-toggle="offcanvas"
                      data-bs-target="#offcanvas_mail_filter">
                      <i class="ti ti-filter f-16"></i> Filter
                    </a>
                    <a href="#" class="d-none d-xxl-inline-flex btn btn-link-secondary" data-bs-toggle="collapse"
                      data-bs-target="#ecom-filter">
                      <i class="ti ti-filter f-16"></i> Filter
                    </a>
                  </li>
                </ul>
              </div>
              <div class="row">
                <?php if ($products && isset($products['data'])): ?>
                <?php foreach ($products['data'] as $product): ?>
                <div class="col-sm-6 col-xl-4 mb-3">
                  <div class="card product-card h-100">
                    <div class="card-img-top">
                      <a href="<?= BASE_PATH ?>products/<?= htmlspecialchars($product['slug']); ?>">
                        <img src="<?= htmlspecialchars($product['cover']); ?>"
                          alt="<?= htmlspecialchars($product['name']); ?>" class="img-prod img-fluid" />
                      </a>
                      <div class="card-body position-absolute end-0 top-0">
                        <div class="form-check prod-likes">
                          <input type="checkbox" class="form-check-input" />
                          <i data-feather="heart" class="prod-likes-icon"></i>
                        </div>
                      </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                      <a href="products/<?= htmlspecialchars($product['slug']); ?>">
                        <p class="prod-content mb-0 text-muted">
                          <?= htmlspecialchars($product['name']); ?>
                        </p>
                      </a>
                      <div class="d-flex align-items-center justify-content-between mt-2 mb-3 flex-wrap gap-1">
                        <h4 class="mb-0 text-truncate">
                          <b>$
                            <?= isset($product['presentations'][0]['price'][0]['amount']) ? htmlspecialchars($product['presentations'][0]['price'][0]['amount']) : 'No disponible'; ?>
                          </b>
                        </h4>
                        <div class="d-inline-flex align-items-center">
                          <i class="ph-duotone ph-star text-warning me-1"></i>
                          <?= htmlspecialchars($product['rating'] ?? '4.5'); ?> <small class="text-muted">/ 5</small>
                        </div>
                      </div>
                      <p class="card-text mb-2 flex-grow-1">
                        <?= htmlspecialchars($product['description']); ?>
                      </p>
                      <div class="d-flex justify-content-between mt-auto">
                        <div class="flex-shrink-0">
                          <a href="products/<?= htmlspecialchars($product['slug']); ?>"
                            class="avtar avtar-s btn-link-secondary btn-prod-card">
                            <i class="ph-duotone ph-eye f-18"></i>
                          </a>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <div class="d-grid">
                            <button class="btn btn-link-secondary btn-prod-card">Add to cart</button>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-center mt-2">
                        <button type="button" class="btn btn-success mx-1" data-bs-toggle="modal"
                          data-bs-target="#updateModal" data-id="<?= htmlspecialchars($product['id']); ?>"
                          data-name="<?= htmlspecialchars($product['name']); ?>"
                          data-slug="<?= htmlspecialchars($product['slug']); ?>"
                          data-description="<?= htmlspecialchars($product['description']); ?>"
                          data-features="<?= htmlspecialchars($product['features']); ?>"
                          data-categories="<?= htmlspecialchars($product['categories'][0]['id'] ?? ''); ?>"
                          data-tags="<?= htmlspecialchars($product['tags'][0]['id'] ?? ''); ?>"
                          data-brand_id="<?= htmlspecialchars($product['brand_id']); ?>">
                          Editar
                        </button>
                        <button onclick="deleteProduct(<?= htmlspecialchars($product['id']); ?>)" href=""
                          class="btn btn-danger mx-1">Eliminar</button>
                        <form class="hidden" action="<?= BASE_PATH . 'products' ?>" method="POST" id='form_delete'>
                          <input type="hidden" id="delete_product_id" name="delete_product_id">
                          <input type="hidden" name="action" value="delete">
                        </form>
                      </div>
                    </div>

                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="updateModalLabel">Editar producto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form class="row g-3" action="<?= BASE_PATH . 'products' ?>" method="POST"
                              enctype="multipart/form-data">
                              <input type="hidden" id="product_id" name="product_id">
                              <div class="col-md-6">
                                <label for="inputNameStore" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                              </div>
                              <div class="col-md-6">
                                <label for="inputSlugStore" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" required>
                              </div>
                              <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                                <textarea class="form-control" id="description" name="description" rows="3"
                                  required></textarea>
                              </div>
                              <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Características</label>
                                <textarea class="form-control" id="features" name="features" rows="3"
                                  required></textarea>
                              </div>

                              <div class="col-md-4">
                                <label for="inputTagStore" class="form-label">ID Categoría</label>
                                <input type="number" class="form-control" id="categories" name="categories" required>
                              </div>
                              <div class="col-md-4">
                                <label for="inputCategoryStore" class="form-label">ID Etiqueta</label>
                                <input type="number" class="form-control" id="tags" name="tags" required>
                              </div>
                              <div class="col-md-4">
                                <label for="inputBrandStore" class="form-label">Marca</label>
                                <select id="brand_id" name="brand_id" class="form-select">
                                  <?php foreach ($brands as $brand): ?>
                                  <option value="<?= $brand['id']; ?>" <?=isset($product['brand_id']) &&
                                    $product['brand_id']==$brand['id'] ? 'selected' : '' ; ?>>
                                    <?= htmlspecialchars($brand['name']); ?>
                                  </option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <!-- <div class="col-12">                                         
                    <label for="formFileMultiple" class="form-label">Imágenes</label>
                    <input class="form-control" type="file" id="cover" name="cover" accept="image/*" multiple >
                  </div>  -->
                              <div class="modal-footer ">
                                <button type="button" class="btn btn-secondary"
                                  data-bs-dismiss="modal">Cancelar</button>
                                <div class="col-6 ">
                                  <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                              </div>

                              <input type="hidden" name="action" value="update">

                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <p>No hay productos disponibles.</p>
                <?php endif; ?>
              </div>


            </div>
          </div>
        </div>
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>
  <div class="offcanvas offcanvas-end" tabindex="-1" id="productOffcanvas" aria-labelledby="productOffcanvasLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="productOffcanvasLabel">Product Details</h5>
      <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="offcanvas">
        <i class="ti ti-x f-20"></i>
      </a>
    </div>
    <div class="offcanvas-body">
      <div class="card product-card shadow-none border-0">
        <div class="card-img-top p-0">
          <a href="ecom_product-details.html">
            <img src="../assets/images/application/img-prod-4.jpg" alt="image" class="img-prod img-fluid" />
          </a>
          <div class="card-body position-absolute end-0 top-0">
            <div class="form-check prod-likes">
              <input type="checkbox" class="form-check-input" />
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-heart prod-likes-icon">
                <path
                  d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                </path>
              </svg>
            </div>
          </div>
          <div class="card-body position-absolute start-0 top-0">
            <span class="badge bg-danger badge-prod-card">30%</span>
          </div>
        </div>
      </div>
      <h5>Glitter gold Mesh Walking Shoes</h5>
      <p class="text-muted">Image Enlargement: After shooting, you can enlarge photographs of the objects for clear
        zoomed view. Change In Aspect Ratio:
        Boldly crop the subject and save it with a composition that has impact.</p>
      <ul class="list-group list-group-flush">
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Price</p>
            <h4 class="mb-0"><b>$299.00</b><span
                class="mx-2 f-14 text-muted f-w-400 text-decoration-line-through">$399.00</span></h4>
          </div>
        </li>
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Categories</p>
            <h6 class="mb-0">Shoes</h6>
          </div>
        </li>
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Status</p>
            <h6 class="mb-0"><span class="badge bg-warning rounded-pill">Process</span></h6>
          </div>
        </li>
        <li class="list-group-item px-0">
          <div class="d-inline-flex align-items-center justify-content-between w-100">
            <p class="mb-0 text-muted me-1">Brands</p>
            <h6 class="mb-0"><img src="../assets/images/application/img-prod-brand-1.png" alt="user-image"
                class="wid-40" /></h6>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <?php 

      include "../layouts/footer.php";

    ?>

  <?php 

      include "../layouts/scripts.php";

    ?>


  <!-- [Page Specific JS] start -->
  <script>
    // scroll-block
    var tc = document.querySelectorAll('.scroll-block');
    for (var t = 0; t < tc.length; t++) {
      new SimpleBar(tc[t]);
    }
    document.addEventListener('DOMContentLoaded', function () {
      const updateModal = document.getElementById('updateModal');
      updateModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const slug = button.getAttribute('data-slug');
        const description = button.getAttribute('data-description');
        const features = button.getAttribute('data-features');
        const categories = button.getAttribute('data-categories');
        const tags = button.getAttribute('data-tags');
        const brand_id = button.getAttribute('data-brand_id');


        const modalIdInput = updateModal.querySelector('#product_id');
        const modalNameInput = updateModal.querySelector('#name');
        const modalSlugInput = updateModal.querySelector('#slug');
        const modalDescriptionTextarea = updateModal.querySelector('#description');
        const modalFeaturesTextarea = updateModal.querySelector('#features');
        const modalCategoriesInput = updateModal.querySelector('#categories');
        const modalTagsInput = updateModal.querySelector('#tags');
        const modalBrandInput = updateModal.querySelector('#brand_id');

        modalIdInput.value = id;
        modalNameInput.value = name;
        modalSlugInput.value = slug;
        modalDescriptionTextarea.value = description;
        modalFeaturesTextarea.value = features;
        modalCategoriesInput.value = categories;
        modalTagsInput.value = tags;
        modalBrandInput.value = brand_id;
      });
    });
    function deleteProduct(productId) {
      const form = document.getElementById('form_delete');
      const productIdInput = document.getElementById('delete_product_id');
      productIdInput.value = productId;
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
            form.submit();
            swal("Poof! Your imaginary file has been deleted!", {
              icon: "success",
            });
          } else {
            swal("Your imaginary file is safe!");
          }
        });
    }
  </script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <?php 

      include "../layouts/modals.php";

    ?>

</body>
<!-- [Body] end -->

</html>