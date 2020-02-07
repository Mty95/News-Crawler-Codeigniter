<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends \Mty95\AdminDashboard\ThemeController
{
    protected $module = 'welcome';
    protected $resourceUrl = 'welcome';

    public function index(): void
    {
        $this->render('message', ['title' => 'Welcome to CodeIgniter']);
    }

    public function ci4(): void
    {
        $this->render('ci4');
    }

    public function validation(): void
    {
        helper('form');
        $this->load->library('form_validation');

        $data = ['title' => 'Validation'];
        $this->render('validation', $data);
    }
}
