<?php

class Media_test extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->database();
        $this->CI->db->truncate('kategori');
        $this->CI->db->truncate('media');
    }

    public function test_index_unauthenticated_redirects_to_login()
    {
        $output = $this->request('GET', 'media');
        $this->assertRedirect('auth/login');
    }

    public function test_index_unauthorized_role_redirects_to_home()
    {
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['user_type'] = 'kompetitor';

        $output = $this->request('GET', 'media');
        $this->assertRedirect('home');
    }

    public function test_index_admin_can_view_media_list()
    {
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['user_type'] = 'admin';

        $this->CI->db->insert('media', [
            'nama' => 'Media Test',
            'judul' => 'Judul Berita Test',
            'url' => 'https://example.com/news/1',
            'status' => 'disetujui'
        ]);

        $output = $this->request('GET', 'media');
        $this->assertResponseCode(200);
        $this->assertStringContainsString('Data Media', $output);
        $this->assertStringContainsString('Judul Berita Test', $output);
    }

    public function test_update_status()
    {
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['user_type'] = 'admin';

        $this->CI->db->insert('media', [
            'nama' => 'Test Item',
            'judul' => 'Judul Test',
            'status' => 'belum disetujui'
        ]);
        $id = $this->CI->db->insert_id();

        $this->request('POST', 'media/update_status/' . $id, [
            'status' => 'disetujui'
        ]);

        $this->assertRedirect('media');

        $media = $this->CI->db->get_where('media', ['id' => $id])->row_array();
        $this->assertEquals('disetujui', $media['status']);
    }

    public function test_delete_media()
    {
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['user_type'] = 'admin';

        $this->CI->db->insert('media', [
            'nama' => 'Test Delete',
            'judul' => 'Judul Delete',
            'status' => 'tolak'
        ]);
        $id = $this->CI->db->insert_id();

        $this->request('GET', 'media/delete_media/' . $id);
        $this->assertRedirect('media');

        $media = $this->CI->db->get_where('media', ['id' => $id])->row_array();
        $this->assertNull($media);
    }
}
