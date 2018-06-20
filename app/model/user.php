<?php
  class User
  {
    private $iduser;
    private $name;
    private $email;
    private $cep;
    private $address;
    private $phone;
    private $password;

    function __construct($iduser=null,$name=null,$email=null,$cep=null,$address=null,$phone=null,$password=null) {
      $this->iduser = $iduser;
      $this->name = $name;
      $this->email = $email;
      $this->cep = $cep;
      $this->address = $address;
      $this->phone = $phone;
      $this->password = $password;

    }

    function getName() {
      return $this->name;
    }

    function getEmail() {
      return $this->email;
    }

    function getCep() {
      return $this->cep;
    }

    function getAddress() {
      return $this->address;
    }

    function getPhone() {
      return $this->phone;
    }

    function getPassword() {
      return $this->password;
    }
  }
?>
