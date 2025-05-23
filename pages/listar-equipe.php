

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-secondary text-white">
      <h4 class="mb-0"><i class="bi bi-people me-2"></i>Lista de Funcionários</h4>
    </div>
    <div class="card-body">

    <?php
    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.equipe`");
    $sql->execute();
    $funcionarios = $sql->fetchAll();
    foreach ($funcionarios as $key => $value) {
      $id = $value['id'];
    ?>
      
      <!-- Funcionário -->
      <div class="d-flex justify-content-between align-items-center border p-3 mb-3 rounded">
        <div>
          <img style="background: #d9d9d9; width: 100px; height: 100px; padding: 10px; margin: 15px 0;" src="<?php echo INCLUDE_PATH_PAINEL?>uploadsEqui/<?php echo $value['img']?>" alt="Imagem do Funcionário" class="rounded-circle me-2" style="width: 50px; height: 50px;">
          <h5 class="mb-1"><?php echo $value['nome']?></h5>
          <p class="mb-0 text-muted"><i class="bi bi-briefcase me-1"></i><?php echo $value['cargo']?> | <i class="bi bi-envelope me-1"></i><?php echo $value['email']?></p>
        </div>
        <div>
          <form method="post">
            <input type="hidden" name="idDeletar" value="<?php echo $id; ?>">
            <button name="editar" type="submit" class="btn btn-sm btn-warning me-2"><i class="bi bi-pencil me-1"></i>Editar</button>
            <button type="submit" name="acaoDeletar" class="btn btn-sm btn-danger"><i class="bi bi-trash me-1"></i>Deletar</button>
          </form>
        </div>
      </div>

      <?php
    }


    if (isset($_POST['editar'])) {
      $idEditar = $_POST['idDeletar'];
      echo '<script>window.location.href="'.INCLUDE_PATH_PAINEL.'editar-equipe?id='.$idEditar.'";</script>';
    }

    if (isset($_POST['acaoDeletar']) && isset($_POST['idDeletar'])) {
      echo '<div class="alert alert-warning" role="alert">
        <p><i class="bi bi-exclamation-triangle me-2"></i>Tem certeza que deseja deletar este funcionário?</p>
        <form method="post" class="d-flex justify-content-between">
          <input type="hidden" name="idDeletar" value="'.$_POST['idDeletar'].'">
          <button type="submit" name="confirmarDeletar" class="btn btn-danger"><i class="bi bi-check me-1"></i>Sim</button>
          <button type="submit" name="cancelarDeletar" class="btn btn-secondary"><i class="bi bi-x me-1"></i>Não</button>
        </form>
        </div>';
    }

    if (isset($_POST['cancelarDeletar'])) {
      echo '<script>window.location.href="'.INCLUDE_PATH_PAINEL.'listar-equipe";</script>';
      exit;
    }

    if (isset($_POST['confirmarDeletar'])) {
      $idDeletar = $_POST['idDeletar'];

      $sqlImg = MySql::conectar()->prepare("SELECT img FROM `tb_admin.equipe` WHERE id = ?");
      $sqlImg->execute(array($idDeletar));
      $img = $sqlImg->fetch()['img'];
      unlink('uploadsEqui/' . $img);

      $sql = MySql::conectar()->prepare("DELETE FROM `tb_admin.equipe` WHERE id = ?");
      $sql->execute(array($idDeletar));
      if ($sql->rowCount() == 1) {
      Painel::alertSucesso('Funcionário deletado com sucesso!');
      } else {
      Painel::alertErro('Erro ao deletar funcionário!');
      }
      echo '<script>window.location.href="'.INCLUDE_PATH_PAINEL.'listar-equipe";</script>';
      exit;
    }
?>
    </div>
  </div>
</div>
