
 <style>
    body {
      background-image: url('./images/fondo.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      min-height: 120vh;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1;
    }

    .navbar {
      position: relative;
      z-index: 3;
    }

    .content {
      position: relative;
      z-index: 2;
      color: white;
      text-align: center;
      padding-top: 20vh;
    }
  </style>
</head>
<body>

  <div class="overlay"></div>

  <div class="content container">
    <h1 class="display-4 fw-bold">"Bienvenida a tù libreria Laura"</h1>
    <p class="lead">¡“Una bliblioteca no es un conjunto de libros leídos, sino una compañía, un refugio y un proyecto de vida.” Arturo Pérez-Reverte!</p>
  </div>
<script src="build/js/inicio.js"></script>