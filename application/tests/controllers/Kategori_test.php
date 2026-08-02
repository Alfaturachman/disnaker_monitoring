<?php

class Kategori_test extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->database();
        $this->CI->db->truncate('kategori');
    }

    public function test_index_unauthenticated_user_redirects_to_login()
    {
        $output = $this->request('GET', 'kategori');
        $this->assertRedirect('auth/login');
    }

    public function test_index_unauthorized_role_redirects_to_home()
    {
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['user_type'] = 'kompetitor';

        $output = $this->request('GET', 'kategori');
        $this->assertRedirect('home');
    }

    public function test_index_admin_role_can_view_kategori_list()
    {
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['user_type'] = 'admin';

        $this->CI->db->insert('kategori', ['nama_kategori' => 'Pelatihan kerja']);

        $output = $this->request('GET', 'kategori');
        $this->assertResponseCode(200);
        $this->assertStringContainsString('Data Kategori', $output);
        $this->assertStringContainsString('Pelatihan kerja', $output);
    }

    public function test_create_kategori_with_valid_data()
    {
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['user_type'] = 'admin';

        $this->request('POST', 'kategori/create', [
            'nama_kategori' => 'Kategori Baru'
        ]);

        $this->assertRedirect('kategori');

        // Check if database contains inserted kategori
        $query = $this->CI->db->get_where('kategori', ['nama_kategori' => 'Kategori Baru']);
        $this->assertEquals(1, $query->num_rows());
    }

    public function test_update_kategori()
    {
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['user_type'] = 'admin';

        $this->CI->db->insert('kategori', ['nama_kategori' => 'Kategori Lama']);
        $id = $this->CI->db->insert_id();

        $this->request('POST', 'kategori/update/' . $id, [
            'nama_kategori' => 'Kategori Diperbarui'
        ]);

        $this->assertRedirect('kategori');

        $kategori = $this->CI->db->get_where('kategori', ['id' => $id])->row_array();
        $this->assertEquals('Kategori Diperbarui', $kategori['nama_kategori']);
    }

    public function test_delete_kategori()
    {
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['user_type'] = 'admin';

        $this->CI->db->insert('kategori', ['nama_kategori' => 'Hapus Saya']);
        $id = $this->CI->db->insert_id();

        $this->request('GET', 'kategori/delete/' . $id);
        $this->assertRedirect('kategori');

        $kategori = $this->CI->db->get_where('kategori', ['id' => $id])->row_array();
        $this->assertNull($kategori);
    }
}
