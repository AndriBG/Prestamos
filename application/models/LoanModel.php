<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoanModel extends CI_Model
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

    public function insert($cap, $amt_fees, $freq, $s_date)
    {
        $data = array(
            "capital" => $cap,
            "amount_of_fees" => $amt_fees,
            "frequency" => $freq,
            "date_creation" => $s_date
        );

        $this->db->insert('prestamo', $data);
    }
}
