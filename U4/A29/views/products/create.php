<?php 
  include_once "../../app/config.php";
  require_once __DIR__ . '/../../app/BrandController.php';
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
                <li class="breadcrumb-item"><a href="<?= BASE_PATH ?>home">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">E-commerce</a></li>
                <li class="breadcrumb-item" aria-current="page">Add New Product</li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Add New Product</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->

      <!-- [ Main Content ] start -->
      <div class="row">
        <div class="col-xl-12">
          <form action="<?= BASE_PATH . 'products' ?>" method="POST" enctype="multipart/form-data">
            <div class="card">
              <div class="card-header">
                <h5>Product description</h5>
              </div>
              <div class="card-body">
                <div class="mb-3">
                  <label class="form-label" for="name">Product Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name"
                    required>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="name">Product slug</label>
                  <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Product Name"
                    required>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="description">Product Description</label>
                  <textarea class="form-control" id="description" name="description"
                    placeholder="Enter Product Description" required></textarea>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="features">Product Features</label>
                  <textarea class="form-control" id="features" name="features" placeholder="Enter Product Features"
                    required></textarea>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="categories">Category</label>
                  <input type="number" class="form-control" id="categories" name="categories"
                    placeholder="Enter Category ID" required>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="tags">Tag</label>
                  <input type="number" class="form-control" id="tags" name="tags" placeholder="Enter Tag ID" required>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="brand_id">Brand</label>
                  <select id="brand_id" name="brand_id" class="form-select" required>
                    <option value="">Select Brand</option>
                    <?php foreach ($brands as $brand): ?>
                    <option value="<?= $brand['id']; ?>">
                      <?= $brand['name']; ?>
                    </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h5>Product Image</h5>
              </div>
              <div class="card-body">
                <div class="mb-3">
                  <label class="form-label" for="cover">Upload Image</label>
                  <input type="file" class="form-control" id="cover" name="cover" accept="image/*" required>
                </div>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="card">
                <div class="card-body text-end btn-page">
                  <button type="submit" class="btn btn-primary mb-0">Save product</button>
                  <button type="reset" class="btn btn-outline-secondary mb-0">Reset</button>
                </div>
              </div>
            </div>

            <input type="hidden" name="action" value="store">
          </form>
        </div>
        <!-- [ product-form ] end -->
      </div>


      <!-- [ Main Content ] end -->
    </div>
  </div>
  <!-- [ Main Content ] end -->

  <?php 

      include "../layouts/footer.php";

    ?>
  <?php 

      include "../layouts/scripts.php";

    ?>

  <?php 

      include "../layouts/modals.php";

    ?>

</body>
<!-- [Body] end -->

</html>