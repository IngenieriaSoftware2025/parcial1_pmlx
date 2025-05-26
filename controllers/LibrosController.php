<?php

namespace Controllers;

use Exception;
use Model\ActiveRecord;
use Model\Libros;
use MVC\Router;

class LibrosController extends ActiveRecord
{
    public function renderizarPagina(Router $router)
    {
        $router->render('libros/index', []);
    }
    
    public static function guardarAPI()
    {
        header('Content-Type: application/json');
        
        try {
            // Limpiar datos
            $titulo = trim($_POST['titulo_libro'] ?? '');
            $autor = trim($_POST['nombre_autor'] ?? '');

            // Validar
            if (strlen($titulo) < 2) {
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'El título debe tener al menos 2 caracteres'
                ]);
                return;
            }

            if (strlen($autor) < 2) {
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'El autor debe tener al menos 2 caracteres'
                ]);
                return;
            }

            // Crear libro - SOLO con los campos que están en columnasDB
            $libro = new Libros([
                'titulo_libro' => $titulo,
                'nombre_autor' => $autor
            ]);

            $resultado = $libro->crear();

            if ($resultado) {
                echo json_encode([
                    'codigo' => 1,
                    'mensaje' => 'Libro guardado correctamente'
                ]);
            } else {
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'Error al guardar'
                ]);
            }
            
        } catch (Exception $e) {
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error: ' . $e->getMessage()
            ]);
        }
    }
    
    public static function buscarAPI()
    {
        try {
            header('Content-Type: application/json');
            
            $sql = "SELECT id, titulo_libro, nombre_autor FROM libros ORDER BY titulo_libro";
            $data = self::fetchArray($sql);

            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Libros obtenidos correctamente',
                'data' => $data
            ]);
        } catch (Exception $e) {
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al obtener libros: ' . $e->getMessage()
            ]);
        }
    }
}