<?php
session_start(); 

if (!isset($_SESSION['token'])) {
    header('Location: login.php');
    exit(); 
}
require_once 'ProductController.php';

$productController = new ProductController();
$products = $productController->getProducts();

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
                <form action="AuthController.php" method="POST">
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
              <form class="d-flex ms-auto" action="AuthController.php" method="POST">
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
                      <form action="AuthController.php" method="POST">
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
            <h2 class="cols-1 col-md-10">Productos</h2>
            <button  type="button" class="btn btn-success cols-1 col-md-2" data-bs-toggle="modal" data-bs-target="#storeModal">
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
                    <form class="row g-3">
                      <div class="col-md-6">
                        <label for="inputNameStore" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNameStore">
                      </div>
                      <div class="col-md-6">
                        <label for="inputSlugStore" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="inputSlugStore">
                      </div>
                      <div class="col-12">
                        <label for="descriptionStore" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descriptionStore" >
                      </div>
                      <div class="col-12">
                        <label for="featuresStore" class="form-label">Características</label>
                        <input type="text" class="form-control" id="featuresStore" >
                      </div>
                      <div class="col-md-4">
                        <label for="inputState" class="form-label">Categoria</label>
                        <select id="inputState" class="form-select">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="inputState" class="form-label">Etiqueta</label>
                        <select id="inputState" class="form-select">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="inputState" class="form-label">Marca</label>
                        <select id="inputState" class="form-select">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="col-12">                                         
                        <label for="formFileMultiple" class="form-label">Imágenes</label>
                        <input class="form-control" type="file" id="formFileMultiple" multiple>
                      </div>
                      <div class="modal-footer ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <div class="col-6 ">
                          <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                      </div>
                      
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
                    <?= htmlspecialchars($product['presentations'][0]['price'][0]['amount']); ?>
                  </h6>
                  <p class="card-text flex-grow-1">
                    <?= htmlspecialchars($product['description']); ?>
                  </p>
                  <div class="d-flex justify-content-center">
                    <a href="details.php?slug=<?= $product['slug']; ?>" class="btn btn-primary mx-1">Detalles</a>
                    <button  type="button" class="btn btn-success cols-1 " data-bs-toggle="modal" data-bs-target="#editModal">
                      Editar
                    </button>
                    <a href="" class="btn btn-danger mx-1">Eliminar</a>
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


     <!-- modal -->
     <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Editar producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form class="row g-3">
                      <div class="col-md-6">
                        <label for="inputNameStore" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="inputNameStore">
                      </div>
                      <div class="col-md-6">
                        <label for="inputSlugStore" class="form-label">Slug</label>
                        <input type="text" class="form-control" id="inputSlugStore">
                      </div>
                      <div class="col-12">
                        <label for="descriptionStore" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descriptionStore" >
                      </div>
                      <div class="col-12">
                        <label for="featuresStore" class="form-label">Características</label>
                        <input type="text" class="form-control" id="featuresStore" >
                      </div>
                      <div class="col-md-4">
                        <label for="inputState" class="form-label">Categoria</label>
                        <select id="inputState" class="form-select">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="inputState" class="form-label">Etiqueta</label>
                        <select id="inputState" class="form-select">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="col-md-4">
                        <label for="inputState" class="form-label">Marca</label>
                        <select id="inputState" class="form-select">
                          <option selected>Choose...</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="col-12">                                         
                        <label for="formFileMultiple" class="form-label">Imágenes</label>
                        <input class="form-control" type="file" id="formFileMultiple" multiple>
                      </div>
                      <div class="modal-footer ">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <div class="col-6 ">
                          <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                      </div>
                      
                    </form>
                </div>
              </div>
            </div>


      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>