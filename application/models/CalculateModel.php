<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CalculateModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getById($id)
    {
        $query = $this
            ->db
            ->get_where('prestamo', array(
            'id' => $id
        ));
        return $query->result();
    }

    public function insert($cap, $amt_fees, $freq, $s_date)
    {
        $data = array(
            "capital" => $cap,
            "cantidad_cuota" => $amt_fees,
            "frecuencia" => $freq,
            "fecha_inicio" => $s_date
        );

        $this
            ->db
            ->insert('prestamo', $data);
    }
}
