    <div class="container py-5">
        <!-- Sección de Registro de Libros -->
        <div class="row mb-5 justify-content-center animate-fade-in">
            <div class="col-lg-8">
                <div class="card shadow-custom border-0 rounded-4">
                    <div class="card-body card-gradient">
                        <div class="mb-4 text-center">
                            <h5 class="fw-bold mb-2" style="color: rgba(255,255,255,0.9);"><i class="bi bi-book-fill me-2"></i>Registro de Libros</h5>
                            <h3 class="fw-bold mb-0"><i class="bi bi-plus-circle-fill me-2"></i>REGISTRAR NUEVO LIBRO</h3>
                        </div>
                        <form id="FormLibros" class="p-4 form-card rounded-3 shadow-sm border">
                            <input type="hidden" id="libro_id" name="libro_id">
                            <div class="row g-4 mb-3">
                                <div class="col-md-6">
                                    <label for="libro_titulo" class="form-label text-white">Título del Libro</label>
                                    <input type="text" class="form-control form-control-lg" id="libro_titulo" name="libro_titulo" placeholder=" Ej. El Coronel no tiene quien le escriba " required>
                                </div>
                                <div class="col-md-6">
                                    <label for="libro_autor" class="form-label text-white">Autor del Libro</label>
                                    <input type="text" class="form-control form-control-lg" id="libro_autor" name="libro_autor" placeholder="Gabriel Garcia Màrquez" required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center gap-3">
                                <button class="btn btn-success btn-lg px-4 shadow" type="submit" id="BtnGuardarLibro">
                                    <i class="bi bi-bookmark-plus-fill me-2"></i>Guardar Libro
                                </button>
                                <button class="btn btn-warning btn-lg px-4 shadow d-none" type="button" id="BtnModificarLibro">
                                    <i class="bi bi-pencil-fill me-2"></i>Modificar Libro
                                </button>
                                <button class="btn btn-secondary btn-lg px-4 shadow" type="reset" id="BtnLimpiarLibro">
                                    <i class="bi bi-arrow-clockwise me-2"></i>Limpiar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Registro de Préstamos -->
        <div class="row mb-5 justify-content-center animate-fade-in">
            <div class="col-lg-8">
                <div class="card shadow-custom border-0 rounded-4">
                    <div class="card-body card-gradient">
                        <div class="mb-4 text-center">
                            <h5 class="fw-bold mb-2" style="color: rgba(244, 122, 230, 0.9);"><i class="bi bi-journals me-2"></i>Registro de Libros Prestados</h5>
                            <h3 class="fw-bold mb-0"><i class="bi bi-arrow-right-circle-fill me-2"></i>REGISTRAR PRÉSTAMO DE LIBRO</h3>
                        </div>
                        <form id="FormPrestamos" class="p-4 form-card rounded-3 shadow-sm border">
                            <input type="hidden" id="prestamo_id" name="prestamo_id">
                            <div class="row g-4 mb-3">
                                <div class="col-md-6">
                                    <label for="libro_id_prestamo" class="form-label text-">Seleccionar Libro</label>
                                    <select name="libro_id" class="form-select form-select-lg" id="libro_id_prestamo" required>
                                        <option value="">Elija su libro favorito </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="persona_nombre" class="form-label text-black">Nombre de la Persona</label>
                                    <input type="text" class="form-control form-control-lg" id="persona_nombre" name="persona_nombre" placeholder="NOMBRE" required>
                                </div>
                            </div>
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <label for="fecha_prestamo" class="form-label text-black">Fecha de Préstamo</label>
                                    <input type="datetime-local" class="form-control form-control-lg" id="fecha_prestamo" name="fecha_prestamo" required>
                          
                                <div class="col-md-6">
                                    <label for="fecha_prestamo" class="form-label text-black">Fecha de Entrega</label>
                                    <input type="datetime-local" class="form-control form-control-lg" id="fecha_prestamo" name="fecha_prestamo" required>
                                </div>
                                  </div>
                            </div>
                        </div>
                            <div class="d-flex justify-content-center gap-3">
                                <button class="btn btn-success btn-lg px-4 shadow" type="submit" id="BtnGuardar">
                                    <i class="bi bi-journal-bookmark-fill me-2"></i>Guardar Préstamo
                                </button>
                                <button class="btn btn-warning btn-lg px-4 shadow d-none" type="button" id="BtnModificar">
                                    <i class="bi bi-pen-fill me-2"></i>Modificar Préstamo
                                </button>
                                <button class="btn btn-secondary btn-lg px-4 shadow" type="reset" id="BtnLimpiar">
                                    <i class="bi bi-arrow-repeat me-2"></i>Limpiar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de Tabla de Préstamos -->
        <div class="row justify-content-center mt-5 animate-fade-in">
            <div class="col-lg-11">
                <div class="card shadow-custom border-0 rounded-4">
                    <div class="card-header card-header-custom">
                        <h3 class="text-center mb-0"><i class="bi bi-table me-2"></i>LIBROS PRESTADOS</h3>
                    </div>
                    <div class="card-body">
                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <label for="fecha_inicio" class="form-label">Fecha de Prestramo</label>
                                <input type="date" id="fecha_inicio" class="form-control form-control-lg">
                            </div>
                            <div class="col-md-4">
                                <label for="fecha_fin" class="form-label">Fecha de Entrega</label>
                                <input type="date" id="fecha_fin" class="form-control form-control-lg">
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button class="btn btn-success btn-lg w-100 shadow" id="btn_filtrar_fecha">
                                    <i class="bi bi-search me-2"></i>Buscar 
                                </button>
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle" id="TablePrestamos">
                                <!-- La tabla se llenará dinámicamente -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="<?= asset('build/js/libros/index.js') ?>"></script>