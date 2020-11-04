<?php

defined('BASEPATH') or exit('No direct script access allowed');

class APP_Controller extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        $this->data['next'] = base_url($_SERVER['REQUEST_URI']);
        $this->request_id = random_string('alnum', 32);
        $this->lang->load('ui', __app_default_language);
        $this->updateSession();
    }

    private function updateSession()
    {
    }


    public function checkAccess($redirect = null)
    {
        if (empty($this->session->userdata('id'))) {
            redirect($redirect);
            die();
        }
    }

    public function checkPermission($level, $redirect = null)
    {
        $admin_levels = $this->config->item('admin_levels');
        if ($this->session->userdata('level') > $admin_levels[$level]) {
            redirect($redirect);
            die();
        }
    }
}
