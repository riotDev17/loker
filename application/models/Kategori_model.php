<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
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
    public function update($id, $data, $table)
    {
        $this->db->where('id_kategori   ', $id);
        $this->db->update($table, $data);
    }
    public function edit($id, $table)
    {
        $this->db->where('id_kategori', $id);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $query->free_result();
        } else {
            $data = NULL;
        }

        return $data;
    }
}
