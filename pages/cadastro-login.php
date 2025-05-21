<?php


?>

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Cadastro de Logins</h4>

      
    </div>
    <div class="alert alert-warning">
      Este login terá permissões para alterar todas as informações do site.
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">
      
      <?php
      if (isset($_POST['acao'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (empty($login) || empty($password)) {
          Painel::alertErro('Preencha todos os campos!');
        } else {
          $sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null,?,?)");
          $sql->execute(array($login, $password));
          Painel::alertSucesso('Login cadastrado com sucesso!');
        }
      }
      
      ?>


      
      
      
      <div class="mb-3">
          <label for="userLogin" class="form-label">Login</label>
          <input name="login" type="text" class="form-control" id="teamName" placeholder="Digite o login do administrador" >
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Senha</label>
          <input name="password" type="text" class="form-control" id="teamName" placeholder="Digite a senha do administrador" >
        </div>

        <button name="acao" type="submit" class="btn btn-success w-100">Cadastrar Equipe</button>
      </form>
    </div>
  </div>
</div>