<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loker_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function read($table)
    {
        $this->db->from($table);
    
        $this->db->order_by('id_loker', 'DESC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }

            $query->free_result();
        } else {
            $data = NULL;
        }

        return $data;
    }
    public function baca_detail($id)
    {
        $query = $this->db->query("SELECT * FROM loker WHERE id_loker='$id'");
        return $query->result_array();
    }
}
