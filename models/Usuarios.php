<?php

namespace Model;

class Prestamos extends ActiveRecord {

    public static $tabla = 'prestamos';
    public static $columnasDB = [
        'libro_id',
        'fecha_prestamo',
        'fecha_devolucion',
        'estado',
    ];

    public static $idTabla = 'id';
    public $libro_id;
    public $fecha_prestamo;
    public $fecha_devolucion;
    public $estado;
 

    public function __construct($args = []){
        $this->libro_id = $args['libro_id'] ?? null;
        $this->fecha_prestamo = $args['fecha_prestamo'] ?? '';
        $this->fecha_devolucion = $args['fecha_devolucion'] ?? '';
        $this->estado = $args['estado'] ?? '';
    }
   public static function EliminarPrestamo($id){

        $sql = "DELETE FROM prestamos WHERE id = $id";

        return self::SQL($sql);
    }
}