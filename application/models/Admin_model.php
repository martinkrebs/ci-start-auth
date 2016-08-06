<?php

class Admin_model extends CI_Model {

    public function verify_user($email_address, $password) {
        $query = $this->db
                ->where('email_address', $email_address)
                ->limit(1)
                ->get('users'); 

        // did a user with that email exist ...
        if ($query->num_rows() > 0) {
            // ... and does the password hash match the user supplied password            
            if (password_verify($password, $query->row()->password)) {
                return $query->row();
            }         
        } 
        
        // email and/or password incorrect
        return FALSE;
    }

}
