<?php
	include_once "funcao.php";
	class user_controller
	{
		function login() {
			require_once 'view/login.html';
    }

    function create_account()
    {
      if($_POST) {
        require_once "lib/nusoap.php";

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cep = $_POST["cep"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];
        $senha = $_POST["senha"];
        $c_senha = $_POST["c_senha"];

        if( $senha !== $c_senha ) {
          echo "<script>alert('As senhas não conferem!')</script>";
          return;
        }

        $cli = new nusoap_client("http://localhost/todo-list/app/services/userServicoNusoap.php?wsdl");
        $response = $cli->call("userServico.inserirUser", array('nome'=> $nome, 'email'=> $email, 'cep'=> $cep,'endereco'=> $endereco,'telefone'=> $telefone,'senha'=> $senha ));
        if($response) {
          echo "<script>alert('Usuário inserido com sucesso.')</script>";
        }

      }
      require_once 'view/register.html';
    }
  }
