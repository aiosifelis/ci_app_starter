<?php

class CI_Email
{
    private $grid;
    private $email;

    private $from;
    private $to;
    private $subject;
    private $content;
    private $CI;


    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function setTo($name, $email)
    {
        $this->to = new SendGrid\Email($name, $email);
    }

    public function setFrom($name, $email)
    {
        $this->from = new SendGrid\Email($name, $email);
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setContent($template, $params = array())
    {
        $file = APPPATH."/email_templates/html/{$template}";
        $ctx = file_exists($file) ? file_get_contents($file) : file_get_contents(APPPATH."/email_templates/html/default.html");
        foreach ($params as $param=>$value) {
            $ctx = str_replace('{'.$param.'}', $value, $ctx);
        }

        $ctx = str_replace('{logo_url}', base_url().$this->CI->settings->item('logo_url'), $ctx);
        $ctx = str_replace('{subject}', $this->subject, $ctx);

        $this->content = new SendGrid\Content('text/html', $ctx);
    }

    public function send()
    {
        $this->email = new SendGrid\Mail(
            $this->from,
            $this->subject,
            $this->to,
            $this->content
        );

        $this->grid = new \SendGrid(__app_email_api_key);

        $response = $this->grid->client->mail()->send()->post($this->email);
        log_message('info', 'CI_Email:response='.json_encode($response));
    }
}
