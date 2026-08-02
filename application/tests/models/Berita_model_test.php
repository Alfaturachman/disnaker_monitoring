<?php

class Berita_model_test extends TestCase
{
    private $model;

    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('Berita_model');
        $this->model = $this->CI->Berita_model;

        $this->CI->db->truncate('kategori');
        $this->CI->db->truncate('media');
    }

    public function test_get_all_kategori()
    {
        $this->CI->db->insert('kategori', ['nama_kategori' => 'Teknologi']);
        $this->CI->db->insert('kategori', ['nama_kategori' => 'Ekonomi']);

        $result = $this->model->get_all_kategori();

        $this->assertCount(2, $result);
    }

    public function test_get_berita_by_kategori_filters_by_disetujui_status()
    {
        $this->CI->db->insert('kategori', ['nama_kategori' => 'Sosial']);
        $katId = $this->CI->db->insert_id();

        // Insert media with status 'disetujui'
        $this->CI->db->insert('media', [
            'id_kategori' => $katId,
            'judul' => 'Berita Disetujui',
            'status' => 'disetujui',
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        // Insert media with status 'belum disetujui'
        $this->CI->db->insert('media', [
            'id_kategori' => $katId,
            'judul' => 'Berita Pending',
            'status' => 'belum disetujui',
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        $berita = $this->model->get_berita_by_kategori($katId);

        $this->assertCount(1, $berita);
        $this->assertEquals('Berita Disetujui', $berita[0]['judul']);
    }

    public function test_search_berita()
    {
        $this->CI->db->insert('media', [
            'judul' => 'Pengumuman Lowongan Kerja',
            'deskripsi' => 'Disnaker membuka loker baru',
            'status' => 'disetujui',
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        $this->CI->db->insert('media', [
            'judul' => 'Artikel Lain',
            'deskripsi' => 'Konten biasa',
            'status' => 'disetujui',
            'tanggal' => date('Y-m-d H:i:s')
        ]);

        $results = $this->model->search_berita('Lowongan');

        $this->assertCount(1, $results);
        $this->assertEquals('Pengumuman Lowongan Kerja', $results[0]['judul']);
    }
}
