<?php
class M_Petugas extends CI_Model{
    function data_petugas(){
        $query = $this->db->query("select * from petugas");
        return $query;
    }
    function simpan(){
        $data = array('username' => $this->input->post('username'),
            'password'=> md5 ($this->input->post('password')),
            'nama_petugas' => $this->input->post('nama_petugas'));
        $insert = $this->db->insert('petugas',$data);
    }
    function data_petugas_by_id($id){
        $query = $this->db->query("select * from petugas where id_petugas = '$id'");
        return $query;
    }

    function update(){
        $where = array('id_petugas'=> $this->input->post('id_petugas'));
        $data1 = array('password'=> md5($this->input->post('password')),
        'nama_petugas' => $this->input->post('nama_petugas'),
        'level' => $this->input->post('level'));

        $data2 = array('nama_petugas'=> $this->input->post('nama_petugas'),
        'level' => $this->input->post('level'));

       
            $query = $this->db->update('petugas',$data2);
      
            $this->db->where($where);
            $query = $this->db->update('petugas',$data1);
        }

    
        }
    

    function hapus_data_petugas($id){
        $query = $this->db->query("delete from petugas where id_petugas = '$id'");
        if($query > 0){
            $this->session->set_flashdata('suksessimpan','Data Petugas Berhasil Dihapus');
        }else{
            $this->session->set_flashdata('gagalsimpan','Data Petugas Gagal Dihapus');
        }
    }