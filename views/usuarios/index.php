<div class="container py-5">
    <!-- Header con gradiente actualizado -->
    <div class="row mb-5 justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-body" style="background: linear-gradient(135deg, #f8fafc 40%, #c6e1f7 100%);">
                    <div class="mb-4 text-center">
                        <h5 class="fw-bold text-secondary mb-2">¡Bienvenido al Sistema de Gestión de Préstamos!</h5>
                            <h3 class="fw-bold mb-0" style="color: #1e5f8a;">ADMINISTRACIÓN DE PRÉSTAMOS</h3>
                        </div>
                        <form id="FormPrestamos" class="p-4 bg-white rounded-4 shadow-sm border">
                            <input type="hidden" id="prestamo_id" name="prestamo_id">
                            <div class="row g-4 mb-3">
                                <div class="col-md-6">
                                    <label for="libro_id" class="form-label fw-semibold">Nombre del Libro</label>                                    
                                        <select name="proveedorId" class="form-control" required>
                                            <option value="">Seleccione un libro </option>
                                            <?php foreach ($libros as $libros): ?>
                                                <option value="<?= $libros['ID'] ?>"><?= $proveedor['titulo_libro'] ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                </div>
                                <div class="col-md-6">
                                    <label for="fecha_prestamo" class="form-label fw-semibold">Fecha del Préstamo</label>
                                    <input type="date" class="form-control form-control-lg rounded-3" id="fecha_prestamo" name="fecha_prestamo" required>
                                </div>
                            </div>
                            <div class="row g-4 mb-4">
                                <div class="col-md-6">
                                    <label for="fecha_devolucion" class="form-label fw-semibold">Fecha de Devolución</label>
                                    <input type="date" class="form-control form-control-lg rounded-3" id="fecha_devolucion" name="fecha_devolucion" placeholder="Fecha esperada de devolución">
                                </div>
                                <div class="col-md-6">
                                    <label for="estado" class="form-label fw-semibold">Estado del Préstamo</label>
                                    <select name="estado" class="form-select form-select-lg rounded-3" id="estado" required>
                                        <option value="">-- Seleccione el estado --</option>
                                        <option value="activo">Activo</option>
                                        <option value="devuelto">Devuelto</option>
                                        <option value="vencido">Vencido</option>
                                        <option value="renovado">Renovado</option>
                                    </select>
                                </div>
                            </div>
                        <div class="d-flex justify-content-center gap-3 mt-4">
                            <button class="btn btn-lg px-4 shadow-sm rounded-pill" type="submit" id="BtnGuardar" style="background-color: #1e5f8a; color: white;">
                                <i class="bi bi-save me-2"></i>Guardar
                            </button>
                            <button class="btn btn-warning btn-lg px-4 shadow-sm rounded-pill d-none" type="button" id="BtnModificar">
                                <i class="bi bi-pencil-square me-2"></i>Modificar
                            </button>
                            <button class="btn btn-secondary btn-lg px-4 shadow-sm rounded-pill" type="reset" id="BtnLimpiar">
                                <i class="bi bi-eraser me-2"></i>Limpiar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-lg-11">
            <div class="card shadow-lg border-0 rounded-3" style="border-left: 5px solid #1e5f8a !important;">
                <div class="card-body">
                    <h3 class="text-center mb-4">Lista de Prestamos Registrados</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered align-middle rounded-3 overflow-hidden" id="TableUsuarios">
                            <!-- Aquí se cargan los prestamos -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap Icons CDN (opcional, para los íconos de los botones) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="<?= asset('build/js/usuarios/index.js') ?>"></script>