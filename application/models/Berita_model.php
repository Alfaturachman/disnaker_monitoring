<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

    public function get_all_kategori() {
        // Mengambil semua kategori
        $this->db->select('id, nama_kategori');
        $this->db->from('kategori');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_berita_by_kategori($kategori_id) {
        $this->db->select('m.id, m.judul, m.url, m.tanggal, m.gambar, m.deskripsi');
        $this->db->from('media m');
        $this->db->where('m.id_kategori', $kategori_id);
        $this->db->where('m.status', 'disetujui');
        $this->db->order_by('m.tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function search_berita($search_term) {
        $this->db->select('m.id, m.judul, m.url, m.tanggal, m.gambar, m.deskripsi');
        $this->db->from('media m');
        $this->db->like('m.judul', $search_term);
        $this->db->or_like('m.deskripsi', $search_term);
        $this->db->where('m.status', 'disetujui');
        $this->db->order_by('m.tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
