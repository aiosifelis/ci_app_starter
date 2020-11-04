<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends APP_Controller
{
    public function error_404()
    {
        $this->data['page_title'] = 'Error 404';
        $this->data['view'] = 'errors/html/error_404';
        $this->load->view('template');
    }
}
