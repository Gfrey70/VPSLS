<?php defined('BASEPATH')OR exit('Error');
/**
 *
 */
class Users extends CI_model
{
  function getOwnerList($userId="")
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('rolename','owner');

    if($userId){
      $this->db->where('id',$userId);
    }
    $data = $this->db->get();
    if ($data) {
      return $data->result();
    }else{
      return false;
    }
  }

  function getAllUsers()
  {
    $this->db->select('*');
    $this->db->from('users');
    $data = $this->db->get();
    if ($data) {
      return $data->result();
    }else{
      return false;
    }
  }
  function insertUser($data)
  {
    $this->db->insert('users',$data);
  }
  function userAuthenticates($email,$password)
  {
    $filter = array('email' => $email, 'password'=>$password);
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where($filter);
    $data = $this->db->get();
    if ($data) {
      return $data->row_array();
    }else{
      return false;
    }
  }
  function ownerRegister($data){
    $this->db->insert('users',$data);
  }
}
 ?>
