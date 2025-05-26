
(function() {
    'use strict';
    
    console.log('Iniciando script de libros standalone');

    // Función para mostrar alertas simples (reemplaza SweetAlert por ahora)
    function mostrarAlerta(tipo, titulo, mensaje) {
        alert(titulo + ': ' + mensaje);
    }

    // Función de validación simple
    function validarFormulario(form, excluir = []) {
        const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
        let valido = true;
        
        inputs.forEach(input => {
            if (!excluir.includes(input.name) && !input.value.trim()) {
                valido = false;
                input.style.borderColor = 'red';
            } else {
                input.style.borderColor = '';
            }
        });
        
        return valido;
    }

    // Esperar a que el DOM esté listo
    function inicializar() {
        console.log('DOM listo, inicializando...');
        
        const FormLibros = document.getElementById('FormLibros');
        const BtnGuardar = document.getElementById('BtnGuardar');
        const BtnModificar = document.getElementById('BtnModificar');
        const BtnLimpiar = document.getElementById('BtnLimpiar');
        
        console.log('Elementos encontrados:', {
            FormLibros: !!FormLibros,
            BtnGuardar: !!BtnGuardar,
            BtnModificar: !!BtnModificar,
            BtnLimpiar: !!BtnLimpiar
        });

        if (!FormLibros || !BtnGuardar) {
            console.error('No se encontraron los elementos necesarios');
            return;
        }

        // Función para guardar libros
        function GuardarLibros(event) {
            event.preventDefault();
            console.log('Guardando libro...');
            
            BtnGuardar.disabled = true;
            BtnGuardar.innerHTML = 'Guardando...';

            // Validar formulario
            if (!validarFormulario(FormLibros, ['id'])) {
                mostrarAlerta('error', 'Error', 'Debe completar todos los campos obligatorios');
                BtnGuardar.disabled = false;
                BtnGuardar.innerHTML = '<i class="bi bi-plus-circle me-1"></i>Guardar';
                return;
            }

            // Obtener datos del formulario
            const formData = new FormData(FormLibros);
            
            // Debug: Mostrar datos
            console.log('Datos a enviar:');
            for (let [key, value] of formData.entries()) {
                console.log(key + ': ' + value);
            }

            const url = '/parcial1_pmlx/libros/guardarAPI';
            
            // Usar XMLHttpRequest en lugar de fetch para evitar conflictos
            const xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    BtnGuardar.disabled = false;
                    BtnGuardar.innerHTML = '<i class="bi bi-plus-circle me-1"></i>Guardar';
                    
                    if (xhr.status === 200) {
                        try {
                            const datos = JSON.parse(xhr.responseText);
                            console.log('Respuesta del servidor:', datos);
                            
                            if (datos.codigo == 1) {
                                mostrarAlerta('success', 'Éxito', datos.mensaje);
                                limpiarTodo();
                            } else {
                                mostrarAlerta('error', 'Error', datos.mensaje);
                            }
                        } catch (e) {
                            console.error('Error al parsear respuesta:', e);
                            console.log('Respuesta cruda:', xhr.responseText);
                            mostrarAlerta('error', 'Error', 'Respuesta inválida del servidor');
                        }
                    } else {
                        console.error('Error HTTP:', xhr.status, xhr.statusText);
                        mostrarAlerta('error', 'Error', 'Error de conexión: ' + xhr.status);
                    }
                }
            };
            
            xhr.onerror = function() {
                BtnGuardar.disabled = false;
                BtnGuardar.innerHTML = '<i class="bi bi-plus-circle me-1"></i>Guardar';
                console.error('Error de red');
                mostrarAlerta('error', 'Error', 'Error de conexión');
            };
            
            xhr.send(formData);
        }

        // Función para limpiar formulario
        function limpiarTodo() {
            FormLibros.reset();
            BtnGuardar.classList.remove('d-none');
            if (BtnModificar) {
                BtnModificar.classList.add('d-none');
            }
            
            // Limpiar estilos de validación
            const inputs = FormLibros.querySelectorAll('input');
            inputs.forEach(input => {
                input.style.borderColor = '';
            });
        }

        // Event Listeners
        FormLibros.addEventListener('submit', GuardarLibros);
        
        if (BtnLimpiar) {
            BtnLimpiar.addEventListener('click', function(e) {
                e.preventDefault();
                limpiarTodo();
            });
        }
        
        console.log('Event listeners agregados correctamente');
    }

    // Inicializar cuando el DOM esté listo
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', inicializar);
    } else {
        inicializar();
    }
    
})();
