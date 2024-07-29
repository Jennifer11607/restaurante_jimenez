<?php
require_once 'Conexion.php';

class Mesa extends Conexion
{
    public $mesa_id;
    public $mesa_numero;
    public $mesa_capacidad;
    public $mesa_ubicacion;
    public $mesa_situacion;


    public function __construct($args = [])
    {
        $this->mesa_id = $args['mesa_id'] ?? null;
        $this->mesa_numero = $args['mesa_numero'] ?? '';
        $this->mesa_capacidad = $args['mesa_capacidad'] ?? '';
        $this->mesa_ubicacion = $args['mesa_ubicacion'] ?? '';
        $this->mesa_situacion = $args['mesa_situacion'] ?? '';
    }

    public function guardar()
    {
        $sql = "INSERT INTO mesas(mesa_numero, mesa_capacidad, mesa_ubicacion) values('$this->mesa_numero','$this->mesa_capacidad','$this->mesa_ubicacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT * from mesas where mesa_situacion = 1 ";

        if ($this->mesa_numero != '') {
            $sql .= " and mesa_numero = '$this->mesa_numero=' ";
        }

        if ($this->mesa_capacidad != '') {
            $sql .= " and mesa_capacidad like '%$this->mesa_capacidad%' ";
        }

        if ($this->mesa_ubicacion != '') {
            $sql .= " and mesa_ubicacion = '$this->mesa_ubicacion' ";
        }

        if ($this->mesa_id != null) {
            $sql .= " and mesa_id = $this->mesa_id ";
        }
 
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE mesas SET mesa_numero = '$this->mesa_numero', mesa_capacidad = '$this->mesa_capacidad', mesa_ubicacion = '$this->mesa_ubicacion' where mesa_id = $this->mesa_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE mesas SET mesa_situacion = 0 where mesa_id = $this->mesa_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
