<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skills_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function read($table)
    {
        $this->db->from($table);
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
}
