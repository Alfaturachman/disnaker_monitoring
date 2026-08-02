<?php

class Auth_test extends TestCase
{
    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->database();
        $this->CI->db->truncate('user');
        $this->CI->db->truncate('admin');
        $this->CI->db->truncate('pemimpin');
        $this->CI->db->truncate('kompetitor');
    }

    public function test_login_page_renders_successfully()
    {
        $output = $this->request('GET', 'auth/login');
        $this->assertResponseCode(200);
        $this->assertStringContainsString('Login', $output);
    }

    public function test_register_page_renders_successfully()
    {
        $output = $this->request('GET', 'auth/register');
        $this->assertResponseCode(200);
    }

    public function test_register_user_successfully()
    {
        $this->request('POST', 'auth/register', [
            'nama' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => 'password123',
            'password_confirm' => 'password123',
            'telp' => '08123456789',
            'alamat' => 'Jl. Merdeka No. 1',
            'instansi' => 'PT Maju Bersama',
            'jabatan' => 'Manager',
            'alasan' => 'Monitoring data'
        ]);

        $this->assertRedirect('auth/login');

        // Verify user in DB
        $user = $this->CI->db->get_where('user', ['email' => 'budi@example.com'])->row_array();
        $this->assertNotNull($user);

        // Verify kompetitor in DB
        $kompetitor = $this->CI->db->get_where('kompetitor', ['id_user' => $user['id']])->row_array();
        $this->assertNotNull($kompetitor);
        $this->assertEquals('Budi Santoso', $kompetitor['nama']);
    }

    public function test_login_with_valid_admin_credentials()
    {
        // Seed admin user
        $password = 'admin123';
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->CI->db->insert('user', ['email' => 'admin@disnaker.com', 'password' => $hashedPassword]);
        $userId = $this->CI->db->insert_id();
        $this->CI->db->insert('admin', ['id_user' => $userId, 'nama' => 'Super Admin']);

        $this->request('POST', 'auth/login', [
            'email' => 'admin@disnaker.com',
            'password' => $password
        ]);

        $this->assertRedirect('dashboard');
        $this->assertTrue($_SESSION['logged_in']);
        $this->assertEquals('admin', $_SESSION['user_type']);
        $this->assertEquals($userId, $_SESSION['user_id']);
    }

    public function test_login_with_invalid_credentials()
    {
        $this->request('POST', 'auth/login', [
            'email' => 'wrong@disnaker.com',
            'password' => 'wrongpassword'
        ]);

        $this->assertRedirect('auth/login');
    }

    public function test_logout_destroys_session_and_redirects()
    {
        $_SESSION['logged_in'] = TRUE;
        $_SESSION['user_id'] = 1;
        $_SESSION['user_type'] = 'admin';

        $this->request('GET', 'auth/logout');

        $this->assertRedirect('auth/login');
        $this->assertArrayNotHasKey('logged_in', $_SESSION);
    }
}
