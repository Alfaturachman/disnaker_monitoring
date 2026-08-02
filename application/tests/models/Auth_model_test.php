<?php

class Auth_model_test extends TestCase
{
    private $model;

    public function setUp(): void
    {
        $this->resetInstance();
        $this->CI->load->model('Auth_model');
        $this->model = $this->CI->Auth_model;

        // Clean up database tables before each test
        $this->CI->db->truncate('user');
        $this->CI->db->truncate('admin');
        $this->CI->db->truncate('pemimpin');
        $this->CI->db->truncate('kompetitor');
    }

    public function test_register_creates_user_successfully()
    {
        $email = 'test@example.com';
        $password = 'secret123';

        $userId = $this->model->register($email, $password);

        $this->assertNotEmpty($userId);
        $this->assertTrue($this->model->emailExists($email));
    }

    public function test_emailExists_returns_false_when_email_not_registered()
    {
        $this->assertFalse($this->model->emailExists('nonexistent@example.com'));
    }

    public function test_login_with_valid_credentials()
    {
        $email = 'user@example.com';
        $password = 'password123';

        $userId = $this->model->register($email, $password);
        $loginResult = $this->model->login($email, $password);

        $this->assertEquals($userId, $loginResult);
    }

    public function test_login_with_invalid_password_returns_false()
    {
        $email = 'user2@example.com';
        $password = 'correctpassword';

        $this->model->register($email, $password);
        $loginResult = $this->model->login($email, 'wrongpassword');

        $this->assertFalse($loginResult);
    }

    public function test_getUserType_returns_admin_type()
    {
        $email = 'admin@example.com';
        $userId = $this->model->register($email, 'admin123');

        $this->CI->db->insert('admin', [
            'id_user' => $userId,
            'nama' => 'Admin Test',
            'nip' => '12345',
            'telp' => '0812345678',
            'alamat' => 'Alamat Admin'
        ]);

        $userType = $this->model->getUserType($userId);

        $this->assertIsArray($userType);
        $this->assertEquals('admin', $userType['type']);
        $this->assertEquals('Admin Test', $userType['name']);
    }

    public function test_getUserDetails_returns_user_info()
    {
        $email = 'kompetitor@example.com';
        $userId = $this->model->register($email, 'kompetitor123');

        $this->model->addKompetitor([
            'id_user' => $userId,
            'nama' => 'Kompetitor Test',
            'telp' => '0898765432',
            'alamat' => 'Alamat Kompetitor'
        ]);

        $details = $this->model->getUserDetails($userId);

        $this->assertNotNull($details);
        $this->assertEquals($email, $details['user']['email']);
        $this->assertEquals('Kompetitor Test', $details['kompetitor']['nama']);
    }
}
