<?php
require_once 'Conexion.php';

class Menu extends Conexion
{
    public $menu_id;
    public $menu_plato;
    public $menu_descripcion;
    public $menu_precio;
    public $menu_situacion;


    public function __construct($args = [])
    {
        $this->menu_id = $args['menu_id'] ?? null;
        $this->menu_plato = $args['menu_plato'] ?? '';
        $this->menu_descripcion = $args['menu_descripcion'] ?? '';
        $this->menu_precio = $args['menu_precio'] ?? '';
        $this->menu_situacion = $args['menu_situacion'] ?? '';
    }

    public function guardar()
    {
        $sql = "INSERT INTO menu(menu_plato, menu_descripcion, menu_precio) values('$this->menu_plato','$this->menu_descripcion','$this->menu_precio')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT * from menu where menu_situacion = 1 ";

        if ($this->menu_plato != '') {
            $sql .= " and menu_plato like '%$this->menu_plato%' ";
        }

        if ($this->menu_descripcion != '') {
            $sql .= " and menu_descripcion like '%$this->menu_descripcion%' ";
        }

        if ($this->menu_precio != '') {
            $sql .= " and menu_precio = '$this->menu_precio' ";
        }

        if ($this->menu_id != null) {
            $sql .= " and menu_id = $this->menu_id ";
        }
 
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
        $sql = "UPDATE menu SET menu_plato = '$this->menu_plato', menu_descripcion = '$this->menu_descripcion', menu_precio = '$this->menu_precio' where menu_id = $this->menu_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE menu SET menu_situacion = 0 where menu_id = $this->menu_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
