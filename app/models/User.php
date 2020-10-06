<?php

class User{

    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function find($id){
        $result = $this->db->findById('users',$id);
        return $result;
    }

    public function findFromEmail($email){
        $result = $this->db->findUser('users','email',$email);
        return $result;
    }
    public function addUser($params){
        $this->db->add('users',$params);
    }

    public function login(string $email,string $pass){
        $user = $this->findFromEmail($email);
        if(password_verify($pass,$user['password'])){
            return $user;
        }else{
            return false;
        }
    }
}