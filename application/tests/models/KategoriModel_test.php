<?php

class KategoriModel_test extends TestCase
{
    private $model;

    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('KategoriModel');
        $this->model = $this->CI->KategoriModel;

        $this->CI->db->truncate('kategori');
    }

    public function test_insert_kategori_and_getAllKategori()
    {
        $this->model->insert_kategori(['nama_kategori' => 'Pelatihan']);
        $this->model->insert_kategori(['nama_kategori' => 'Lowongan']);

        $kategoris = $this->model->getAllKategori();

        $this->assertCount(2, $kategoris);
        $this->assertEquals('Pelatihan', $kategoris[0]['nama_kategori']);
        $this->assertEquals('Lowongan', $kategoris[1]['nama_kategori']);
    }

    public function test_getKategoriById()
    {
        $this->model->insert_kategori(['nama_kategori' => 'UMKM']);
        $id = $this->CI->db->insert_id();

        $kategori = $this->model->getKategoriById($id);

        $this->assertNotNull($kategori);
        $this->assertEquals('UMKM', $kategori['nama_kategori']);
    }

    public function test_update_kategori()
    {
        $this->model->insert_kategori(['nama_kategori' => 'Bisnis Lama']);
        $id = $this->CI->db->insert_id();

        $this->model->update_kategori($id, ['nama_kategori' => 'Bisnis Baru']);
        $kategori = $this->model->getKategoriById($id);

        $this->assertEquals('Bisnis Baru', $kategori['nama_kategori']);
    }

    public function test_delete_kategori()
    {
        $this->model->insert_kategori(['nama_kategori' => 'Temporary']);
        $id = $this->CI->db->insert_id();

        $this->model->delete_kategori($id);
        $kategori = $this->model->getKategoriById($id);

        $this->assertNull($kategori);
    }
}
