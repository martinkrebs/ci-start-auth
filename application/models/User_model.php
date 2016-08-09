<?php

class User_model extends CI_Model {
    
    public function get_user_by_email($email_address) {
        $this->db->select()->from('users')
                ->where('email_address', $email_address)
                ->limit(1);
        $query = $this->db->get(); 
 
        return ($query->num_rows() > 0) ? $query->row() : FALSE;        
    }    
    
    
    public function get_user($email_address, $password) {
        $user = $this->get_user_by_email($email_address);
        if ($user == FALSE) {
            return FALSE;
        } elseif (password_verify($password, $user->password) == FALSE) {
            return FALSE;
        } else {            
            return $user;
        }        
    }
    
    
    public function create($email_address, $password) {
        $data = [
            'email_address' => $email_address,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];        
        $this->db->insert('users', $data);        
    }
    
}
