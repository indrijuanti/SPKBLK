<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_User extends CI_Model
{

    public function tampiluser()
    {
        $query = "SELECT * FROM user";

        return $this->db->query($query);
    }


    public function edit($data, $id_user)
    {
        $this->db->update('user', $data, array('id_user' => $id_user));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }


    public function delete($id_user)
    {
        $this->db->where('id_user', $id_user)->delete('user');
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }



    public function hitunguser()
    {
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }


    function insert($data)
    {
        $this->db->insert('user', $data);
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}
