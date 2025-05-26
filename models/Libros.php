<?php

namespace Model;

class Libros extends ActiveRecord
{
    protected static $tabla = 'libros';
    // Para Informix SERIAL, NO incluir 'id' en las columnas
    protected static $columnasDB = ['titulo_libro', 'nombre_autor'];

    public $id;
    public $titulo_libro;
    public $nombre_autor;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo_libro = $args['titulo_libro'] ?? '';
        $this->nombre_autor = $args['nombre_autor'] ?? '';
    }

    public function validar()
    {
        if (!$this->titulo_libro) {
            self::$errores[] = "El título del libro es obligatorio";
        }
        if (!$this->nombre_autor) {
            self::$errores[] = "El nombre del autor es obligatorio";
        }
        return self::$errores;
    }

    // Método específico para Informix - no incluir campos SERIAL
    public function sanitizarAtributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if (isset($this->$columna)) {
                $atributos[$columna] = $this->$columna;
            }
        }
        return $atributos;
    }
}