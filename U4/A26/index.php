<?php
session_start(); 

if (!isset($_SESSION['token'])) {
    header('Location: home');
    exit(); 
}
require_once 'productController.php';

$productController = new ProductController();
$products = $productController->getProducts();

$brands= $productController->getBrands();

$name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Usuario'; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
    <div class="row">

      <div
        class="col-md-2 bg-dark text-white d-flex flex-column d-none d-sm-none d-md-block vh-100 position-sticky sticky-top">
        <h4 class="p-3">Sidebar</h4>
        <hr>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link text-white active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Customers</a>
          </li>
        </ul>

        <div class="mt-auto p-3">
          <hr>
          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
              id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong>
                <?= $name; ?>
              </strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <form action="auth" method="POST">
                  <input type="hidden" name="accion" value="logout">
                  <button class="dropdown-item" type="submit">Sign out</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </div>


      <div class="col-md-10 p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar scroll</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>
              <form class="d-flex ms-auto" action="auth" method="POST">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                <div class="dropdown ps-3">
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>
                      <?= $name; ?>
                    </strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow dropdown-menu-end"
                    aria-labelledby="dropdownUser1" style="">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li>
                      <form action="auth" method="POST">
                        <input type="hidden" name="accion" value="logout">
                        <button class="dropdown-item" type="submit">Sign out</button>
                      </form>
                    </li>
                  </ul>
                </div>
              </form>
            </div>
          </div>
        </nav>

        <div class="container mt-4">

          <div class="row">
            <div class="cols-1 col-md-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Productos</li>
                </ol>
              </nav>
            </div>
            <h2 class="cols-1 col-md-10">Productos</h2>
            <button type="button" class="btn btn-success cols-1 col-md-2" data-bs-toggle="modal"
              data-bs-target="#storeModal">
              Agregar producto
            </button>
          </div>
          <!-- modal -->
          <div class="modal fade" id="storeModal" tabindex="-1" aria-labelledby="storeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="storeModalLabel">Agregar producto</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form class="row g-3" action="resources" method="POST" enctype="multipart/form-data">
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
                      <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="col-12">
                      <label for="exampleFormControlTextarea1" class="form-label">Características</label>
                      <textarea class="form-control" id="features" name="features" rows="3" required></textarea>
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
                      <label for="inputState" class="form-label">Marca</label>
                      <select id="inputState" name="brand_id" class="form-select">
                      <?php foreach ($brands as $brand): ?>
                        <option value="<?= $brand['id']; ?>"><?= $brand['name']; ?></option>
                      <?php endforeach; ?>                         
                      </select>
                    </div>
                    <div class="col-12">
                      <label for="formFileMultiple" class="form-label">Imágenes</label>
                      <input class="form-control" type="file" id="cover" name="cover" accept="image/*" multiple
                        required>
                    </div>
                    <div class="modal-footer ">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <div class="col-6 ">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                      </div>
                    </div>

                    <input type="hidden" name="accion" value="store">
                  </form>
                </div>

              </div>
            </div>
          </div>

          <div class="row row-cols-1 row-cols-md-3  g-4 py-5">
            <?php if ($products && isset($products['data'])): ?>
            <?php foreach ($products['data'] as $product): ?>
            <div class="col">
              <div class="card h-100">
                <img src="<?= htmlspecialchars($product['cover']); ?>" class="card-img-top img-fluid"
                  alt="<?= htmlspecialchars($product['name']); ?>" />
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title">
                    <?= htmlspecialchars($product['name']); ?>
                  </h5>
                  <h6 class="card-text">Precio: $
                    <?= isset($product['presentations'][0]['price'][0]['amount']) ? htmlspecialchars($product['presentations'][0]['price'][0]['amount']) : 'No disponible'; ?>
                  </h6>
                  <p class="card-text flex-grow-1">
                    <?= htmlspecialchars($product['description']); ?>
                  </p>
                  <div class="d-flex justify-content-center">
                    <a href="products/<?= $product['slug']; ?>" class="btn btn-primary mx-1">Detalles</a>
                    <button type="button" class="btn btn-success cols-1" data-bs-toggle="modal"
                      data-bs-target="#updateModal" data-id="<?= htmlspecialchars($product['id']); ?>"
                      data-name="<?= htmlspecialchars($product['name']); ?>"
                      data-slug="<?= htmlspecialchars($product['slug']); ?>"
                      data-description="<?= htmlspecialchars($product['description']); ?>"
                      data-features="<?= htmlspecialchars($product['features']); ?>"
                      data-categories="<?= htmlspecialchars($product['categories'][0]['id']); ?>"
                      data-tags="<?= htmlspecialchars($product['tags'][0]['id']); ?>"
                      data-brand_id="<?= htmlspecialchars($product['brand_id']); ?>">
                      Editar
                    </button>


                    <button onclick="deleteProduct(<?= htmlspecialchars($product['id']); ?>)" href="" class="btn btn-danger mx-1">Eliminar</button>
                    <form class="hidden" action="resources" method="POST" id='form_delete' >
                      <input type="hidden" id="delete_product_id" name="delete_product_id">
                      <input type="hidden" name="accion" value="delete">
                    </form>

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

        <!-- <div class="col-md-4">
            <label for="inputState" class="form-label">Categoria</label>
            <select id="inputState" name="categories" class="form-select">
              <option value= "1" selected >Categoria 1</option>
              <option value="2">Categoria 2</option>                        
            </select>
          </div> -->
        <!-- modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Editar producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="row g-3" action="resources" method="POST" enctype="multipart/form-data">
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
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                  </div>
                  <div class="col-12">
                    <label for="exampleFormControlTextarea1" class="form-label">Características</label>
                    <textarea class="form-control" id="features" name="features" rows="3" required></textarea>
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
                      <option value="<?= $brand['id']; ?>" <?= isset($product['brand_id']) && $product['brand_id'] == $brand['id'] ? 'selected' : ''; ?>>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <div class="col-6 ">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                  </div>

                  <input type="hidden" name="accion" value="update">
                </form>
              </div>

            </div>
          </div>
        </div>


      </div>
    </div>
    <script>
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

      function deleteProduct(productId){
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>