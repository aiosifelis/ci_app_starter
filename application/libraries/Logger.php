<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Logger
{
  protected $CI;
  private $table = 'logs';
  private $logs = array();

  public function __construct()
  {
    $this->CI =& get_instance();
  }

  private function append($level, $ns, $data = NULL)
  {
    $time = time();
    $this->logs[] = array(
      'level' => $level,
      'request_id' => $this->CI->request_id,
      'ns' => $ns,
      'data' => empty($data) ? '' : json_encode($data),
      'created_at' => $time
    );
  }

  private function insert($level, $ns, $data = NULL)
  {
    $time = time();
    $log = array(
      'level' => $level,
      'request_id' => $this->CI->request_id,
      'ns' => $ns,
      'data' => empty($data) ? '' : json_encode($data),
      'created_at' => $time
    );

    $this->CI->db->insert($this->table, $log);
  }

  public function commit()
  {
    foreach($this->logs as $log)
    {
      $this->CI->db->insert($this->table, $log);
    }
  }

  public function info($ns, $data = NULL)
  {
    $this->insert('INFO', $ns, $data);
  }

  public function error($ns, $data = NULL)
  {
    $this->insert('ERROR', $ns, $data);
  }

  public function warn($ns, $data = NULL)
  {
    $this->insert('WARN', $ns, $data);
  }


}
