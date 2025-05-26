<?php

namespace Controllers;

use Exception;
use Model\ActiveRecord;
use MVC\Router;
use PDO;

class LibrosController 
{
    public function renderizarPagina(Router $router)
    {
        $router->render('libros/index', []);
    }
    
    public static function guardarAPI()
    {
        // Configurar headers primero
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        
        // Capturar todos los errores
        try {
            // Validar datos básicos
            $titulo = trim($_POST['titulo_libro'] ?? '');
            $autor = trim($_POST['nombre_autor'] ?? '');
            
            if (empty($titulo) || empty($autor)) {
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'Datos requeridos faltantes'
                ]);
                exit;
            }
            
            if (strlen($titulo) < 2 || strlen($autor) < 2) {
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'Los campos deben tener al menos 2 caracteres'
                ]);
                exit;
            }
            
            // Obtener conexión
            $db = ActiveRecord::getDB();
            
            if (!$db) {
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'No se pudo conectar a la base de datos'
                ]);
                exit;
            }
            
            // Intentar inserción directa con manejo de errores
            $sql = "INSERT INTO libros (titulo_libro, nombre_autor) VALUES (?, ?)";
            $stmt = $db->prepare($sql);
            
            if (!$stmt) {
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'Error preparando consulta'
                ]);
                exit;
            }
            
            $resultado = $stmt->execute([$titulo, $autor]);
            
            if ($resultado) {
                echo json_encode([
                    'codigo' => 1,
                    'mensaje' => 'Libro guardado exitosamente'
                ]);
            } else {
                $errorInfo = $stmt->errorInfo();
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'Error al guardar: ' . ($errorInfo[2] ?? 'Error desconocido')
                ]);
            }
            
        } catch (Exception $e) {
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error del servidor: ' . $e->getMessage()
            ]);
        }
        
        exit; // Importante: terminar la ejecución
    }
    
    public static function buscarAPI()
    {
        // Configurar headers primero
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        
        try {
            $db = ActiveRecord::getDB();
            
            if (!$db) {
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'No se pudo conectar a la base de datos',
                    'data' => []
                ]);
                exit;
            }
            
            // Query simple
            $sql = "SELECT id, titulo_libro, nombre_autor FROM libros ORDER BY titulo_libro";
            $stmt = $db->prepare($sql);
            
            if (!$stmt) {
                echo json_encode([
                    'codigo' => 0,
                    'mensaje' => 'Error preparando consulta de búsqueda',
                    'data' => []
                ]);
                exit;
            }
            
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Libros obtenidos correctamente',
                'data' => $data ?? []
            ]);
            
        } catch (Exception $e) {
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar libros: ' . $e->getMessage(),
                'data' => []
            ]);
        }
        
        exit; // Importante: terminar la ejecución
    }
}