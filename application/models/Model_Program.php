<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Program extends CI_Model
{

    public function tampilprogram()
    {
        $query = "SELECT * FROM program";

        return $this->db->query($query);
    }

    public function edit($data, $id_program)
    {
        $this->db->update('program', $data, array('id_program' => $id_program));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    public function delete($id_program)
    {
        $this->db->where('id_program', $id_program)->delete('program');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }



    public function hitungprogram()
    {
        $query = $this->db->get('program');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }


    function insert($data)
    {
        $this->db->insert('program', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}
