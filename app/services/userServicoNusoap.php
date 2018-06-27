<?php
  require_once "../model/conexao.php";
  require_once "../model/userDao.php";
  require_once "../model/user.php";
  require_once "../lib/nusoap.php";

  $server = new nusoap_server();
  $server->configureWSDL("userServico");
  $server->wsdl->schemaTargetNamespace = "urn:userServico";


  class userServico {
    function inserirUser($nome, $email, $cep, $endereco, $telefone, $senha) {
      $user = new user(null, $nome, $email, $cep, $endereco, $telefone, $senha);
      $userDAO = new userDAO();
      $ret = $userDAO -> inserir($user);
      return $ret;
    }

    function login($email, $password) {
      $userDAO = new userDAO();
      $user = new user (null, null, $email, null, null, null, $password);
      $ret = $userDAO -> logar($user);

      if(count($ret) > 0) {
        return $ret[0]->id_user;
      } else {
        return '0';
      }
    }

  }

  $server->register("userServico.inserirUser",
                    array(),
                    array("retorno"=>"xsd:string"),
                    "urn:userServico",
                    "urn:userServico#inserirUser",
                    "rpc",
                    "encode",
                    "Inserir usuario"
  );

  $server->register("userServico.login",
                    array(),
                    array("retorno"=>"xsd:string"),
                    "urn:userServico",
                    "urn:userServico#login",
                    "rpc",
                    "encode",
                    "Realizar login"
  );

  $chamada = file_get_contents("php://input");
  $server->service($chamada);

  // $r = new userServico();
  // $response = $r -> login('jaque-paschoal@hotmail.com', 'jaque');
  // echo  var_dump($response);
?>
