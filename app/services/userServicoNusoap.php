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
  $chamada = file_get_contents("php://input");
  $server->service($chamada);

  // $r = new userServico();
  // $response = $r -> inserirUser('jaue','jaque@hotmail', '56488468','ashoha','35468468','ashkas');
  // echo $response;
?>
