<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="build/js/app.js"></script>
    <link rel="shortcut icon" href="<?= asset('images/fondo.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('build/styles.css') ?>">
    <title>Biblioteca</title>
    <style>
        .bg-azul-oscuro {
            background-color:rgb(134, 4, 80);
        }
        .bg-verde-tienda {
            background-color:rgb(218, 13, 218);
        }
        .bg-naranja-tienda {
            background-color: #fd7e14;
        }
        .navbar-nav .nav-link:hover {
            background-color: rgba(72, 11, 53, 0.1);
            border-radius: 5px;
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="bg-light d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm bg-azul-oscuro">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/parcial1_pmlx/">
                <img src="<?= asset('images/cit.png') ?>" alt="Logo" width="32" height="32" class="me-2">
                <span class="d-none d-md-inline">Inicio</span>
                <span class="d-md-none">Inicio</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- mis libros que voy a regustrar  -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/parcial1_pmlx/libros">
                            <i class="bi bi-people me-1"></i>
                            <span class="d-none d-lg-inline">Libros</span>
                            <span class="d-lg-none">Libros</span>
                        </a>
                    </li>

<!-- prestamos registrdos -->

                     <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="/parcial1_pmlx/usuarios">
                            <i class="bi bi-people me-1"></i>
                            <span class="d-none d-lg-inline">Prestamos</span>
                            <span class="d-lg-none">Prestamos</span>
                        </a>
                    </li>
                </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>  
    

    <div class="progress fixed-bottom" style="height: 6px;">
        <div class="progress-bar progress-bar-animated bg-danger" id="bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <main class="container py-5 my-4 rounded shadow bg-white" style="min-height: 75vh;">
        <?php echo $contenido; ?>
    </main>

    <footer class="bg-azul-oscuro text-white-50 py-3 mt-auto shadow-sm">
        <div class="container text-center">
            <small>
                <i class="bi bi-cart-heart me-2"></i>
                Biblioteca especial para Laura 
                <span class="d-none d-md-inline">- Comando de Informática y Tecnología 2025 </span>, <?= date('Y') ?> &copy;
            </small>
        </div>
    </footer>

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>