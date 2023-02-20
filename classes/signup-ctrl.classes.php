<?php

class SignupContr extends Signup{

    private $name;
    private $email;
    private $password;
    private $cpassword;

    public function __construct($name, $email, $password, $cpassword){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->cpassword = $cpassword;
    }

    public function signupUser(){
        if($this->uidTakenCheck() == false){
            header("location: ../php/reg.php?error=useroremailtaken");
            exit();
        }

        $this->setUser($this->name, $this->email, $this->password);
    }

    private function uidTakenCheck(){

        if(!$this->checkUser($this->name, $this->email))
        {
            $result = false;
        }

        else {
            $result = true;
        }

        return $result;


    }
}