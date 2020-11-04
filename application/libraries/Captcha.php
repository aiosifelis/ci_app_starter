<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Captcha
{
    protected $CI;


    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function create()
    {
        $this->CI->db->where('correct', '1');
        $this->CI->db->order_by('rand()');
        $this->CI->db->limit(1);
        $correct_query = $this->CI->db->get('captcha');
        $correct = $correct_query->row();

        $this->CI->db->where('correct', '0');
        $this->CI->db->order_by('rand()');
        $this->CI->db->limit(2);
        $incorrect_query = $this->CI->db->get('captcha');
        $incorrect = $incorrect_query->result();

        $captcha = array();
        $captcha[] = $correct;
        $captcha[] = $incorrect[0];
        $captcha[] = $incorrect[1];

        shuffle($captcha);

        $this->CI->session->set_userdata('captcha', $captcha);
    }

    public function destroy()
    {
        $this->CI->session->unset_userdata('captcha');
    }

    public function check($hash)
    {
        $captcha = $this->CI->session->userdata('captcha');
        foreach ($captcha as $item) {
            if ($item->hash === $hash && $item->correct === '1') {
                return true;
            }
        }

        return false;
    }
}
