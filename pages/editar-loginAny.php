<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-warning text-dark">
      <h4 class="mb-0">Editar Login</h4>
    </div>
    <div class="card-body">
      <form method="post" enctype="multipart/form-data">

      <div class="mb-3">
          <label for="cargo" class="form-label">Qual login você deseja editar?</label>
          <select class="form-select" id="quem" name="quem" required>
      <?php


        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
        $sql->execute();
        $loginAtual = $sql->fetchAll();

      foreach ($loginAtual as $key => $value) {
           echo '<option value="'.$value['id'].'">'.$value['login'].'</option>';
        }
        ?>
        </select>
        </div>
<?php

    if (isset($_POST['acao'])) {
      $loginAtual = $sql->fetchAll();
      $login = $_POST['login'] ?? $loginAtual[0]['login'];
      $password = $_POST['password'] ?? $loginAtual[0]['password'];
      $idRecebido = $_POST['quem'] ?? $loginAtual[0]['id'];

        $sql = MySql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET login = ?, password = ? WHERE id = ?");
        $sql->execute(array($login, $password, $idRecebido));
        if ($sql->rowCount() == 1) {
          Painel::alertSucesso('Login atualizado com sucesso!');
        } else {
          Painel::alertErro('Erro ao atualizar login!');
        }

    }
  
      
      
      
      ?>

        <div class="mb-3">
          <label for="login" class="form-label">Login</label>
          <input type="text" class="form-control" id="login" name="login" placeholder="Digite o login do funcionário">
        </div>

        <div class="mb-3">
          <label for="senha" class="form-label">Senha</label>
          <input type="text" class="form-control" id="password" name="password" placeholder="Digite a senha do funcionário">
        </div>

        <button name="acao" type="submit" class="btn btn-primary w-100">Atualizar Funcionário</button>
      </form>
    </div>
  </div>
</div>