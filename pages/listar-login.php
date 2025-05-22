<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-secondary text-white">
      <h4 class="mb-0">Lista de Funcionários</h4>
    </div>
    <div class="card-body">

    <?php
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
    $sql->execute();
    $loginsList = $sql->fetchAll();
    foreach ($loginsList as $key => $value) {
      $id = $value['id'];
    ?>
      
      <!-- Funcionário -->
      <div class="d-flex justify-content-between align-items-center border p-3 mb-3 rounded">
        <div>
          <h5 class="mb-1"><?php echo $value['login']?></h5>
          <p class="mb-0 text-muted"><?php echo $value['password']?></p>
        </div>
        <div>
          <form method="post">
            <input type="hidden" name="idDeletar" value="<?php echo $id; ?>">
            <input name="editar" type="submit" value="Editar" class="btn btn-sm btn-warning me-2"></input>
            <input type="submit" value="Deletar" name="acaoDeletar" class="btn btn-sm btn-danger"></input>
          </form>
        </div>
      </div>

      <?php
    }


    if (isset($_POST['editar'])) {
      $idEditar = $_POST['idDeletar'];
      echo '<script>window.location.href="'.INCLUDE_PATH_PAINEL.'editar-login?id='.$idEditar.'";</script>';
    }

    if (isset($_POST['acaoDeletar']) && isset($_POST['idDeletar'])) {
    echo '<div class="alert alert-warning" role="alert">
          <p>Tem certeza que deseja deletar este Login?</p>
          <form method="post" class="d-flex justify-content-between">
            <input type="hidden" name="idDeletar" value="'.$_POST['idDeletar'].'">
            <button type="submit" name="confirmarDeletar" class="btn btn-danger">Sim</button>
            <button type="submit" name="cancelarDeletar" class="btn btn-secondary">Não</button>
          </form>
        </div>';
    }

    if (isset($_POST['cancelarDeletar'])) {
      echo '<script>window.location.href="'.INCLUDE_PATH_PAINEL.'listar-login";</script>';
      exit;
    }

    if (isset($_POST['confirmarDeletar'])) {
      $idDeletar = $_POST['idDeletar'];
      $sql = MySql::conectar()->prepare("DELETE FROM `tb_admin.usuarios` WHERE id = ?");
      $sql->execute(array($idDeletar));
      if ($sql->rowCount() == 1) {
        Painel::alertSucesso('Login deletado com sucesso!');
      } else {
        Painel::alertErro('Erro ao deletar Login!');
      }
      echo '<script>window.location.href="'.INCLUDE_PATH_PAINEL.'listar-login";</script>';
      exit;
    }

    ?>

    </div>
  </div>
</div>
