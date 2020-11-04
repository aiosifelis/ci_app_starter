<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Settings {

  protected $CI;
  private $table = 'settings';
  private $records = array();


  public function __construct()
  {
    $this->CI =& get_instance();
    $this->get_all();
  }

  public function get_all()
  {
    $query = $this->CI->db->get('settings');
    $this->records = $query->result();
  }

  public function item($key = NULL)
  {
    foreach($this->records as $record)
    {
      if($record->alias === $key){
        return $record->value;
      }
    }
    return NULL;
  }

  public function category($category = NULL)
  {
    $this->CI->db->where('category', $category);
    $q = $this->CI->db->get('settings');
    return $q->result();
  }

}
