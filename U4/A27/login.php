<!doctype html>
<html lang="en"> 

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100 ">
        <div class="row shadow-lg rounded ">
            <div class="col-md-6  d-flex justify-content-center align-items-center d-none d-sm-none d-md-block p-0 ">
                <img src="https://img2.10bestmedia.com/Images/Photos/406808/The-Fresh-Market_55_660x440.jpg" class="img-fluid w-100 h-100 rounded-start " alt="">
            </div>
            <div class="col-md-6 p-3">
                <form method= "POST" action= "auth">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-Fe-MLZ0kDMnazFYVMFzn_PPidIcABmLZnQ&s" class="img-thumbnail col-2 mb-3" alt="">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="contrasenia" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" name="accion" value="login" class="btn btn-primary">Submit</button>

                    <input type="hidden" name="accion" value="login">
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
