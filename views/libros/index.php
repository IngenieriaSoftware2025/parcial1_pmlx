<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca para Laura</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="container mt-4">
        <!-- Formulario de libros -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-success text-white text-center">
                        <h5 class="mb-1">¡Biblioteca para Laura!</h5>
                        <h4 class="mb-0">BIENVENIDA LAURA</h4>
                    </div>
                    <div class="card-body">
                        <form id="FormLibros">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="titulo_libro" class="form-label">Nombre del Libro *</label>
                                    <input type="text" class="form-control" id="titulo_libro" name="titulo_libro" placeholder="Ej. El Coronel no tiene quien le escriba" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nombre_autor" class="form-label">Nombre del Autor *</label>
                                    <input type="text" class="form-control" id="nombre_autor" name="nombre_autor" placeholder="Ej. Gabriel García Márquez" required>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button class="btn btn-success me-2" type="submit" id="BtnGuardar">
                                    <i class="bi bi-plus-circle me-1"></i>Guardar
                                </button>
                                <button class="btn btn-secondary" type="button" id="BtnLimpiar">
                                    <i class="bi bi-eraser me-1"></i>Limpiar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de libros -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="text-center mb-0">LIBROS REGISTRADOS</h4>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-info mb-3" onclick="cargarLibros()">
                            <i class="bi bi-arrow-clockwise me-1"></i>Actualizar Lista
                        </button>
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Título del Libro</th>
                                        <th>Nombre del Autor</th>
                                    </tr>
                                </thead>
                                <tbody id="tablaLibros">
                                    <!-- Los datos se cargarán aquí -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mensajes -->
    <div id="mensajes"></div>

    <script>
    // JavaScript completamente independiente
    (function() {
        'use strict';
        
        console.log('Sistema de libros iniciado');

        // Función para mostrar mensajes
        function mostrarMensaje(tipo, mensaje) {
            const div = document.createElement('div');
            div.className = `alert alert-${tipo} alert-dismissible fade show position-fixed`;
            div.style.top = '20px';
            div.style.right = '20px';
            div.style.zIndex = '9999';
            div.innerHTML = `
                ${mensaje}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;
            document.body.appendChild(div);
            
            // Auto-remover después de 3 segundos
            setTimeout(() => {
                if (div.parentNode) {
                    div.parentNode.removeChild(div);
                }
            }, 3000);
        }

        // Función para validar formulario
        function validarFormulario() {
            const titulo = document.getElementById('titulo_libro').value.trim();
            const autor = document.getElementById('nombre_autor').value.trim();
            
            if (titulo.length < 2) {
                mostrarMensaje('danger', 'El título debe tener al menos 2 caracteres');
                return false;
            }
            
            if (autor.length < 2) {
                mostrarMensaje('danger', 'El nombre del autor debe tener al menos 2 caracteres');
                return false;
            }
            
            return true;
        }

        // Función para guardar libro
        function guardarLibro(e) {
            e.preventDefault();
            
            if (!validarFormulario()) return;
            
            const btnGuardar = document.getElementById('BtnGuardar');
            btnGuardar.disabled = true;
            btnGuardar.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span>Guardando...';
            
            const titulo = document.getElementById('titulo_libro').value.trim();
            const autor = document.getElementById('nombre_autor').value.trim();
            
            const formData = new FormData();
            formData.append('titulo_libro', titulo);
            formData.append('nombre_autor', autor);
            
            fetch('/parcial1_pmlx/libros/guardarAPI', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Respuesta:', data);
                
                if (data.codigo === 1) {
                    mostrarMensaje('success', data.mensaje);
                    document.getElementById('FormLibros').reset();
                    cargarLibros();
                } else {
                    mostrarMensaje('danger', data.mensaje);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                mostrarMensaje('danger', 'Error de conexión');
            })
            .finally(() => {
                btnGuardar.disabled = false;
                btnGuardar.innerHTML = '<i class="bi bi-plus-circle me-1"></i>Guardar';
            });
        }

        // Función para cargar libros
        window.cargarLibros = function() {
            fetch('/parcial1_pmlx/libros/buscarAPI')
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById('tablaLibros');
                tbody.innerHTML = '';
                
                if (data.codigo === 1 && data.data) {
                    data.data.forEach(libro => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${libro.id}</td>
                            <td>${libro.titulo_libro}</td>
                            <td>${libro.nombre_autor}</td>
                        `;
                        tbody.appendChild(tr);
                    });
                } else {
                    tbody.innerHTML = '<tr><td colspan="3" class="text-center">No hay libros registrados</td></tr>';
                }
            })
            .catch(error => {
                console.error('Error al cargar libros:', error);
                mostrarMensaje('danger', 'Error al cargar la lista de libros');
            });
        };

        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('FormLibros');
            const btnLimpiar = document.getElementById('BtnLimpiar');
            
            if (form) {
                form.addEventListener('submit', guardarLibro);
            }
            
            if (btnLimpiar) {
                btnLimpiar.addEventListener('click', function() {
                    document.getElementById('FormLibros').reset();
                });
            }
            
            // Cargar libros al inicio
            cargarLibros();
        });
        
    })();
    </script>

   
</body>

 <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>