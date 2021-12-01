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
        $query = $this->db->get_where('prestamo', array(
            'id' => $id
        ));
        return $query->result();
    }

    // public function get_all(){
    //     return $this->db->get()->result();
    // }

    public function insert($capital, $amt_fees, $freq, $start_date)
    {
        $data = array(
            "capital" => $capital,
            "amount_of_fees" => $amt_fees,
            "frequency" => $freq,
            "date_creation" => $start_date,
            'last_modifided' => date('Y:m:d H:i:s')
        );

        $this->db->insert('prestamo', $data);
    }
}
