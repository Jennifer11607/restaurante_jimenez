<?php
require_once 'Conexion.php';

class Reservacion extends Conexion
{
    public $reser_id;
    public $reser_mesa;
    public $reser_cliente;
    public $reser_fecha;
    public $reser_hora;
    public $reser_situacion;


    public function __construct($args = [])
    {
        $this->reser_id = $args['reser_id'] ?? null;
        $this->reser_mesa = $args['reser_mesa'] ?? '';
        $this->reser_cliente = $args['reser_cliente'] ?? '';
        $this->reser_fecha = $args['reser_fecha'] ?? '';
        $this->reser_hora = $args['reser_hora'] ?? '';
        $this->reser_situacion = $args['reser_situacion'] ?? '';
    }




    
    public function guardar()
    {
        $sql = "INSERT INTO Reservaciones(reser_mesa, reser_cliente, reser_fecha, reser_hora) values('$this->reser_mesa','$this->reser_cliente','$this->reser_fecha','$this->reser_hora')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        $sql = "SELECT * from reservaciones where reser_situacion = 1 ";

        if ($this->reser_mesa != '') {
            $sql .= " and reser_mesa = '$this->reser_mesa' ";
        }

        if ($this->reser_cliente != '') {
            $sql .= " and reser_cliente = '$this->reser_cliente' ";
        }

        if ($this->reser_fecha != '') {
            $sql .= " and reser_fecha = '$this->reser_fecha' ";
        }
        if ($this->reser_fecha != '') {
            $sql .= " and reser_hora = '$this->reser_hora' ";
        }

        if ($this->reser_id != null) {
            $sql .= " and reser_id = $this->reser_id ";
        }
 
        $resultado = self::servir($sql);
        return $resultado;
    }

    //funcion para imprimir datos 
    public function mostrarInformacion(...$columnas)
    {
        $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
        $sql = "SELECT UNIQUE cli_nombre, cli_apellido, cli_telefono, reser_hora, mesa_numero 
            FROM reservaciones
             INNER JOIN mesas ON reser_mesa = mesa_id
             INNER JOIN clientes ON reser_cliente = cli_id
             WHERE reser_situacion = 1";
    
        $resultado = self::servir($sql);
        return $resultado;
    }


    ////    public function mostrarInformacion(...$columnas)
   


    public function modificar()
    {
        $sql = "UPDATE reservaciones SET reser_mesa = '$this->reser_mesa', reser_cliente = '$this->reser_cliente', reser_fecha = '$this->reser_fecha', reser_hora = '$this->reser_hora' where reser_id = $this->reser_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar()
    {
        $sql = "UPDATE reservaciones SET reser_situacion = 0 where reser_id = $this->reser_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
