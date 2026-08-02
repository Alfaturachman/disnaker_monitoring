<?php

class UserModel_test extends TestCase
{
    private $model;

    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('UserModel');
        $this->model = $this->CI->UserModel;

        $this->CI->db->truncate('user');
        $this->CI->db->truncate('admin');
        $this->CI->db->truncate('pemimpin');
        $this->CI->db->truncate('kompetitor');
    }

    public function test_getAllUser_returns_joined_user_list()
    {
        // Insert user and admin
        $this->CI->db->insert('user', ['email' => 'admin@test.com', 'password' => 'pass']);
        $userId = $this->CI->db->insert_id();
        $this->CI->db->insert('admin', [
            'id_user' => $userId,
            'nama' => 'Admin Satu',
            'nip' => '11111'
        ]);

        $users = $this->model->getAllUser();

        $this->assertCount(1, $users);
        $this->assertEquals('admin@test.com', $users[0]['email']);
        $this->assertEquals('Admin Satu', $users[0]['admin_nama']);
    }

    public function test_getUserByEmail()
    {
        $email = 'findme@test.com';
        $this->CI->db->insert('user', ['email' => $email, 'password' => 'secret']);

        $user = $this->model->getUserByEmail($email);

        $this->assertNotNull($user);
        $this->assertEquals($email, $user['email']);
    }

    public function test_getUserById_returns_role_details()
    {
        $this->CI->db->insert('user', ['email' => 'pemimpin@test.com', 'password' => 'pass']);
        $userId = $this->CI->db->insert_id();
        $this->CI->db->insert('pemimpin', [
            'id_user' => $userId,
            'nama' => 'Pak Budi',
            'nip' => '22222',
            'telp' => '081299998888',
            'alamat' => 'Kantor Utama'
        ]);

        $user = $this->model->getUserById($userId);

        $this->assertNotNull($user);
        $this->assertEquals('pemimpin', $user['role']);
        $this->assertEquals('Pak Budi', $user['nama']);
    }

    public function test_updateAdmin()
    {
        $this->CI->db->insert('user', ['email' => 'admin2@test.com', 'password' => 'pass']);
        $userId = $this->CI->db->insert_id();
        $this->CI->db->insert('admin', ['id_user' => $userId, 'nama' => 'Nama Awal']);

        $this->model->updateAdmin($userId, ['nama' => 'Nama Diubah']);

        $user = $this->model->getUserWithAdmin($userId);
        $this->assertEquals('Nama Diubah', $user['nama']);
    }

    public function test_deleteUser_deletes_cascade_records()
    {
        $this->CI->db->insert('user', ['email' => 'del@test.com', 'password' => 'pass']);
        $userId = $this->CI->db->insert_id();
        $this->CI->db->insert('admin', ['id_user' => $userId, 'nama' => 'Admin Hapus']);

        $this->model->deleteUser($userId);

        $user = $this->model->getUserByEmail('del@test.com');
        $this->assertNull($user);

        $adminCheck = $this->CI->db->get_where('admin', ['id_user' => $userId])->row_array();
        $this->assertNull($adminCheck);
    }
}
